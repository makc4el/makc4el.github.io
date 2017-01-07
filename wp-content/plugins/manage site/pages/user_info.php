<?php
if(intval($_GET['id_user'])){
	$user_id=intval($_GET['id_user']);
	$user_data=get_userdata($user_id);
	$phone_user= get_user_meta( $user_id, 'phone', true);
	$country_user= get_user_meta( $user_id, 'country', true);
	?>
	<table>
		<tr>
			<th>User login</th>
			<th>User Nickname</th>
			<th>User Email</th>
			<th>User Phone</th>
			<th>User Country</th>
			<th>User registered</th>
		</tr>
			<tr>
				<td><?=$user_data->data->user_login?></td>
				<td><?=$user_data->data->user_nicename?></td>
				<td><?=$user_data->data->user_email?></td>
				<td><?=$phone_user?></td>
				<td><?=$country_user?></td>
				<td><?=$user_data->data->user_registered?></td>
			</tr>
	</table>
<?php
}else{
	$url  = @( $_SERVER["HTTPS"] != 'on' ) ? 'http://'.$_SERVER["SERVER_NAME"] :  'https://'.$_SERVER["SERVER_NAME"];
	$url .= ( $_SERVER["SERVER_PORT"] != 80 ) ? ":".$_SERVER["SERVER_PORT"] : "";
	$url .= $_SERVER["SCRIPT_NAME"]."?page=manage_user";
//	header("Location: ".$url.""); /* Перенаправление броузера */
	?>
	<script>
		window.location = "<?=$url?>";
	</script>
<?php
}