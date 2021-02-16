<?php 
if (isset($_POST["modif"]) && isset($_GET["modif"]) && isset($_SESSION['id'])) {
	$modif = $_GET["modif"];

	if ($modif == "all" && isset($_POST["nom"]) && isset($_POST["prenom"]) && isset($_POST["pseudo"]) && isset($_POST["mail"]) && isset($_POST["description"])) {
		$data = [
			["nom",$_POST["nom"]],
			["prenom",$_POST["prenom"]],
			["pseudo",$_POST["pseudo"]],
			["mail",$_POST["mail"]],
			["description",$_POST["description"]]
		];

		for ($i=0; $i < count($data); $i++) { 
			profil_update($_SESSION['id'],$data[$i]);
		}
		header('location:index.php?page=profil');
	}
	if ($modif == "mdp" && isset($_POST["A_mdp"]) && isset($_POST["N_mdp"])) {
		$A_mdp = $_POST["A_mdp"];
		$data = ["mdp",$_POST["N_mdp"]];
		$profil = recup_profil_id($_SESSION['id'])[0];
		if (password_verify($A_mdp, $profil['mdp'])) {
			if (trim($data[1]) == "" || contien_sc($data[1])) {
				header('location:index.php?page=profil&modif=mdp&err=<p>Le mot de passe rentré est invalid</p>');
			}else{
				$data[1] = password_hash($data[1], PASSWORD_DEFAULT);
				profil_update($_SESSION['id'],$data);
				header('location:index.php?page=profil');
			}
			
		}else{
			header('location:index.php?page=profil&modif=mdp&err=<p>Mot de Passe Incorrect !</p>');
		}
	}
	if ($modif == "img" && isset($_FILES["img_profil"]) && $_FILES['img_profil']['size'] !=0 && $_FILES['img_profil']['size'] < 5000000) {

		$file_name = $_FILES['img_profil']['name'];
		$file_size =$_FILES['img_profil']['size'];
		$file_tmp =$_FILES['img_profil']['tmp_name'];
		if ($_FILES['img_profil']['type'] != '') {
			$file_type=explode("/", $_FILES['img_profil']['type'])[1];
		}else{
			$file_type = "jpg";
		}

		$img_nom = explode(".", enleveespacemaj($file_name))[0] . ".".$file_type;

		move_uploaded_file($file_tmp,"./DATA/profil_pp/" . $img_nom);
		$data = ["picture",$img_nom];
		profil_update($_SESSION['id'],$data);
		header('location:index.php?page=profil');

	}



	
}


 ?>