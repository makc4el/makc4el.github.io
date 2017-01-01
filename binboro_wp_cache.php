<?php


$bbCache = new Binboro_WP_Cache();

Class Binboro_WP_Cache {

  public $mysqli      = false;
  public $url         = false;
  public $cached_time = 12000000;

  function __construct() {

    $this->make_db_connection();

    if ($this->is_cache_allowed() === false)
      return false;

    $this->mysql_table_exists();
    $this->make_current_url_md5();

    $cache = $this->getCache_from_db();
    $this->setCache($cache);

    $this->display_cache();

    $this->close_db();

  }

  function make_db_connection() {
    $this->mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
  }

  function close_db() {
    $this->mysqli->close();
  }

  function is_cache_allowed() {
    if(empty($this->mysqli))
      return false;


    if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')
    	return false;


    if ($_SERVER['REQUEST_METHOD'] === 'POST')
      return false;

    if(strpos(strtolower($_SERVER["REQUEST_URI"]), 'wp-admin') !== false)
      return false;

    return true;

  }

  function mysql_table_exists() {

    $stmt = $this->mysqli->prepare("CREATE TABLE IF NOT EXISTS `cache` (
                                    `link` varchar(255) NOT NULL,
                                    `data` longtext NOT NULL,
                                    `expired_date` varchar(255) NOT NULL,
                                    PRIMARY KEY (`link`),
                                    UNIQUE KEY `link` (`link`),
                                    KEY `link_2` (`link`)
                                  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;");
    $stmt->execute();
  }

  function make_current_url_md5() {
    $this->url = md5($_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);
  }


  function setCache($cache) {

    $this->cache = $cache;
  }

  function getCache() {
    if (empty($this->cache))
      return false;

    return $this->cache;
  }


  function getCache_from_db() {
    $cache = false;

    if ($result = $this->mysqli->query("SELECT * FROM `cache` WHERE link='" . $this->mysqli->real_escape_string($this->url) . "' LIMIT 0,1 "))
      while($obj  = $result->fetch_object())
        foreach ($obj as $k => $v)
        $cache[$k] = $v;


    return $cache;
  }

  function display_cache() {
	
    $cache = $this->getCache();


    if(time() > $cache['expired_date'])
      return false;


    echo $cache["data"];

    exit();

  }

  function add_to_cache($data) {
    $this->make_db_connection();

    $cache  = $this->getCache();



    $exptime = time() + $this->cached_time;

    if (!empty($cache["link"])) {
      $stmt = $this->mysqli->prepare("UPDATE `cache` SET `data`=?, `expired_date`=? WHERE `link`=? ");
      $stmt->bind_param('sds', $data, $exptime, $cache["link"]);
    }
    else {
      $stmt = $this->mysqli->prepare("INSERT INTO `cache` (`data`, `link`, `expired_date`) VALUES (?, ?, ?) ");
      $stmt->bind_param('ssd', $data, $this->url, $exptime);
    }


    $stmt->execute();
    $stmt->close();

    $this->close_db();
  }
}


 ?>
