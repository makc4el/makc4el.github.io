
<?php
    if(ICL_LANGUAGE_CODE=='en'){
      $link=get_permalink(679);
    }
    if(ICL_LANGUAGE_CODE=='fr'){
      $link=get_permalink(835);
    }
    if(ICL_LANGUAGE_CODE=='de'){
      $link=get_permalink(795);
    }
    if(ICL_LANGUAGE_CODE=='it'){
      $link=get_permalink(831);
    }
    if(ICL_LANGUAGE_CODE=='ru'){
      $link=get_permalink(833);
    }
    if(ICL_LANGUAGE_CODE=='es'){
      $link=get_permalink(837);
    }
    if(ICL_LANGUAGE_CODE=='pl'){
      $link=get_permalink(839);
    }
    if(ICL_LANGUAGE_CODE=='zh-hans'){
      $link=get_permalink(1036);
    }
    if(ICL_LANGUAGE_CODE=='ar'){
      $link=get_permalink(1038);
    }
?>

<a href="<?=$link?>" class="main-logo">
  <img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="Logo"/>
</a>
