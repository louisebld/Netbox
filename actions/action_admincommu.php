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

if (isset($_POST['bannirgens'])) {

	$iduser = intval($_POST['iduser']);
	$idcommu = intval($_POST['idcommu']);

	banuser($iduser, $idcommu);
	leavecommu($iduser, $idcommu);

	header("Location:index.php?page=commu" . $_POST['nomcommu'] . "");
}

if (isset($_POST['signalgens'])) {

	$iduser = intval($_POST['iduser']);
	$idmodo = intval($_POST['idmodo']);
	$idcommu = intval($_POST['idcommu']);
	$raison = $_POST['raison'];

	if (trim($raison) == "" || contien_sc($raison)) {
		//$err = $err . "<p>La raison rentré contient des caractères invalides</p>\n";
	} else {
		signaluser($iduser, $idmodo, $idcommu, $raison);
		//$err = "<p>Signalement comfirmé</p>";
	}

	//$_SESSION['errS'] = $err;

	header("Location:index.php?page=commu" . $_POST['nomcommu'] . "");
}

if (isset($_POST['designaluser'])) {

	$iduser = intval($_POST['iduser']);
	$idcommu = intval($_POST['idcommu']);

	unsignaluser($iduser, $idcommu);

	header("Location:index.php?page=commu" . $_POST['nomcommu'] . "");
}

if (isset($_POST['debanuser'])) {

	$iduser = intval($_POST['iduser']);
	$idcommu = intval($_POST['idcommu']);

	unsignaluser($iduser, $idcommu);
	debanuser($iduser, $idcommu);

	header("Location:index.php?page=commu" . $_POST['nomcommu'] . "");
}
