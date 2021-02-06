<?php

function insert_post($description, $nomimage, $auteur, $commu) {
	global $db;
	// mysqli_query($db, "INSERT INTO publication(description, image, idauteur, idcommu) VALUES ('$description', '$nomimage', $auteur, $commu)");

	$query = "INSERT INTO publication(description, image, idauteur, idcommu) VALUES ('$description', '$nomimage', $auteur, $commu)";
	$db->query($query);
	$idpost = $db->insert_id;
	return $idpost;
}






function changenomimage($idpost, $nomimage) {
	global $db;
	mysqli_query($db, "UPDATE publication SET image = '$nomimage' WHERE idpost = $idpost");

	}



function recuppost($idcom){
// récupère les posts d'une communauté
	global $db;
	$sql = "SELECT * FROM publication WHERE idcommu = $idcom";
	$result=  mysqli_query($db, $sql);

	//on met dans un tableau
	$tableau = [];
	while ($row=mysqli_fetch_assoc($result)) {
		$tableau[] = $row;
	}

	return $tableau;

}