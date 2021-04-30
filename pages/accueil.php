<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>



<!-- JS permettant de gerer les erreurs avec les modaux, si une erreur existe; alors on ouvre le modal quand on refresh la page -->
<script>
		$(document).ready(function() {
			if (<?php echo trim($_SESSION['errC'])?'true':'false'; ?>) {

				$("#connexionButton").modal('show');
			}
			if (<?php echo trim($_SESSION['errI'])?'true':'false'; ?>) {

				$("#inscriptionButton").modal('show');
			}

		});
</script>	


<div class="container-fluid bg-dark">
	<div class="navbar-right barre">
		<?php

			if (isset($_SESSION["id"])) {
				$data = recup_profil_id($_SESSION["id"])[0];
				$nom = $data["nom"];
				$prenom = $data["prenom"];

				$_SESSION['pseudo'] = $data["pseudo"];
				$_SESSION['id'] = $data["id"];
				// echo "<button type='button' class='btn btn-light btn-outline-dark border-light m-2' style='text-decoration: none;color: black;'>Accueil</button>";


				echo "<a href='index.php?page=profil'><button type='button' class='btn btn-light btn-outline-dark border-light m-2' style='text-decoration: none;color: black;'>Profil</button></a>";



				?>
				<button type="button" class="btn btn-light btn-outline-dark border-light m-2" data-bs-whatever="@getbootstrap"><a href="index.php?act=deconnexion" style="text-decoration: none;color: black;">Déconnexion</a></button>

				<a class="btn btn-success" href="index.php?page=communaute">Communauté</a>

				<?php

				modalCommunaute();

			} else {
				
				modalInscription();
				modalConnection();

				

			}



			?>
			
			

		</div>
	</div>
	<?php 
	function recup_photo_carroussel(){
		global $db;
		$sql = "SELECT nom,image FROM communaute ORDER BY RAND()LIMIT 6";
		$result=  mysqli_query($db, $sql);
	
		$tableau = [];
		while ($row=mysqli_fetch_assoc($result)) {
			$tableau[] = $row;
		}
	
		return $tableau;
	}

	function affiche_photo_carroussel($tableau){
		for ($i=0; $i < sizeof($tableau); $i++) { 
			if ($i == 0){
				echo '<div class="carousel-item active opacity">';
					echo '<img src="images/commu/' . $tableau[$i]['image'] . '" class="d-block w-100" alt="bruh">';
					echo '<div class="carousel-caption d-none d-md-block" style="background-color: #22223B; opacity: 0.75;">';
						echo '<h1 class="display-1 mx-auto w-75" style="font-size:100;">' . $tableau[$i]['nom'] . '</h1>';
						echo '<h5 style="">Rejoignez vite la communauté</h5>';
					echo '</div>';
				echo '</div>';
			} else {
				echo '<div class="carousel-item">';
					echo '<img src="images/commu/' . $tableau[$i]['image'] . '" class="d-block w-100" alt="bruh">';
					echo '<div class="carousel-caption d-none d-md-block" style="background-color: #22223B; opacity: 0.75;">';
						echo '<h1 class="display-1 mx-auto  w-75">' . $tableau[$i]['nom'] . '</h1>';
						echo '<h5>Rejoignez vite la communauté</h5>';
					echo '</div>';
				echo '</div>';
			}
		}
	}

	function buttons_carrousel($tableau){
		for ($i=0; $i < sizeof($tableau); $i++) { 
			if ($i == 0){
				echo '<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>';
		
			}else {
				echo '<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>';
			}
		}
	}

	?>


	<!-- <div class="container bruh text-sm-center h-600"> -->
	<div class="communaute mx-4 p-4 mh-75">
		<div class="container m-auto h-25">
			<div id="carouselAccueil" class="carousel slide carousel-fade h-10 w-100" data-bs-ride="carousel">
				<?php
					$tab = recup_photo_carroussel();
				?>
				<div class="carousel-indicators">
					<?php	
						buttons_carrousel($tab);
					?>
				</div>
				<div class="carousel-inner">
				
					<?php
						
						affiche_photo_carroussel($tab);
					?>
					
				</div>
				<a class="carousel-control-prev" href="#carouselAccueil" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				</a>
				<a class="carousel-control-next" href="#carouselAccueil" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
				</a>
			</div>
		</div>
	</div>

	<div class="container text-sm-center">
		<h1 class="display-1 mx-auto mt-4 w-75" style="font-size: 150px;">#NetBox</h1>
		<!-- <button type="button" class="btn btn-light">Découvrir</button> -->
	</div>

	<div class=" mx-4 my-4 p-4">
		<div class="container mt-5">
			<div class="row">
				<div class="col-lg-4">
					<h5 class="text-center">Créez vos communautés</h5>
					<img class="card-img-top pt-2 img-article-board " src="images/commu.png">
				</div>
				<div class="col-lg-4">
					<h5 class="text-center">Partagez vos photos avec le monde entier</h5>
					<img class="card-img-top pt-2 img-article-board" src="images/partage.png">
				</div>
				<div class="col-lg-4">
					<h5 class="text-center">Aimez, commentez, partagez</h5>
					<img class="card-img-top pt-2 img-article-board" src="images/like.png">
				</div>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="text-center m-5">
			<?php

			if (!isset($_SESSION["id"])) {
				modalInscription();
			}
			?>
		</div>
	</div>


	</footer>

<!-- <div class="modal-footer">

</div>
<div class="container">
	<div class="row">
		<div class="col-sm text-center" >
			<h5> Créez vos communautés</h5>
			<div class="col" id="centre">
				<img class="card-img-top pt-2 img-article-board" src="images/commu.png">
			</div> 
		</div>
		<div class="col-sm text-center">
			<h5>Partagez vos photos avec le monde entier</h5>
			<div class="col" id="centre">
				<img class="card-img-top pt-2 img-article-board" src="images/partage.png">
			</div> 
		</div>
		<div class="col-sm text-center">
			<h5>Aimez, commentez, partagez</h5>
			<div class="col" id="centre">
				<img class="card-img-top pt-2 img-article-board" src="images/like.png">
			</div> 
		</div>
	</div>
</div>
 -->