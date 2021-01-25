<?php 

if (isset($_POST['email']) && isset($_POST['pseudo']) && isset($_POST['mdp'])) {//inscription
	$mail = $_POST['email'];
	$pseudo = $_POST['pseudo'];
	$mdp = $_POST['mdp'];

	$err = "";

	
	if (trim($mail) == "" || est_utilise($mail) || contien_sc($mail) || preg_match('/[-0-9a-zA-Z.+_]+@+[-0-9a-zA-Z.+_]+.+[a-zA-Z]{2,4}/i', $mail) == false) {
		$err = $err . "<p>L'e-mail rentré est invalid</p>\n";
	}
	if (trim($pseudo) == "" || contien_sc($pseudo)) {
		$err = $err . "<p>Le Pseudo rentré est invalid</p>\n";
	}
	if (trim($mdp) == "" || contien_sc($mdp)) {
		$err = $err . "<p>Le mot de passe rentré est invalid</p>\n";
	}

	if ($err == "") {
		$mdp = password_hash($mdp, PASSWORD_DEFAULT);
		$res = inscription($mail,$pseudo,$mdp);
		$err = "<span>Inscription réussi !</span>";
	} 
	
	$_SESSION['errI'] = $err;

	header('Location: ../index.php');
}
if (isset($_POST['email']) && isset($_POST['mdp'])) {//connection
	
	$mdp = $_POST['mdp'];
	$email = $_POST['email'];

	$err = "";
	if(est_utilise($email)){
		$profil = recup_profil_email($email);
		if ($profil[0]['mail'] == $email &&  password_verify($mdp, $profil[0]['mdp'])) {
			$_SESSION['page'] = 'Profil';
			$_SESSION['id'] = $profil[0]['id'];
			$id = $profil[0]['id'];
			$_SESSION['errI'] = "";
			$_SESSION['FIRST'] = "first";
		} else {
			$err = $err . "<p>L'E-mail ou mot de passe incorect</p>";
		}
	}else{
		$err = $err . "<p>L'E-mail est inconnu !</p>";
		
		

	}
	$_SESSION['errC'] = $err;
	header("Location: ../index.php?joueur=$id");

}

 ?>