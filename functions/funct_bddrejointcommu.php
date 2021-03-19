<?php


function joincommu($iduser, $idcommu) {
	global $db;
	$query = "INSERT INTO joincommu(iduser, idcommu) VALUES ($iduser, $idcommu)";
	mysqli_query($db, $query);
}

function selectcommu($iduser) {
		//selectionne les communautés de l'utilisateur
	global $db;
	$sql = "SELECT * FROM communaute JOIN joincommu ON communaute.idcommu = joincommu.idcommu WHERE  joincommu.iduser=$iduser ";
	// OR communaute.idcreateur = $iduser 

	$sql2 = "SELECT * FROM communaute  WHERE  idcreateur = $iduser";

	$result=  mysqli_query($db, $sql);
	$result2=  mysqli_query($db, $sql2);

	//on met dans un tableau
	$tableau = [];
	while ($row=mysqli_fetch_assoc($result)) {
		$tableau[] = $row;
	}

	while ($row=mysqli_fetch_assoc($result2)) {
		$tableau[] = $row;
	}

	return $tableau;
}



function estdanscommu($iduser, $idcommu) {

global $db;

	$result = mysqli_query($db, "SELECT * FROM joincommu WHERE iduser=$iduser AND idcommu=$idcommu ");
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


function selectusercommu($idcommu, $idcreateur) {
		//selectionne les communautés de l'utilisateur
	global $db;
	$sql = "SELECT * FROM profil INNER JOIN joincommu ON profil.id = joincommu.iduser WHERE  joincommu.idcommu=$idcommu AND profil.id != $idcreateur ";
	$result=  mysqli_query($db, $sql);
	//on met dans un tableau
	$tableau = [];
	while ($row=mysqli_fetch_assoc($result)) {
		$tableau[] = $row;
	}

	return $tableau;
}



function chargeplusactifpost($idcommu) {

	global $db;
	$sql = "SELECT * FROM profil INNER JOIN publication ON profil.id = publication.idauteur WHERE publication.idcommu=$idcommu GROUP BY publication.idauteur LIMIT 3";
	$result=  mysqli_query($db, $sql);
	//on met dans un tableau
	$tableau = [];
	while ($row=mysqli_fetch_assoc($result)) {
		$tableau[] = $row;
	}

	return $tableau;

}

function chargeplusactifcomment($idcommu) {

	global $db;
	$sql = "SELECT * FROM profil INNER JOIN com ON profil.id = com.idauteur WHERE com.idcomu=$idcommu GROUP BY com.idauteur LIMIT 3";
	$result=  mysqli_query($db, $sql);
	//on met dans un tableau
	$tableau = [];
	while ($row=mysqli_fetch_assoc($result)) {
		$tableau[] = $row;
	}

	return $tableau;

}

function leavecommu($iduser, $idcommu) {
	global $db;
	$query = "DELETE FROM joincommu WHERE iduser=$iduser AND idcommu=$idcommu";
	mysqli_query($db, $query);
}