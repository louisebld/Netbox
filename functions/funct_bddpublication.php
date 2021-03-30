<?php

function insert_post($description, $nomimage, $auteur, $commu) {
	global $db;
	// mysqli_query($db, "INSERT INTO publication(description, image, idauteur, idcommu) VALUES ('$description', '$nomimage', $auteur, $commu)");

	$query = "INSERT INTO publication(description, image, idauteur, idcommu, nblike) VALUES ('$description', '$nomimage', $auteur, $commu, 0)";
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
	$sql = "SELECT * FROM publication WHERE idcommu = $idcom ORDER BY nblike DESC,idpost DESC";
	$result=  mysqli_query($db, $sql);

	//on met dans un tableau
	$tableau = [];
	while ($row=mysqli_fetch_assoc($result)) {
		$tableau[] = $row;
	}

	return $tableau;

}
// AND pb.idpost != aw.idpost
//(aw.iduser != $iduser AND 
// "SELECT * FROM awarenesspost WHERE iduser != $iduser"

function recuppostByID($idcom,$iduser){
	// récupère les posts d'une communauté par id (donc par ordre chronologique)
		global $db;
		$sql = "SELECT DISTINCT * FROM publication AS pb LEFT JOIN (SELECT * FROM awarenesspost WHERE iduser = $iduser) AS aw ON pb.idpost = aw.idpost WHERE aw.idpost IS NULL AND pb.idcommu = $idcom ORDER BY pb.idpost DESC";
		$result=  mysqli_query($db, $sql);
	
		//on met dans un tableau
		$tableau = [];
		while ($row=mysqli_fetch_assoc($result)) {
			$tableau[] = $row;
		}
	
		return $tableau;
	
	}

function recupAuteur($idauteur){
	//Recupere le nom de la personne qui a créé un post
	global $db;
	$sql = "SELECT pseudo FROM   profil INNER JOIN publication ON publication.idauteur = profil.id WHERE  idauteur=$idauteur";
	$result=  mysqli_query($db, $sql);
	$row=mysqli_fetch_assoc($result);
	return $row;
}

function supprime_post($idpost) {
	// pour supprimer un post
		global $db;
		// on supprime
		mysqli_query($db, "DELETE FROM publication WHERE idpost = $idpost");
	}


function recupdonneauteurpost($idpost) {

	global $db;
	$sql = "SELECT * FROM profil INNER JOIN publication ON profil.id = publication.idauteur WHERE  publication.idpost=$idpost";
	$result=  mysqli_query($db, $sql);
	//on met dans un tableau
	$tableau = [];
	while ($row=mysqli_fetch_assoc($result)) {
		$tableau[] = $row;
	}

	return $tableau;

}

function recupdonneecompte($idcompte){
	global $db;
	$sql = "SELECT * FROM profil INNER JOIN com ON profil.pseudo = com.autor";
	$result=  mysqli_query($db, $sql);
	//on met dans un tableau
	$tableau = [];
	while ($row=mysqli_fetch_assoc($result)) {
		$tableau[] = $row;
	}

	return $tableau;
}

function recupnbpost($iduser, $idcommu){

	global $db;
	$sql = "SELECT * FROM publication WHERE idcommu = $idcommu AND idauteur=$iduser";
	$result=  mysqli_query($db, $sql);

	//on met dans un tableau
	$tableau = [];
	while ($row=mysqli_fetch_assoc($result)) {
		$tableau[] = $row;
	}

	return count($tableau);

}

function combienpostcommu($tableaupost){

	return count($tableaupost);
}


function recupnbcom($iduser, $idcommu){

	global $db;
	$sql = "SELECT * FROM com WHERE idcomu = $idcommu AND idauteur=$iduser";
	$result=  mysqli_query($db, $sql);

	//on met dans un tableau
	$tableau = [];
	while ($row=mysqli_fetch_assoc($result)) {
		$tableau[] = $row;
	}

	return count($tableau);

}
