<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>NetBox</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<!-- BootStrap JS -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
	<script type="text/javascript" src="js/funct_partage.js"></script>

	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>


	<main>
		<header>


		</header>
	</main>


	<?php


	if (isset($_GET["page"])) {
		if ($_GET["page"] == "accueil"){
			include ("pages/accueil.php");
			include("pages/footer.php");
			
		}

		elseif ($_GET["page"] == "communaute"){
			
			include ("pages/entete.php");
			include ("pages/communaute.php");
			include ("pages/barre.php");

			// if (!isset($_SESSION['id'])) {


			// echo '<script>alert("Vous devez être connecté(e) pour accéder à cette page");
			// window.location.href = "./index.php?page=connexion";</script>'; 
	  // 		exit();


			// }


		}

		elseif (commenceparcommu($_GET["page"])){

			$communaute=savoircommu($_GET["page"]);
			include ("pages/entete.php");
			include ('pages/pagecommunaute.php');
			include ("pages/barre.php");


		}
		elseif (commenceparpost($_GET["page"])){

			$post=savoirpost($_GET["page"]);
			include ("pages/entete.php");
			include('pages/pagepost.php');
			include ("pages/barre.php");


		}

		elseif(commenceparpersonne($_GET["page"])) {
			$idpersonne = savoirpersonne($_GET["page"]);
			include ("pages/entete.php");
			include ("pages/profilpersonne.php");
			include ("pages/barre.php");
			

		}

		else if ($_GET["page"] == "connexion"){

			include ("pages/connexion.php");

		}else if ($_GET["page"] == "inscription"){
			
			include ("pages/inscription.php");
			
		}
		else if ($_GET["page"] == "publication"){
			include ("pages/entete.php");
			include ("pages/publication.php");
			include ("pages/barre.php");


		}else if ($_GET["page"] == "profil"){
			include ("pages/entete.php");
			include ("pages/profil.php");
			include ("pages/barre.php");

		}

		else{
			include ("pages/accueil.php");
			include("pages/footer.php");


		}

	}

	else {
		header('location:index.php?page=accueil');
	}

	?>



	<!-- Pour le footer -->
	<?php
	if (!($_GET["page"] == "accueil")){
		include("pages/footer.php");
	}
	?>




</body>
</html>