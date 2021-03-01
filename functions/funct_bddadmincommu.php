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

	$modo = mysqli_query($db, "SELECT * FROM moderateur WHERE  idcommu = $idcommu");
	// on compte le nombre de lignes
	//on met dans un tableau
	$tableau = [];
	while ($row=mysqli_fetch_assoc($modo)) {
		$tableau[] = $row;
	}

	return $tableau;


}











