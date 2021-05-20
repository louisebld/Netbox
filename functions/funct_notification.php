<?php

function afficheboutonNotification($idutilisateur) {
	if (anotification($idutilisateur)) {
	?>	
		<div class='text-center'>
		<a href='index.php?page=notification'><button type="submit" name="notification" value="notification" class="btn btn-primary btn-circle btn-xl bi-bell m-1 "><?php echo nbNotifTotal($idutilisateur); ?></button></a>
		</div>

	<?php	
	}
}

function print_formulairemessageNotificationDM($idPersonne,$idNotification) {
// Fonction qui affiche le formulaire
	?>

   <div class="col-12 my-1">
	    <div class="p-2" id="placementNotif">
	    	<?php
	    	if (aTypeDeNotification($idPersonne,$idNotification)) {
	    		//Manière d'afficher les différents type de notification
    			$notifs = RecupNotification($idPersonne,$idNotification);
		    		?>
		    		<form method="post" action="index.php?page=notification" enctype="multipart/form-data">
		    		<?php
		    		foreach ($notifs as $key => $value):
		    		?>
		    		<div class="notification" style="padding: 10px; margin-bottom: 10px">
		    		<p>
		    		<?php
		    			if ( (nbDMDe($idPersonne, $value['idOtherUser'])) > 1 ) {
		    				?>
		    				<h6> <?php echo recup_profil_id($value['idOtherUser'])[0]['pseudo']; ?>, vous a envoyé 
		    					<?php echo nbDMDe($idPersonne, $value['idOtherUser']) ?> nouveaux messages !</h6>
		    				<?php
		    			}else{
		    				?>
		    				<h6> <?php echo recup_profil_id($value['idOtherUser'])[0]['pseudo']; ?>, vous a envoyé 1 nouveau message !</h6>
		    				<?php
		    			}
		    		?>
		    		
		    		
		    		<input type="hidden" id="idCurrentUser" name="idCurrentUser" value="<?php echo $value['idCurrentUser']; ?>" />
		    		<input type="hidden" id="idOtherUser" name="idOtherUser" value="<?php echo $value['idOtherUser']; ?>" />
		    		<input type="hidden" id="type" name="type" value="<?php echo $idNotification; ?>" />
		    		<input type="submit" class="btn btn-primary bi-chat-right-text" name="supprAllNotifDM" id="supprAllNotif" value="Répondre" />
		    		</p>
		    		</div>
		    		</form>
		   		<?php
		    	endforeach;
	    	}
		    	
	    	else { ?>
	    		<h5> Vous n'avez pas de nouveaux messages ! </h5>
	    	<?php } ?>
	    	
	    </div>
	</div>

	<?php

}

function print_formulairemessageNotificationFollow($idPersonne,$idNotification) {
// Fonction qui affiche le formulaire
?>

<div class="col-12 my-1">
	    <div class="p-2" id="placementNotif">
	    	<?php
	    	if (aTypeDeNotification($idPersonne,$idNotification)) {
	    		//Manière d'afficher les différents type de notification
    			$notifs = RecupNotification($idPersonne,$idNotification);
		    		?>
		    		<form method="post" action="index.php?page=notification" enctype="multipart/form-data">
		    		<?php  
		    		foreach ($notifs as $key => $value):
		    			$idOtherUser = $value['idOtherUser'];
		    			$PseudoOtherUser = recup_profil_id($value['idOtherUser'])[0]['pseudo'];
		    		?>
		    		<div class="notification" style="padding: 10px; margin-bottom: 10px">
		    		<p>
		    		<h6> <?php echo "<a class ='stylelien text-center' href=index.php?page=personneid" . $idOtherUser . ">" . $PseudoOtherUser ;?> </a>, vous a follow !</h6>

		    		<input type="hidden" id="idCurrentUser" name="idCurrentUser" value="<?php echo $value['idCurrentUser']; ?>" />
		    		<input type="hidden" id="idOtherUser" name="idOtherUser" value="<?php echo $value['idOtherUser']; ?>" />
		    		<input type="hidden" id="type" name="type" value="<?php echo $idNotification; ?>" />
		    		<input type="submit" class="btn btn-success" name="supprAllNotifFollow" id="supprAllNotif" value="Supprimer la notification" />
		    		</p>
		    		</div>
		    		</form>
		   		<?php
		    	endforeach;
			}
		    	
	    	else { ?>
	    		<h5> Vous n'avez pas de nouveaux followers !</h5>
	    	<?php } ?>
	    	
	    </div>
	</div>
	<input type="hidden" id="idutilisateurNotif" name="idutilisateurNotif" value="<?php if (isset($_SESSION['id'])) {echo $_SESSION['id'];} ?>" />

	<?php
}

function print_recapNotification($idPersonne) {
// Fonction qui affiche le formulaire
?>

<div class="col-12 my-1">
	    <div class="p-2" id="placementNotif">


	    	<div class="p-2" id="placementNotifDM">
		    	<?php
		    	$idNotification = 1;
		    	if (aTypeDeNotification($idPersonne, $idNotification)) {
		    	?>
		    		<h5> Vous avez reçu <?php echo nbNotifDM($idPersonne, $idNotification) ?> nouveaux messages :</h5>
		    		<?php
		    		//Manière d'afficher les différents type de notification
	    			$notifs = RecupNotification($idPersonne,$idNotification);
			    		foreach ($notifs as $key => $value):
			    		?>
			    		<div class="notification" style="padding: 10px; margin-bottom: 10px">
			    		<p>
			    		<?php 
			    			if ( (nbDMDe($idPersonne, $value['idOtherUser'])) > 1 ) {
			    				?>
			    				<h6> <?php echo recup_profil_id($value['idOtherUser'])[0]['pseudo']; ?>, vous a envoyé 
			    					<?php echo nbDMDe($idPersonne, $value['idOtherUser']) ?> nouveaux messages !</h6>
			    				<?php
			    			}else{
			    				?>
			    				<h6> <?php echo recup_profil_id($value['idOtherUser'])[0]['pseudo']; ?>, vous a envoyé 1 nouveau message !</h6>
			    				<?php
			    			}
			    		?>
			    		</p>
			    		</div>
			   		<?php
			    	endforeach;
				}
		    	else { ?>
		    		<h5> Vous n'avez pas de nouveaux messages !</h5>
		    	<?php } ?>
		    </div>


		    <div class="p-2" id="placementNotifFollow">
		    		<?php
		    	$idNotification = 2;
		    	if (aTypeDeNotification($idPersonne, $idNotification)) {
		    	?>
		    		<h5> Vous avez reçu <?php echo nbNotifFollow($idPersonne, $idNotification) ?> nouveaux followers :</h5>
		    		<?php
		    		//Manière d'afficher les différents type de notification
	    			$notifs = RecupNotification($idPersonne,$idNotification);
			    		foreach ($notifs as $key => $value):
			    		?>
			    		<div class="notification" style="padding: 10px; margin-bottom: 10px">
				    		<p>
				    			<h6> <?php echo recup_profil_id($value['idOtherUser'])[0]['pseudo']; ?>, vous follow !</h6>
				    		</p>
			    		</div>
			   		<?php
			    	endforeach;
				}
		    	else { ?>
		    		<h5> Vous n'avez pas de nouveaux followers !</h5>
		    	<?php } ?>
		    </div>


	    </div>
	</div>
	<?php
}
?>