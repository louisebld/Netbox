<?php

function insertawarenesspost($iduser, $idpost) {
	global $db;
	$query = "INSERT INTO awarenesspost(iduser, idpost) VALUES ($iduser, $idpost)";
	mysqli_query($db, $query);
}

function estdejaawarenesspost($iduser, $idpost) {

	global $db;

	$awa = mysqli_query($db, "SELECT * FROM awarenesspost WHERE iduser = $iduser AND idpost = $idpost");
	// on compte le nombre de lignes
	$compteur = mysqli_num_rows($awa);

	if ($compteur>0) {
		return true;
	}
	else {
		return false;
	}

}