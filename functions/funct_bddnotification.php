<?php

function anotification($idpersonne) {
// Renvoie si la personne a une notification

// variable globale base de donnée
	global $db;

	$notif = mysqli_query($db, "SELECT * FROM notification WHERE idCurrentUser = $idpersonne");
	// on compte le nombre de lignes idOtherUser
	$compteur = mysqli_num_rows($notif);

	if ($compteur>0) {
		return true;
	}
	else {
		return false;
	}
}

function aTypeDeNotification($idpersonne,$idNotif) {
// Renvoie si la personne a une notification d'un type

// variable globale base de donnée
	global $db;

	$notif = mysqli_query($db, "SELECT * FROM notification WHERE idCurrentUser = $idpersonne AND type = $idNotif");
	// on compte le nombre de lignes idOtherUser
	$compteur = mysqli_num_rows($notif);

	if ($compteur>0) {
		return true;
	}
	else {
		return false;
	}
}

function RecupNotification($idpersonne,$idNotif) {
// Renvoie le tableau de notification d'un type de notification

// variable globale base de donnée
	global $db;

	$notif = mysqli_query($db, "SELECT * FROM notification WHERE idCurrentUser = $idpersonne AND type = $idNotif GROUP BY idCurrentUser, type, idOtherUser ORDER BY dateNotif");

	//on met dans un tableau
	$tableau = [];
	while ($row=mysqli_fetch_assoc($notif)) {
		$tableau[] = $row;
	}

	return $tableau;
}

function ajout_notif($idnotifier, $idpersonne, $type) {
// Ajoute une notification

// variable globale base de donnée
	global $db;

	$notif = mysqli_query($db, "INSERT INTO notification(idCurrentUser, idOtherUser, type, dateNotif) VALUES ($idnotifier, $idpersonne, $type, NOW())");
	
}

function supprime_notif($idNotif) {
// Supprime une notification

// variable globale base de donnée
	global $db;

	$notif = mysqli_query($db, "DELETE FROM notification WHERE id = $idNotif");

}

function supprime_all_notif($idCurrentUser, $idOtherUser, $type) {
// Supprime toute les notifications entre deux utilisateurs (que dans un seul sens) et en fontion du type 

// variable globale base de donnée
	global $db;

	$notif = mysqli_query($db, "DELETE FROM notification WHERE idCurrentUser = $idCurrentUser AND type = $type AND idOtherUser = $idOtherUser");

}

function nbDMDe($idpersonne, $idOtherUser) {
// Renvoie le nombre de message que $idOtherUser a envoyé à $idpersonne

// variable globale base de donnée
	global $db;

	$notif = mysqli_query($db, "SELECT * FROM notification WHERE idCurrentUser = $idpersonne AND type = 1 AND idOtherUser = $idOtherUser ORDER BY dateNotif");

	// on compte le nombre de lignes idOtherUser
	$compteur = mysqli_num_rows($notif);

	return $compteur;
}

function nbNotifDM($idpersonne) {
// Renvoie le nombre de notification de DM que $idpersonne a reçu

// variable globale base de donnée
	global $db;

	$notif = mysqli_query($db, "SELECT * FROM notification WHERE idCurrentUser = $idpersonne AND type = 1 ORDER BY dateNotif");

	// on compte le nombre de lignes idOtherUser
	$compteur = mysqli_num_rows($notif);

	return $compteur;
}

function nbNotifFollow($idpersonne) {
//Renvoie le nombre de notification de Follow que $idpersonne a reçu

// variable globale base de donnée
	global $db;

	$notif = mysqli_query($db, "SELECT * FROM notification WHERE idCurrentUser = $idpersonne AND type = 2 GROUP BY idCurrentUser, type, idOtherUser ORDER BY dateNotif");

	// on compte le nombre de lignes idOtherUser
	$compteur = mysqli_num_rows($notif);

	return $compteur;
}

function nbNotifTotal($idpersonne) {
// Renvoie le nombre de notification de tout type confondu que $idpersonne a reçu  

// variable globale base de donnée
	$total = nbNotifDM($idpersonne) + nbNotifFollow($idpersonne);

	return $total;
}

?>