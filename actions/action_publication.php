<?php




if (isset($_POST['poster'])) {

	$erreurpost=[];


// nom vide

	if(empty($_POST["description"]) || !trim($_POST['description'])) {
		$erreurpost[]="Légende vide";
	}


	if(empty($_FILES['imagepost']['name']) || $_FILES['imagepost']['size'] ==0){
		$erreurpost[]= "Fichier vide";

	}

	if(empty($_POST['communaute'])){
	$erreurpost[]= "Pas de communauté selectionnée";

	}

	if($_FILES['imagepost']['size'] > 5000000){
		$erreurpost[]= "L'image ne doit pas dépasser les 5Mo !";
	}


	// si il y a des erreurposts
	if (count($erreurpost)>0) {
// on stocke variable session
		$_SESSION["erreurpost"]= $erreurpost;
// on stocke les données pour les laisser dans le formulaire
		$_SESSION["donnecreatpost"]= $_POST; 
	}

	else {

// On répète autant de fois pour chaque communauté 
	

// on récupère les données
		var_dump($_POST);
		
		$legende = remplaceApo ($_POST['description']);
		$createur = $_SESSION['id']; // ICI IL FAUDRA METTRE LA VARIABLE DE SESSION QUI CONTIENT L'ID DU COMPTE

// création du post dans la bdd

		$file_name = $_FILES['imagepost']['name'];
		$file_size =$_FILES['imagepost']['size'];
		$file_tmp =$_FILES['imagepost']['tmp_name'];
		if ($_FILES['imagepost']['type'] != '') {
			$file_type=explode("/", $_FILES['imagepost']['type'])[1];
		}else{
			$file_type = "jpg";
		}

	$premierPassage = true;
	foreach ($_POST['communaute'] as $value) {
		$idcommunaute = recupecommu($value);


		$iddupost = insert_post($legende, $file_name, $createur, $idcommunaute);
		move_uploaded_file($file_tmp,"./images/post/post" . $iddupost . ".".$file_type);
		if ($premierPassage){
			$premierPassage = false;
			$iddupostpourlimage = $iddupost;
		}
		$nomimage = "post". $iddupostpourlimage . ".".$file_type;
		changenomimage($iddupost, $nomimage);
	}


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
	//header("Location:index.php?page=commu" . $_POST['nomcommu'] . "");
			//echo "<a class='stylelien' href=>";



	}

if (isset($_POST) && isset($_POST["like"]) && isset($_SESSION['id'])) {
	$createur = $_SESSION['id']; // ICI IL FAUDRA METTRE LA VARIABLE DE SESSION QUI CONTIENT L'ID DU COMPTE && isset($_POST['like'])
	like($_POST["idpost"],$createur);
	header("Location: ./index.php?page=post" . $_POST['idpost']);
}
if (isset($_POST) && isset($_POST["unlike"]) && isset($_SESSION['id'])) {
	$createur = $_SESSION['id']; // ICI IL FAUDRA METTRE LA VARIABLE DE SESSION QUI CONTIENT L'ID DU COMPTE && isset($_POST['like'])
	unlike($_POST["idpost"],$createur);
	header("Location: ./index.php?page=post" . $_POST['idpost']);
}

?>