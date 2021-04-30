<?php
$idpersonne= intval(savoirpersonne($_GET["page"]));
$profil = recup_profil_id($idpersonne)[0];
?>


<div style="margin-left: 12.5%; width: 75%; margin-top: 50px;">
<script src="js/scriptDM.js"></script>
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
			
		<img style="width: 50%; margin-left: 25%; margin-top: 50px;" src="DATA/profil_pp/<?php echo $profil['picture']; ?>" >

		<div style="display: flex;">

			<div style="width: 49%; margin: 0;">Pseudo : <?php echo $profil['pseudo']; ?></div>
		</div>
		<hr>
		<div>
			<p>Description :</p>
			<p style="width: 80%;margin-left: 10%; border:solid black 1px; padding: 5px;"><?php echo $profil['description']; ?></p>
		</div>


		<div>
			<p> Ses communautés :</p>
			<?php 		
			$sescommu = selectcommu($idpersonne);
			affichecommun($sescommu);

		?>
		</div>

