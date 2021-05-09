<?php

session_start();
// on vérifie la méthode

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	
	       http_response_code(400);
            echo json_encode(['message' => $_SESSION['id']]);


	if (isset($_SESSION['id'])){

		// on récupère le message
		// contient les données en json
		$donneesJsonDM = file_get_contents('php://input');

		// on convertit les données en objet php
		// ajout, true pour tableau associatif
		$donneesDM = json_decode($donneesJsonDM);

		// on vérifie si on a un message

		if ((isset($donneesDM->messageDM)) && (!empty($donneesDM->messageDM))){
			// on a un message

			// on le stocke
			// on écrit la reqûete

			require_once('../db.php');
			$message = $donneesDM->messageDM;
			$idDestinataire = intval($donneesDM->iddesti);

			$idutilisateur = $_SESSION['id'];

			$sql = "INSERT INTO messagedm (utilisateur, message, datemessage, destinataire) VALUES ($idutilisateur, '$message', NOW() , $idDestinataire)";
			$result = mysqli_query($db, $sql);

			$sqlNotif = "INSERT INTO notification(idCurrentUser, idOtherUser, type, dateNotif) VALUES ($idDestinataire, $idutilisateur, 1, NOW())";
			$result = mysqli_query($db, $sqlNotif);

			// ça en ajoute deux pourquoi

			// $sql2 = "DELETE FROM messagecommu WHERE utilisateur = $idutilisateur AND "

            if($result){
                http_response_code(201);
                echo json_encode(['message' => 'Enregistrement effectué']);
            }else{
                http_response_code(400);
                echo json_encode(['message' => 'Une erreur est survenue']);
            }



		}
		else {
				http_response_code(403);
				echo json_encode(['message' => 'message vide']);

		}


	}
	else {
				http_response_code(400);
				echo json_encode(['message' => 'pas connecté']);

	}

}
else {

	// Mauvaise méthode  patch put get
	http_response_code(405);
	echo json_encode(['message' => 'Mauvaise methode']);

}