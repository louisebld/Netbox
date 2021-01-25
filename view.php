<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Bruh</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
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
		}

		else {
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