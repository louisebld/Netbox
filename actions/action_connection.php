<?php 

if (isset($_POST['mail']) && isset($_POST['pseudo']) && isset($_POST['mdp']) && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['inscription'])) {//inscription
	$mail = $_POST['mail'];
	$pseudo = $_POST['pseudo'];
	$mdp = $_POST['mdp'];

	$nom = $_POST['nom'];
	$prenom = $_POST['prenom'];

	$err = "";

	
	if (trim($mail) == "" || est_utilise_mail($mail) || contien_sc($mail) || preg_match('/[-0-9a-zA-Z.+_]+@+[-0-9a-zA-Z.+_]+.+[a-zA-Z]{2,4}/i', $mail) == false) {
		$err = $err . "<p>L'e-mail rentré est invalid</p>\n";
	}
	if (trim($pseudo) == "" || contien_sc($pseudo) || est_utilise_pseudo($pseudo)){
		$err = $err . "<p>Le Pseudo rentré est invalid</p>\n";
	}
	if (trim($mdp) == "" || contien_sc($mdp)) {
		$err = $err . "<p>Le mot de passe rentré est invalid</p>\n";
	}
	if (trim($nom) == "" || contien_sc($nom)) {
		$err = $err . "<p>Le nom rentré est invalid</p>\n";
	}
	if (trim($prenom) == "" || contien_sc($prenom)) {
		$err = $err . "<p>Le prenom rentré est invalid</p>\n";
	}

	if (isset($_SESSION['errC']) && trim($_SESSION['errC'])){
		$_SESSION['errC'] = '';
	}

	if ($err == "") {
		$mdp = password_hash($mdp, PASSWORD_DEFAULT);
		$res = inscription($mail,$pseudo,$mdp,$nom,$prenom);
		$err = "<span>Inscription réussi !</span>";
	} 
	
	$_SESSION['errI'] = $err;
}
if (isset($_POST['mail']) && isset($_POST['mdp']) && isset($_POST['connexion']) ) {//connection

	
	$mdp = $_POST['mdp'];
	$email = $_POST['mail'];
	
	if (isset($_SESSION['errI']) && trim($_SESSION['errI'])){
		$_SESSION['errI'] = '';
	}
	
	$err = "";
	if(est_utilise_mail($email)){
		$profil = recup_profil_email($email);
		if ($profil[0]['mail'] == $email &&  password_verify($mdp, $profil[0]['mdp'])) {
			$_SESSION['id'] = $profil[0]['id'];
			$id = $profil[0]['id'];
			$_SESSION['errI'] = "";
			header('Location: index.php?page=accueil');
		} else {
			$err = $err . "<p>L'E-mail ou mot de passe incorect</p>";
		}
	}else{
		$err = $err . "<p>L'E-mail est inconnu !</p>";
		
		

	}
	$_SESSION['errC'] = $err;

}
if (isset($_GET["act"])) {
	$act = $_GET["act"];
	if ($act == "deconnexion") {
		unset($_SESSION['id']);
		header('Location: index.php?page=accueil');
	}
}

 ?>