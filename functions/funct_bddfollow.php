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

function takefollow($id) {

	global $db;

	$result = mysqli_query($db, "SELECT p.id, p.pseudo, p.picture FROM profil p JOIN follow f ON p.id=f.idfollowed WHERE f.idfollower=$id");
	$tableau = [];
	while ($row=mysqli_fetch_assoc($result)) {
		$tableau[] = $row;
	}

	return $tableau;


}


function takefollower($id) {

	global $db;

	$result = mysqli_query($db, "SELECT p.id, p.pseudo, p.picture FROM profil p JOIN follow f ON p.id=f.idfollower WHERE f.idfollowed=$id");
	$tableau = [];
	while ($row=mysqli_fetch_assoc($result)) {
		$tableau[] = $row;
	}

	return $tableau;


}


function countFollows($id){
	global $db;
	$sql = mysqli_query($db, "SELECT COUNT(*) FROM follow f WHERE f.idfollower=$id");
	$result = mysqli_num_rows($sql);
	return $result;
}



function countFollowers($id){
	global $db;
	$sql = mysqli_query($db, "SELECT COUNT(*) FROM follow f WHERE f.idfollowed=$id");
	$result = mysqli_num_rows($sql);
	return $result;
}