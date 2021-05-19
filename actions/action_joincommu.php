<?php


if (isset($_POST['rejoindrecommu'])) {

	$iduser = $_SESSION['id'];
	$idcommu = $_POST['idcommu'];
	$nomcommu = recupdonnecommuparid($idcommu);
	header("Location:index.php?page=" . "commu" . $nomcommu[0]['nom']);


if (!estdanscommu($iduser, $idcommu)) {

	joincommu($iduser, $idcommu);

	header("Location:index.php?page=" . "commu" . $nomcommu[0]['nom']);

}

}

if (isset($_POST['quittercommu'])) {

	$iduser = $_SESSION['id'];
	$idcommu = $_POST['idcommu'];

if (estdanscommu($iduser, $idcommu)) {

	leavecommu($iduser, $idcommu);

	header("Location:index.php?page=mescommu");

}

}


