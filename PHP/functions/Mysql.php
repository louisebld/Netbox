<?php 

function recup_profil_pseudo($pseudo)
{
	global $db;
	$sql = "SELECT * FROM `profil` WHERE `pseudo` = '$pseudo'";
	$results = mysqli_query($db,$sql);

	$res = [];
	while($row = mysqli_fetch_assoc($results)){
		$res[] = $row;
	}

	return $res;
}


function inscription($mail,$pseudo,$mdp)
{
	global $db;
	$sql = "INSERT INTO `profil`(`id`, `pseudo`, `mail`, `mdp`, `nb_partie_joue_C`, `nb_partie_G_C`, `nb_partie_P_C`, `nb_partie_joue_M`, `nb_partie_G_M`, `nb_partie_P_M`) VALUES (null,'$pseudo','$mail','$mdp',0,0,0,0,0,0)";
	$results = mysqli_query($db,$sql);
	return $results;
}

function recup_profil_email($email)
{
	global $db;
	$sql = "SELECT * FROM `profil` WHERE `mail` = '$email'";
	$results = mysqli_query($db,$sql);

	$res = [];
	while($row = mysqli_fetch_assoc($results)){
		$res[] = $row;
	}

	return $res;
}
 ?>