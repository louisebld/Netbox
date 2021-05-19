<?php

if (isset($_POST['supprNotif'])) {


	$idNotif = $_POST['idNotif'];

	supprime_notif($idNotif);

	header("Location:index.php?page=notification");

	}

if (isset($_POST['supprAllNotifDM'])) {


	$idCurrentUser = $_POST['idCurrentUser'];
	$idOtherUser = $_POST['idOtherUser'];
	$type = $_POST['type'];

	supprime_all_notif($idCurrentUser, $idOtherUser, $type);


	header("Location:index.php?page=personneid" . $idOtherUser);
	}

if (isset($_POST['supprAllNotifFollow'])) {


	$idCurrentUser = $_POST['idCurrentUser'];
	$idOtherUser = $_POST['idOtherUser'];
	$type = $_POST['type'];

	supprime_all_notif($idCurrentUser, $idOtherUser, $type);


	header("Location:index.php?page=notification");
	}

if (isset($_POST['supprToutesLesNotifs'])) {


	$idCurrentUser = $_POST['idCurrentUser'];

	supprime_toutes_les_notifs($idCurrentUser);


	header("Location:index.php?page=notification");
	}
?>