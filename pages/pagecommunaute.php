<?php
$communaute= savoircommu($_GET["page"]);
$donnecommunaute=recupdonnecommu($communaute);
$idcommu = $donnecommunaute[0]['idcommu'];

$membrecommu = selectusercommu($idcommu);

$donnepost = recuppost($idcommu);
$createur = recupdonneauteurcommu($idcommu);



?>
<div class="contener m-5 communaute p-4">
	<div class="container mt-4">

		<?php
				// Affichage d'une image de la communauté
				echo '<div class="thumbnail stylelien">';
				echo affiche_imagecommu($donnecommunaute[0]['image']);
		?>

		<div class="container nomcommu caption img-thumbnail">
			<?php
				// On récupère toutes les données de la communauté
				// echo "<img class='img-fluid' src='images/community.png'>";
				echo "<h1 class='pagecommu text-center '>" . $communaute .  "</h1>";
			?>
		</div>

		<div class="container descriptioncommu caption img-thumbnail mt-4">
			<?php
				//Affichage de la description
				echo '<p class="mx-4">' . $donnecommunaute[0]['description'] .  "</p>";

				echo "<h4> Créateur : ";

			affichemembre($createur);

			echo "</h4>";

			echo "<h4> Membres qui publie le plus : ";
			affichemembre(chargeplusactifpost($idcommu));
			echo " </h4>";

			echo "<h4> Membres qui commentent le plus : ";
			affichemembre(chargeplusactifcomment($idcommu));
			echo " </h4>";

			

			?>
		</div>

		<div class="container descriptioncommu caption img-thumbnail mt-4">

		<h4> Voici les membres de la communauté : </h4>
		<?php
				affichemembre ($membrecommu);
		?>
		</div>
	</div>


<form class="form-group" method="post" action="index.php?page=accueil">
			
								<input type="hidden" name="commu" value= "<?php echo $communaute; ?>">

								<div class="mb-3 text-center">
									<button type="submit" name="telechargerpost" value="telechargerpost" class="btn btn-success">Télécharger</button>
								</div>
							</form>







	</div>

	<div class="container">
		<h2 class="mt-5 mb-5 mx-3 text-center">Decouvrez les posts des utilisateurs fan de cette Communauté:</h2>
		<?php	
			affichepost($donnepost);
			//Supprimer une communauté 
			echo "<div class='container text-center mt-4'>";
			echo "<form method='post' action='index.php?page=communaute'>";
			echo  "<input id='idcommu' name='idcommu' type='hidden' value= ". $idcommu . ">";
			echo  "<input id='nomphoto' name='nomphoto' type='hidden' value= ". $donnecommunaute[0]['image'] . ">";
			echo "<input type='submit' name='delcommu' class='btn btn-danger' value='Supprimer la communauté'/>" . "</p>";
			echo  "</div>";


		?>
	</div>
</div>