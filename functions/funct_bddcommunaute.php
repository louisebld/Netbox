<?php

function insert_commu($nom, $description, $createur, $nomimage) {
	global $db;
	mysqli_query($db, "INSERT INTO communaute(nom, description, idcreateur, image) VALUES ('$nom', '$description', $createur, '$nomimage')");

}

function nomcommuutilise($nomcommu) {

	global $db;
	// Je fais une recherche dans la base à partir du nom de la commu
	$namecommu = mysqli_query($db, "SELECT * FROM communaute WHERE nom = '".$nomcommu."'");
	// on compte le nombre de lignes
	$compteur = mysqli_num_rows($namecommu);
	// si on a trouvé un compte qui correspond : >0 : true
	if ($compteur>0) {
		return true;
	}
	else {
	// sinon faux
		return false;
	}

}


function insert_image() {

$imagecommu = $_FILES['imagecom'];
	global $db;
	// mysqli_query($db, "INSERT INTO imagescommu(nom, taille, type, bin) VALUES ($imagecommu['name'], $imagecommu['size'], $imagecommu['type'], file_get_contents($imagecommu['tmp_name'])))");


}


function charge_commu(){
	// BUT : charge_commu : Fonction qui renvoie un tableau des communautées

	global $db;
	$sql = "SELECT * FROM communaute";
	$result=  mysqli_query($db, $sql);

	//on met dans un tableau
	$tableau = [];
	while ($row=mysqli_fetch_assoc($result)) {
		$tableau[] = $row;
	}

	return $tableau;
}

function chargesearchcommu($commucherche) {

	global $db;
	$sql = "SELECT * FROM communaute WHERE nom LIKE ('%$commucherche%') ";
	// $sql = "SELECT * FROM communaute WHERE MATCH (nom, description)  AGAINST ('$commucherche' IN BOOLEAN MODE) ";

	$result=  mysqli_query($db, $sql);

	//on met dans un tableau
	$tableau = [];
	while ($row=mysqli_fetch_assoc($result)) {
		$tableau[] = $row;
	}

	return $tableau;


}

function recupdonnecommu($commu){

	global $db;
	$sql = "SELECT * FROM communaute WHERE nom = '$commu'";
	$result=  mysqli_query($db, $sql);

	//on met dans un tableau
	$tableau = [];
	while ($row=mysqli_fetch_assoc($result)) {
		$tableau[] = $row;
	}

	return $tableau;


}