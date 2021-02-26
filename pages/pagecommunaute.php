<?php
$communaute= savoircommu($_GET["page"]);
$donnecommunaute=recupdonnecommu($communaute);
$idcommu = $donnecommunaute[0]['idcommu'];

$membrecommu = selectusercommu($idcommu);

$donnepost = recuppost($idcommu);
$createur = recupdonneauteurcommu($idcommu);
$_SESSION['donnepost'] = $donnepost;


?>
<div class="contener col-l-6 m-5 communaute p-4">
	
		<ul class="nav nav-tabs" id="myTab" role="tablist">
			<li class="nav-item">
				<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Home</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" id="stats-tab" data-toggle="tab" href="#stats" role="tab" aria-controls="stats" aria-selected="false">Stats</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Abonnés</a>
			</li>
		</ul>
		<div class="container col-lg-8">
		<div class="tab-content" id="myTabContent">
			<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
				<div class="container mt-4">
					<?php
						// Affichage d'une image de la communauté
						echo '<div class="thumbnail stylelien">';
							echo affiche_imagecommu($donnecommunaute[0]['image']);
						echo '</div>';
					?>
					<div class="container nomcommu caption img-thumbnail">
						<?php
							// On récupère toutes les données de la communauté
							echo "<h1 class='pagecommu text-center '>" . $communaute .  "</h1>";
						?>
					</div>
				</div>
			</div>
			<div class="tab-pane fade" id="stats" role="tabpanel" aria-labelledby="stats-tab">
				<div class="container descriptioncommu caption img-thumbnail mt-4">
					<?php
						//Affichage de la description
						echo '<p class="mx-4">' . $donnecommunaute[0]['description'] .  "</p>";
						echo "<h4> Créateur : ";
							affichemembre($createur, "id");
							// var_dump($createur);
						echo "</h4>";
					echo "<h4> Membres qui publie le plus : ";
						affichemembre(chargeplusactifpost($idcommu), "idauteur");
					echo " </h4>";
					echo "<h4> Membres qui commentent le plus : ";
					affichemembre(chargeplusactifcomment($idcommu), "idauteur");
					echo " </h4>";
					?>
				</div>
			</div>
			<div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
				<div class="container descriptioncommu caption img-thumbnail mt-4">
					<h4> Voici les membres de la communauté : </h4>
					<?php
							affichemembre ($membrecommu, "iduser");
					?>
				</div>
			</div>
		</div>
	</div>
</div>

<form class="form-group" method="post" action="index.php?page=accueil">
			
								<input type="hidden" name="commu" value= "<?php echo $communaute; ?>">

								<div class="m-3 text-center">
									<button type="submit" name="telechargerpost" value="telechargerpost" class="btn btn-success bi-download"> Télécharger</button>
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






