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


function inscription($mail,$pseudo,$mdp,$nom,$prenom)
{
	global $db;
	$sql = "INSERT INTO `profil`(`id`, `nom`, `prenom`, `pseudo`, `mail`, `mdp`) VALUES (null,'$nom','$prenom','$pseudo','$mail','$mdp')";
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