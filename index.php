<?php 
include "PHP/PHP.php";

if (isset($_SESSION["page"])) {//La Page Courante
	$page = $_SESSION["page"];
} else {
	$page = "accueil";
}

if (isset($_SESSION["id_Profil"])) {//L'id du Profil
	$id_Profil = $_SESSION["id_Profil"];
} else {
	$id_Profil = -1;
}

if ($page == "accueil") {
	include "View/accueil.php";
} else {
	echo "Erreur de chargement !";
}



 ?>