<?php




function insert_rep($idauteur, $reponse, $idcomu, $idpost, $idcom) {
	global $db;
	mysqli_query($db, "INSERT INTO reponses(reponse, date_creation, idauteur, idcomu, idpost, idcom) VALUES ('$reponse', NOW(), $idauteur, $idcomu, $idpost, $idcom)");
}

function charge_rep($idcomu, $idpost, $idcom){
    // Fonction qui permet de charger les commentaires d'un post 

	global $db;
	$sql = "SELECT * FROM reponses WHERE idcomu = $idcomu AND idpost = $idpost AND idcom = $idcom";
	$result=  mysqli_query($db, $sql);

	$tableau = [];
	while ($row=mysqli_fetch_assoc($result)) {
		$tableau[] = $row;
	}

	return $tableau;
}

function recupdonneauteurrep($idrep) {

	global $db;
	$sql = "SELECT * FROM profil INNER JOIN reponses ON profil.id = reponses.idauteur WHERE  reponses.id=$idrep";
	$result=  mysqli_query($db, $sql);
	//on met dans un tableau
	$tableau = [];
	while ($row=mysqli_fetch_assoc($result)) {
		$tableau[] = $row;
	}

	return $tableau;

}