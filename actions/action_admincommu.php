<?php
if (isset($_POST['ajoutermodo'])) {

	$iduser = intval($_POST['iduser']);
	$idcommu = intval($_POST['idcommu']);

	ajoutemodo($iduser, $idcommu);

	header("Location:index.php?page=commu" . $_POST['nomcommu'] . "");


}

if (isset($_POST['enlevermodo'])) {

	$iduser = intval($_POST['iduser']);
	$idcommu = intval($_POST['idcommu']);

	enlevemodo($iduser, $idcommu);

	header("Location:index.php?page=commu" . $_POST['nomcommu'] . "");


}