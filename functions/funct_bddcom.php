<?php


function insert_com($idauteur, $com, $idcomu, $idpost, $date) {
	global $db;
	mysqli_query($db, "INSERT INTO com(idcomu, idpost, com, idauteur, date) VALUES ($idcomu, $idpost, '$com', $idauteur, NOW())");
}

function supprime_com($idcom) {
	// fonction pour supprimer un avis d'un commentaire
	global $db;
	// on supprime
	mysqli_query($db, "DELETE FROM com WHERE id = $idcom");
}

function charge_com($idcomu, $idpost){
    // Fonction qui permet de charger les commentaires d'un post 

	global $db;
	$sql = "SELECT id, idcomu, idpost, com, idauteur, date FROM com WHERE idcomu = $idcomu AND idpost = $idpost";
	$result=  mysqli_query($db, $sql);

	$tableau = [];
	while ($row=mysqli_fetch_assoc($result)) {
		$tableau[] = $row;
	}

	return $tableau;
}

function recupdonneauteurcom($idcom) {

	global $db;
	$sql = "SELECT * FROM profil INNER JOIN com ON profil.id = com.idauteur WHERE  com.id=$idcom";
	$result=  mysqli_query($db, $sql);
	//on met dans un tableau
	$tableau = [];
	while ($row=mysqli_fetch_assoc($result)) {
		$tableau[] = $row;
	}

	return $tableau;

}