<?php

$tableaucommu = charge_commu();
// var_dump($_POST['creercommu']);

// var_dump($_POST['nom']);
// var_dump($_POST['description']);


// Pour la création de communauté
// si formulaire envoyé
if (isset($_POST['creercommu'])) {

	$erreurcreatcommu=[];


// nom vide
	if (empty($_POST["nom"]) || !trim($_POST['nom'])) {
		$erreurcreatcommu[]="Nom vide";
	}
	elseif (nomcommuutilise($_POST["nom"])) {
		$erreurcreatcommu[]="Une communauté a déjà ce nom, vous devriez la rejoindre..";
	}

	if (empty($_POST["description"]) || !trim($_POST['description'])) {
		$erreurcreatcommu[]="Description vide";
	}


	if(empty($_FILES['imagecom']['name'])){
		$erreurcreatcommu[]= "Fichier vide";


	}


	// si il y a des erreurcreatcommus
	if (count($erreurcreatcommu)>0) {
// on stocke variable session
		$_SESSION["erreurcreatcommu"]= $erreurcreatcommu;
// on stocke les données pour les laisser dans le formulaire
		$_SESSION["donnecreatcommu"]= $_POST;
	}

	else {
// on récupère les données
		$nom = enleveespace(remplaceApo ($_POST['nom']));
		$description = remplaceApo ($_POST['description']);
		$createur = 1; // ICI IL FAUDRA METTRE LA VARIABLE DE SESSION QUI CONTIENT L'ID DU COMPTE

// création de la communauté dans la bdd


		$file_name = $_FILES['imagecom']['name'];
		$file_size =$_FILES['imagecom']['size'];
		$file_tmp =$_FILES['imagecom']['tmp_name'];
		$file_type=$_FILES['imagecom']['type'];

		move_uploaded_file($file_tmp,"./images/commu/" . enleveespacemaj($nom) . ".jpg");

		$nomimage = enleveespacemaj($nom) . ".jpg";

		// $nom =$_FILES['imagecom']['name'];
		// $taille = $_FILES['imagecom']['size'];
		// $type = $_FILES['imagecom']['type'];
		// $temp = $_FILES['imagecom']['tmp_name'];

		// $nom =var_dump($_FILES['imagecom']['name']);
		// $taille = var_dump($_FILES['imagecom']['size']);
		// $type = var_dump($_FILES['imagecom']['type']);
		// $temp = var_dump($_FILES['imagecom']['tmp_name']);






		// mysqli_query($db, "INSERT INTO imagescommu (nom, taille, type, bin) VALUES ($nom, $taille, $type, file_get_contents($temp))");

		insert_commu($nom, $description, $createur, $nomimage);
		// insert_image();
		// global $db;
		// $req=$db-> prepare("insert into imagescommu(nom, taille, type, bin) values(?,?,?,?)");
		// $req->execute(array($_FILES['imagecom']['name'], $_FILES['imagecom']['size'], $_FILES['imagecom']['type'], file_get_contents($_FILES['imagecom']['tmp_name'])));


		// $file_name = $_FILES['image']['name'];
		// $file_size =$_FILES['image']['size'];
		// $file_tmp =$_FILES['image']['tmp_name'];
		// $file_type=$_FILES['image']['type'];



// var_dump($_FILES['image']);
		


// on redirige
		header("Location:index.php?page=communaute");
// on enlève les variables de session
		unset($_SESSION['erreurcreatcommu']);
		unset($_SESSION['donnecreatcommu']);

	}
}



//  ------------------- Pour la recherche

if (isset($_POST['cherchercommu'])) {


	if (!empty($_POST["recherchecommu"]) && trim($_POST['recherchecommu'])) {

		$tableaucommu= chargesearchcommu($_POST['recherchecommu']);

	}


}


// POUR supprimer une communaute

if (isset($_POST['delcommu'])) {


	$id = $_POST['idcommu'];
	$photo = $_POST['nomphoto'];

	supprime_commu($id);
	supprimephotocommu($photo);

	header("Location:index.php?page=communaute");

	}
