<?php
$idpersonne= intval(savoirpersonne($_GET["page"]));
$profil = recup_profil_id($idpersonne)[0];
?>
<script src="js/scriptDM.js"></script>

<div class="contener m-5 communaute p-4">
	<div class="container col-lg-8 shadow-lg p-3 mb-5 mt-5 rounded">
		<div class="container shadow p-3 bg-white rounded">
			<div class="row">
				<div class="col-sm-3">
					<img  class="roundedImageProfil" src="DATA/profil_pp/<?php echo $profil['picture']; ?>" >
				</div>
			
			<!-- Premiere colonne -->
			<div class="col-sm-3">
				<div class="col-sm-3">
					<div style="width: 49%;" class="text-center m-auto m-lg-3"><p class="fs-1 text-center"><?php echo $profil['pseudo']; ?></p></div>	
				</div>
				<div class="col-sm-5 text-center my-4 ">
					<!-- <p class="fs-5"><?php echo sizeof($mesposts) . " publications"; ?></p> -->
				</div>
			</div>
			<!-- Deuxieme colonne -->
			<div class="col-sm-3  mx-auto m-auto">

				<div class="col-sm-5 text-center my-4 ">
					<?php		
						echo "<p class='fs-5 profiltop'>" . countFollowers($idpersonne) . " abonnés</p>";
					?>
				</div>
			</div>
			<!-- Deuxieme colonne -->
			<div class="col-sm-3  mx-auto m-auto">

				<div class="col-sm-6 text-center my-4 ">
				<?php
					if ($_SESSION['id']!= $idpersonne){
						if (follow($_SESSION['id'], $idpersonne)){
							afficheboutonunfollow($idpersonne);

						}else {
							afficheboutonfollow($idpersonne);

						}
						afficheboutondm($idpersonne);
					}
				?>
				</div>
			</div>
			<div class="row">
				<?php 
					echo '<p class="fs-5 mt-1 m-5">' . $profil['description'] . "</p>"; 
				?>
			</div>
		</div>
		
	</div>
	<hr/>
	<p class="fs-3 text-center">Communautés :</p>
	<?php 		
		$sescommu = selectcommu($idpersonne);
		affichecommun($sescommu);
	?>
</div>

<!-- <div style="margin-left: 12.5%; width: 75%; margin-top: 50px;">
	 -->
	<?php

	// if ($_SESSION['id']!= $idpersonne){
	// 	if (follow($_SESSION['id'], $idpersonne)){
	// 		afficheboutonunfollow($idpersonne);

	// 	}else {
	// 		afficheboutonfollow($idpersonne);

	// 	}
	// 	afficheboutondm($idpersonne);
	// }
	?>
		<!-- style="width: 50%; margin-left: 25%; margin-top: 50px;" -->
		<!-- <img  class="roundedImageProfil" src="DATA/profil_pp/<?php echo $profil['picture']; ?>" >

		<div style="display: flex;">

			<div style="width: 49%; margin: 0;">Pseudo : <?php echo $profil['pseudo']; ?></div>
		</div>
		<hr>
		<div>
			<p>Description :</p>
			<p style="width: 80%;margin-left: 10%; border:solid black 1px; padding: 5px;"><?php echo $profil['description']; ?></p>
		</div>


		<div>
			<p> Ses communautés :</p> -->
			<?php 		
			// $sescommu = selectcommu($idpersonne);
			// affichecommun($sescommu);

	?>
	<!-- </div>
</div> -->

