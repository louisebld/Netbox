<?php 

function profil_update($id,$data)
{
	global $db;
	$sql = "UPDATE `profil` SET `".$data[0]."`='".$data[1]."' WHERE `id` = '$id'";
	$results = mysqli_query($db,$sql);
}


 ?>