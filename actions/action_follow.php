<?php

if (isset($_POST['follow'])) {


	$idfollow = $_POST['idutilisateurcourant'];
	$idfollower = $_SESSION['id'];

	insert_follow($idfollow, $idfollower);
	ajout_notif($idfollow, $idfollower, 2);

	header("Location:index.php?page=personneid" . $idfollow);

	}


if (isset($_POST['unfollow'])) {


	$idfollow = $_POST['idutilisateurcourant'];
	$idfollower = $_SESSION['id'];

	delete_follow($idfollow, $idfollower);

	header("Location:index.php?page=personneid" . $idfollow);

	}