<?php

function estmodo($idpersonne, $idcommunaute) {
// renvoie si la personne est modo de cette communauté

// variable globale base de donnée
	global $db;

	$modo = mysqli_query($db, "SELECT * FROM moderateur WHERE iduser = $idpersonne AND idcommu = $idcommunaute");
	// on compte le nombre de lignes
	$compteur = mysqli_num_rows($modo);

	if ($compteur>0) {
		return true;
	}
	else {
		return false;
	}
}

function estsignaler($idpersonne, $idcommunaute) {
// renvoie si la personne est modo de cette communauté

// variable globale base de donnée
	global $db;

	$user = mysqli_query($db, "SELECT * FROM signalement WHERE iduser = $idpersonne AND idcommu = $idcommunaute");
	// on compte le nombre de lignes
	$compteur = mysqli_num_rows($user);

	if ($compteur>0) {
		return true;
	}
	else {
		return false;
	}
}

function estsignalerpar($idpersonne, $idmodo, $idcommunaute) {
// renvoie si la personne est modo de cette communauté

// variable globale base de donnée
	global $db;

	$user = mysqli_query($db, "SELECT * FROM signalement WHERE iduser = $idpersonne AND idcommu = $idcommunaute AND idmodo = $idmodo");
	// on compte le nombre de lignes
	$compteur = mysqli_num_rows($user);

	if ($compteur>0) {
		return true;
	}
	else {
		return false;
	}
}

function nbsignalement($idpersonne, $idcommunaute) {
// renvoie si la personne est modo de cette communauté

// variable globale base de donnée
	global $db;

	$user = mysqli_query($db, "SELECT * FROM signalement WHERE iduser = $idpersonne AND idcommu = $idcommunaute");
	// on compte le nombre de lignes
	$compteur = mysqli_num_rows($user);

	return $compteur;
}

function recupmodosignalement($idpersonne, $idcommu) {
// renvoie si la personne est modo de cette communauté

// variable globale base de donnée
	global $db;

	$signalement = mysqli_query($db, "SELECT * FROM profil INNER JOIN signalement ON profil.id = signalement.idmodo WHERE  signalement.iduser=$idpersonne AND signalement.idcommu = $idcommu");

	// on compte le nombre de lignes
	//on met dans un tableau
	$tableau = [];
	while ($row = mysqli_fetch_assoc($signalement)) {
		$tableau[] = $row;
	}

	return $tableau;
}

function recupmodocommu($idcommu) {
// renvoie si la personne est modo de cette communauté

// variable globale base de donnée
	global $db;

	$modo = mysqli_query($db, "SELECT * FROM profil INNER JOIN moderateur ON profil.id = moderateur.iduser WHERE  moderateur.idcommu=$idcommu");

	// on compte le nombre de lignes
	//on met dans un tableau
	$tableau = [];
	while ($row=mysqli_fetch_assoc($modo)) {
		$tableau[] = $row;
	}

	return $tableau;
}

function ajoutemodo($iduser, $idcommu) {
	global $db;
	mysqli_query($db, "INSERT INTO moderateur(iduser, idcommu) VALUES ($iduser, $idcommu)");

}

function enlevemodo($iduser, $idcommu) {
	global $db;
	mysqli_query($db, "DELETE FROM moderateur WHERE iduser=$iduser AND idcommu=$idcommu");

}

function signaluser($iduser, $idmodo, $idcommu, $raison) {
	global $db;
	mysqli_query($db, "INSERT INTO `signalement` (`id`, `iduser`, `idmodo`, `idcommu`, `raison`)  VALUES ( NULL, $iduser, $idmodo, $idcommu, '$raison')");

}

function unsignaluser($iduser, $idcommu) {
	global $db;
	mysqli_query($db, "DELETE FROM signalement WHERE iduser=$iduser AND idcommu=$idcommu");

}

function banuser($iduser, $idcommu) {
	global $db;
	mysqli_query($db, "INSERT INTO ban(iduser, idcommu) VALUES ($iduser, $idcommu)");

}

function debanuser($iduser, $idcommu) {
	global $db;
	mysqli_query($db, "DELETE FROM ban WHERE iduser=$iduser AND idcommu=$idcommu");

}


function recupbannicommu($idcommu) {
// renvoie si la personne est modo de cette communauté

// variable globale base de donnée
	global $db;

	$modo = mysqli_query($db, "SELECT * FROM profil INNER JOIN ban ON profil.id = ban.iduser WHERE  ban.idcommu=$idcommu");

	// on compte le nombre de lignes
	//on met dans un tableau
	$tableau = [];
	while ($row=mysqli_fetch_assoc($modo)) {
		$tableau[] = $row;
	}

	return $tableau;

}





