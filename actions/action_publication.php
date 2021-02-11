<?php




if (isset($_POST['poster'])) {

	$erreurpost=[];


// nom vide

	if (empty($_POST["description"]) || !trim($_POST['description'])) {
		$erreurpost[]="Légende vide";
	}


	if(empty($_FILES['imagepost']['name'])){
		$erreurpost[]= "Fichier vide";

	}


	// si il y a des erreurposts
	if (count($erreurpost)>0) {
// on stocke variable session
		$_SESSION["erreurpost"]= $erreurpost;
// on stocke les données pour les laisser dans le formulaire
		$_SESSION["donnecreatpost"]= $_POST;
	}

	else {
// on récupère les données
		var_dump($_POST['communaute']);
		$idcommunaute = recupecommu($_POST['communaute']);
		$legende = remplaceApo ($_POST['description']);
		$createur = 1; // ICI IL FAUDRA METTRE LA VARIABLE DE SESSION QUI CONTIENT L'ID DU COMPTE

// création du post dans la bdd

		$file_name = $_FILES['imagepost']['name'];
		$file_size =$_FILES['imagepost']['size'];
		$file_tmp =$_FILES['imagepost']['tmp_name'];
		$file_type=$_FILES['imagepost']['type'];



		$iddupost = insert_post($legende, $file_name, $createur, $idcommunaute);
		$nomimage = "post". $iddupost . ".jpg";
		move_uploaded_file($file_tmp,"./images/post/post" . $iddupost . ".jpg");
		changenomimage($iddupost, $nomimage);



// on redirige
		header("Location:index.php?page=communaute");
// on enlève les variables de session
		unset($_SESSION['erreurpost']);
		unset($_SESSION['donnecreatcommu']);

	}
}


// Pour la suppression de post

if (isset($_POST['delpost'])) {


	$id = $_POST['idpost'];
	$photo = $_POST['nomphoto'];

	supprime_post($id);
	supprimephotopost($photo);

	// pour rediriger sur la communaute
	header("Location:index.php?page=commu" . $_POST['nomcommu'] . "");
			//echo "<a class='stylelien' href=>";



	}





?>