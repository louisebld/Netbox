<?php

function insert_messagecommu($message, $idauteur, $idcommu) {
	global $db;
	mysqli_query($db, "INSERT INTO messagecommu (utilisateur, message, datemessage, communaute) VALUES ($idauteur, '$message', NOW() , $idcommu)");

}


function recupmessagecommu($idcommunaute){
// récupère tous les messages
	global $db;
	$sql = "SELECT * FROM messagecommu WHERE communaute=$idcommunaute";
	$result=  mysqli_query($db, $sql);

	//on met dans un tableau
	$tableau = [];
	while ($row=mysqli_fetch_assoc($result)) {
		$tableau[] = $row;
	}

	return $tableau;

}