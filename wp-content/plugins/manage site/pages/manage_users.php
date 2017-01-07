<?php
$users = get_users();

?>

<table>
	<tr>
		<th>User login</th>
		<th>User email</th>
	</tr>
	<?php if(count($users)>0){ foreach ($users as $k=>$v){ ?>
		<tr>
			<td><a href="<?=$_SERVER["SCRIPT_NAME"]?>?page=user_info&id_user=<?=$v->data->ID?>"><?=$v->data->user_login?></a></td>
			<td><?=$v->data->user_email?></td>
		</tr>
	<?php }}else{ ?>
		<tr>
			<td>0</td>
			<td>0</td>
		</tr>
	<?php } ?>
</table>
