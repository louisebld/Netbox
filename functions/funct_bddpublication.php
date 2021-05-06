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


function recuppostByID($idcom,$iduser){
		// récupère les posts d'une communauté par id (donc par ordre chronologique)
		global $db;
		//$sql = "SELECT DISTINCT * FROM publication AS pb LEFT JOIN (SELECT * FROM awarenesspost WHERE iduser = $iduser) AS aw ON pb.idpost = aw.idpost WHERE aw.idpost IS NULL AND pb.idcommu = $idcom ORDER BY pb.idpost DESC";
		$sql = "SELECT * FROM publication pb WHERE NOT EXISTS (SELECT * FROM awarenesspost aw WHERE aw.iduser = $iduser AND pb.idpost = aw.idpost) AND EXISTS (SELECT * FROM joincommu jc WHERE jc.iduser=$iduser AND pb.idcommu=jc.idcommu)";
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



function recup_mes_posts_selon_user($iduser, $idfollow){
	//Recupere tous les posts posté d'un utilisateur
	
	global $db;
	//$sql = "SELECT DISTINCT * FROM publication AS pb LEFT JOIN (SELECT * FROM awarenesspost WHERE iduser = $iduser) AS aw ON pb.idpost = aw.idpost WHERE aw.idpost IS NULL AND pb.idcommu = $idcom ORDER BY pb.idpost DESC";
	$sql = "SELECT * FROM publication pb WHERE idauteur=$iduser AND NOT EXISTS (SELECT * FROM awarenesspost aw WHERE aw.iduser = $idfollow AND pb.idpost = aw.idpost)";
	$result=  mysqli_query($db, $sql);

	//on met dans un tableau
	$tableau = [];
	while ($row=mysqli_fetch_assoc($result)) {
		$tableau[] = $row;
	}

	return $tableau;
}


function recup_mes_posts_selon_user_selon_like($iduser, $idfollow){
	
	global $db;
	//$sql = "SELECT DISTINCT * FROM publication AS pb LEFT JOIN (SELECT * FROM awarenesspost WHERE iduser = $iduser) AS aw ON pb.idpost = aw.idpost WHERE aw.idpost IS NULL AND pb.idcommu = $idcom ORDER BY pb.idpost DESC";
	$sql = "SELECT * FROM publication pb WHERE NOT EXISTS (SELECT * FROM awarenesspost aw WHERE aw.iduser = $idfollow AND pb.idpost = aw.idpost) AND EXISTS (SELECT * FROM likes lk WHERE pb.idpost=lk.idpost AND lk.iduser=$iduser)";
	$result=  mysqli_query($db, $sql);

	//on met dans un tableau
	$tableau = [];
	while ($row=mysqli_fetch_assoc($result)) {
		$tableau[] = $row;
	}

	return $tableau;
}

function user_est_dans_commu ($iduser, $idcommu){
	global $db;
	
	$res = false;
	
	$sql = "SELECT * FROM joincommu WHERE idcommu = $idcommu AND idauteur=$iduser ";
	$result=  mysqli_query($db, $sql);

	if (!empty($result)){
		$res = true;
	}

	return $res;
}
