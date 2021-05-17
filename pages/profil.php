<!-- JS permettant de gerer les erreurs avec les modaux, si une erreur existe; alors on ouvre le modal quand on refresh la page -->
<script>
		$(document).ready(function() {
			if (<?php echo trim($_GET["err"])?'true':'false'; ?>) {

				$("#modifPhotoProfil").modal('show');
			}

		});
</script>	

<div class="contener m-5 communaute p-4">

	<?php
	


	if (isset($_SESSION['id'])) {
		$mesposts = recupMesPosts($id);
		$id = $_SESSION['id'];

		$profil = recup_profil_id($id)[0];
			?>
			<!-- Affichage du profil -->
			<div class="container col-lg-8 shadow-lg p-3 mb-5 mt-5 rounded">
			<div class="container shadow p-3 bg-white rounded">
				<div class="row">
					<div class="col-sm-3">
						<img class="roundedImageProfil sm-2"  src="DATA/profil_pp/<?php echo $profil['picture']; ?>">
					</div>
					<!-- Premiere colonne -->
					<div class="col-sm-3 text-">
						<div class="col-sm-3">
							<div style="width: 49%;" class="text-center m-auto m-lg-3"><p class="fs-1 text-center"><?php echo $profil['pseudo']; ?></p></div>	
						</div>
						<div class="col-sm-5 text-center my-4">
							<p class="fs-5">Nombre de publications: <?php echo sizeof($mesposts); ?></p>
						</div>
					</div>
					<!-- Deuxieme colonne -->
					<div class="col-sm-3  mx-auto m-auto">
						<div class="col-sm-5 text-center mt-3 ">
						<button type="button" class="btn btn-outline-secondary btn-sm  me-md-2" action="modifPhotoProfil" data-bs-toggle="modal" data-bs-target="#changerDataProfil">Modifier Vos informations</button>
							<?php
								modalChangerDataProfil($profil);
							?>
						</div>
						<div class="col-sm-5 text-center my-4">
							<a class="btn btn-link" style="text-decoration:none;" role="button" data-bs-toggle="modal" data-bs-target="#modalFollowers">
								<?php		
									echo "<p class='fs-5'>" . countFollowers($id) . " abonnés</p>";
								?>
							</a>
							<div class="modal fade" id="modalFollowers" tabindex="-1" aria-labelledby="modalFollowersLabel" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable h-50">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="modalFollowersLabel">Mes abonnés</h5>
											<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
										</div>
										<div class="modal-body">
											<?php
												$mesfollower = takefollower($_SESSION['id']);
												affichemembre($mesfollower, "id");
											?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- Troisieme colonne -->
					<div class="col-sm-3 mx-auto">
						<div class="col-sm-6 text-center mt-3">
							<!-- Button trigger modal -->
							<button type="button" class="btn btn-outline-secondary btn-sm  me-md-2" action="modifDataProfil" data-bs-toggle="modal" data-bs-target="#changerPhotoProfil">Modifier la photo de profil</button>
							<?php
								modalChangerPhotoProfil();
							?>
						</div>
						<div class="col-sm-6 text-center my-4">
							<!-- Modal Mes abonnements -->
							<a class="btn btn-link" style="text-decoration:none;" role="button" data-bs-toggle="modal" data-bs-target="#modalFollow">
								<?php		
									echo  "<p class='fs-5'>" . countFollows($id) . " abonnements</p>";
								?>
							</a>
							<!-- Modal -->
							<div class="modal fade" id="modalFollow" tabindex="-1" aria-labelledby="modalFollowLabel" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable h-50">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="modalFollowLabel">Mes abonnements</h5>
											<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
										</div>
										<div class="modal-body">
											<?php
												echo '<div class="tab-pane" id="follow" role="tabpanel" aria-labelledby="lescommu-tab">';
													echo '<h5> Mes follows </h5>';
														$mesfollow = takefollow($_SESSION['id']);
														affichemembre($mesfollow, "id");
													echo "<h5> Suggestion de profil : </h5>";
													$usersuggest = getSuggestion($id);
													if ($usersuggest!=[]){
														foreach ($usersuggest as $key => $value) {
															affichemembre(recupDonneProfil($value),'id');
														}
													}
													else {
														echo "Vous n'avez pas de suggestions :(";
													}
											
												echo '</div>';
											?>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<?php 
						echo '<p class="fs-4 mt-4 m-4 fw-bold">' . $profil['nom'] . "</p>"; 
					?>
				</div>
				<div class="row">
					<?php 
						echo '<p class="fs-5 mt-1 m-5">' . $profil['description'] . "</p>"; 
					?>
				</div>
			</div>
				<hr/>
				<div class="row">
					<p class="fs-5 text-center text-muted cursorDis">Publications</p>
				</div>
				<?php 
					affichepost($mesposts);
				?>
			</div>
		<?php 
	}else{

			echo '<script>alert("Vous devez être connecté(e) pour accéder à cette page");
			window.location.href = "./index.php?page=connexion";</script>'; 
			exit();



	}


	?>
		</div>
	</div>
