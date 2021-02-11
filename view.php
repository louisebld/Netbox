<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Bruh</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<!-- BootStrap JS -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>



	<main>
		<header>


		</header>
	</main>


	<?php


	if (isset($_GET["page"])) {
		if ($_GET["page"] == "accueil"){
			include ("pages/accueil.php");
		}

		elseif ($_GET["page"] == "communaute"){
			
			include ("pages/entete.php");
			include ("pages/communaute.php");
			include ("pages/barre.php");
		}

		elseif (commenceparcommu($_GET["page"])){

			$communaute=savoircommu($_GET["page"]);
			include ("pages/entete.php");
			include('pages/pagecommunaute.php');
			include ("pages/barre.php");


		}
		elseif (commenceparpost($_GET["page"])){

			$post=savoirpost($_GET["page"]);
			include ("pages/entete.php");
			include('pages/pagepost.php');
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

		}

		else{
			include ("pages/accueil.php");

		}

	}

	else {
		header('location:index.php?page=accueil');
	}

	?>



	<!-- Pour le footer -->
	<?php
	include("pages/footer.php");
	?>




</body>
</html>