<?php


if (isset($_POST['rejoindrecommu'])) {

	$iduser = $_SESSION['id'];
	$idcommu = $_POST['idcommu'];

if (!estdanscommu($iduser, $idcommu)) {

	joincommu($iduser, $idcommu);

	header("Location:index.php?page=communaute");

}

	}


