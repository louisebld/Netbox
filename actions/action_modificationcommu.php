<?php

if (isset($_POST['changementnomcommu'])) {

	$nouveau = $_POST['nomcommunautechangementnom'];
	$idcommu = $_POST['idcommu'];
	$infocommunaute = recupdonnecommuparid($idcommu);


	if (!nomcommuutilise($_POST["nomcommunautechangementnom"])){

	changernomcommu($nouveau, $idcommu);

	header("Location:index.php?page=commu" . $nouveau . "");

	}
	else {

		header("Location:index.php?page=commu" . $infocommunaute[0]["nom"] . "");


	}

}

if (isset($_POST['changementdescriptioncommu'])) {

	$nouveau = $_POST['nouvelledescription'];
	$idcommu = $_POST['idcommu'];
	$infocommunaute = recupdonnecommuparid($idcommu);

	if (!empty($nouveau) && trim($nouveau)) {

		changerdescriptioncommu($nouveau, $idcommu);
	}

	header("Location:index.php?page=commu" . $infocommunaute[0]["nom"] . "");


}


if (isset($_POST['changementimagecommu'])) {

	$idcommu = $_POST['idcommu'];
	$infocommunaute = recupdonnecommuparid($idcommu);
	$nomcommu = $infocommunaute[0]["nom"];

	if (!empty($_FILES['nouvelleimagecommu']['name']) && $_FILES['nouvelleimagecommu']['size'] != 0) {


		$file_name = $_FILES['nouvelleimagecommu']['name'];
		$file_size =$_FILES['nouvelleimagecommu']['size'];
		$file_tmp = $_FILES['nouvelleimagecommu']['tmp_name'];
		if ($_FILES['nouvelleimagecommu']['type'] != '') {

			$file_type=explode("/", $_FILES['nouvelleimagecommu']['type'])[1];

		}else{

			$file_type = "jpg";
		}
		
		move_uploaded_file($file_tmp,"./images/commu/" . enleveespacemaj($nomcommu) . ".".$file_type);//-------------------

		$nomimage = enleveespacemaj($nomcommu) . ".".$file_type;

		changerimagecommu($nomimage, $idcommu);
	}

	header("Location:index.php?page=commu" . $nomcommu . "");


}