<?php

function insert_follow($idfollow, $iduser) {
	global $db;
	mysqli_query($db, "INSERT INTO follow(idfollower, idfollowed, datefollow) VALUES ($iduser, $idfollow, NOW())");

}

function delete_follow($idfollow, $iduser) {
	global $db;
	mysqli_query($db, "DELETE FROM follow WHERE idfollower=$iduser AND idfollowed=$idfollow");

}

function follow($follower, $followed) {

global $db;

	$result = mysqli_query($db, "SELECT * FROM follow WHERE idfollower=$follower AND idfollowed=$followed ");
	// on compte le nombre de lignes
	$compteur = mysqli_num_rows($result);
	// si on a trouvé un compte qui correspond : >0 : true
	if ($compteur>0) {
		return true;
	}
	else {
	// sinon faux
		return false;

}
}