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





