<?php 

function contien_sc($text)
{
	return count(explode("<", $text))>1; 
}

function est_utilise_mail($email)
{
	$res = recup_profil_email($email);
	return count($res) != 0;
}
function est_utilise_pseudo($pseudo)
{
	$res = recup_profil_pseudo($pseudo);
	return count($res) != 0;
}
function recup_profil_id($id)
{
	global $db;
	$sql = "SELECT * FROM `profil` WHERE `id` = '$id'";
	$results = mysqli_query($db,$sql);

	$res = [];
	while($row = mysqli_fetch_assoc($results)){
		$res[] = $row;
	}

	return $res;
}

?>
