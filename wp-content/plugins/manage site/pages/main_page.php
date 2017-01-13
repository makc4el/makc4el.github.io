<?php
global $wpdb;
$IP = $_SERVER['REMOTE_ADDR'];
$unique = true;
$query="select * from ipaddr where ip = '$IP'";
$res= $wpdb->query($query);


if ($res) {
	$unique = false;
}
if ($unique) {
	$q = "insert into ipaddr values('$IP')";
	$wpdb->query($q);
}
$query="select * from ipaddr";
$all_ip= $wpdb->get_results($query, ARRAY_A);

?>
<table>
	<tr>
		<th>ip</th>
		<th>country</th>
		<th>city</th>
	</tr>
	<?php if(count($all_ip)>0){ foreach ($all_ip as $k=>$v){ ?>
		<tr>
			<td><?=$v['ip']?></td>
			<td>0</td>
			<td>0</td>
		</tr>
	<?php }}else{ ?>
		<tr>
			<td>0</td>
			<td>0</td>
			<td>0</td>
		</tr>
	<?php } ?>
</table>
