<?php
function print_formulairemessageDM($idDestinataire) {
// Fonction qui affiche le formulaire
	?>

	<!-- <form method="post" action="index.php?page=communaute" enctype="multipart/form-data"> -->

   <div class="col-12 my-1">
   			<ul class="chat-list">

	    <div class="p-2" id="discussionDM">
	    </div>
	</ul>
	</div>

		<input type="hidden" id="idutilisateur" name="idutilisateur" value="<?php if (isset($_SESSION['id'])) {echo $_SESSION['id'];} ?>" />
		<input type="hidden" id="idDestinataire" name="idDestinataire" value="<?php echo $idDestinataire; ?>" />
		<!-- <input type="hidden" id="nomcommu" name="nomcommu" value="<?php //echo $communaute; ?>" /> -->

		
		<div class="form-group form-inline d-flex">
		<input type="text" class='form-control bg-white' placeholder="Message" name="messageDM" id="messageDM">
		<button type="submit" class="btn btn-primary bi-chat-dots m-1" name="posterDM" id="posterDM" value="Envoyer" />

		</div>

	<?php

}

function afficheboutondm($idutilisateur) {
	?>
	<div class='text-center' style="margin: 5px;">
	<button type="button" class="btn btn-primary bi-chat-right-text" data-bs-toggle="modal" data-bs-target="#dmprofil<?php echo $idutilisateur;?>" data-bs-whatever="@getbootstrap"> Envoyer un message</button>
	</div>
	<!-- Modal pour les dms entre différents utilisateurs -->
		<div class="modal fade" id="dmprofil<?php echo $idutilisateur;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h6 class="modal-title" id="exampleModalLabel">Message</h6>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">

						<?php
						print_formulairemessageDM($idutilisateur);
						?>
								
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
					</div>
				</div>
			</div>
		</div>
	<?php	 
}
?>