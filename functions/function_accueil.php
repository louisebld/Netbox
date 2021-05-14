<?php 
	function recup_photo_carroussel(){
		//Function qui recupere 6 photos pour gerer le diaporama sur l'accueil, au hasard
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
		//Function qui affiche les photos dans le diaporama
		//$tableau : tableau de photo (données de photo)
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
		//Permet de gerer les boutons au sud du diapo
		for ($i=0; $i < sizeof($tableau); $i++) { 
			if ($i == 0){
				echo '<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>';
		
			}else {
				echo '<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>';
			}
		}
	}

	function modalChangerPhotoProfil(){
		//Modal qui permet de changer de pp
		?>

			<!-- Modal -->
			<div class="modal fade" id="changerPhotoProfil" tabindex="-1" aria-labelledby="changerPhotoProfilLabel" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
					<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="changerPhotoProfilLabel">Changer votre photo de Profil</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<div style="margin-left: 12.5%; width: 75%; margin-top: 50px;">
							<form  method="post" action="index.php?page=profil&modif=img" enctype="multipart/form-data">
								<div class="mb-3">
									<label for="formFile" class="form-label fs-5">Choisir votre nouvelle image de Profil : </label>
									<input class="form-control" type="file" name="img_profil" id="img_profil">
								</div>
							<div class="err">
								<?php 
									if (isset($_GET["err"])) {
										echo $_GET["err"];
									}
								?>
								
							</div>
						</div>
						<img src="images/changePP.png" class="d-block w-100" alt="bruh">';
					</div>
					<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
							<input type="submit" name="modif" value="Sauvegarder" class="btn btn-light">
						</form>
					</div>
					</div>
				</div>
			</div>
		<?php
	}


	function modalChangerDataProfil($profil){
		//Modal qui permet de gerer tous les changements des données de l'utilisateur.
		?>

			<!-- Modal -->
			<div class="modal fade" id="changerDataProfil" tabindex="-1" aria-labelledby="changerDataProfilLabel" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
					<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="changerDataProfilLabel">Changer vos informations</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<div style="margin-left: 12.5%; width: 75%; margin-top: 50px;">
							<form  method="post" action="index.php?page=profil&modif=all">
								<div class="input-group mb-3">
									<span class="input-group-text" id="basic-addon1">Nom</span>
									<input type="text" name="nom" value="<?php echo $profil['nom']; ?>" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
								</div>
								<div class="input-group mb-3">
									<span class="input-group-text" id="basic-addon1">Prénom</span>
									<input type="text" name="prenom" value="<?php echo $profil['prenom']; ?>" class="form-control" placeholder="prenom" aria-label="prenom" aria-describedby="basic-addon1">
								</div>
								<div class="input-group mb-3">
									<span class="input-group-text" id="basic-addon1">Pseudo</span>
									<input type="text" name="pseudo" value="<?php echo $profil['pseudo']; ?>" class="form-control" placeholder="pseudo" aria-label="pseudo" aria-describedby="basic-addon1">
								</div>
								<div class="input-group mb-3">
									<input type="text" name="mail" value="<?php echo $profil['mail']; ?>" class="form-control" placeholder="mail" aria-label="mail" aria-describedby="basic-addon2">
									<span class="input-group-text" id="basic-addon2">exemple@exemple.com</span>
								</div>
								<div class="input-group mb-3">
									<span class="input-group-text" id="basic-addon1">Description :</span>
									<input type="text" name="description" value="<?php echo $profil['description']; ?>" class="form-control" placeholder="description" aria-label="description" aria-describedby="basic-addon1">
								</div>
								
							
							<!-- <hr>
							<div>
								<a href="index.php?page=profil"><button style="color: white;background-color: red; border:none;border-radius: 15%;">Retour</button></a>
								<a href="index.php?page=profil&modif=img"><button style="color: white;background-color: red; border:none;border-radius: 15%;">Image de Profil</button></a>
								<a href="index.php?page=profil&modif=mdp"><button style="color: white;background-color: red; border:none;border-radius: 15%;">Mot de Passe</button></a>
							</div> -->
							<img src="images/changeDATA.png" class="d-block w-100" alt="bruh">';
						</div>
						
					</div>
					<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
							<input type="submit" name="modif" value="Sauvegarder" class="btn btn-light">
							
						</form>
					</div>
					</div>
				</div>
			</div>
		<?php
	}


	?>


	