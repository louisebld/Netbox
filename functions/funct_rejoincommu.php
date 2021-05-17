<?php



function modalrejointcommu($idcommunaute){
	?>

			<button type="button" class="btn btn-light btn-outline-dark border-light m-2" data-bs-toggle="modal" data-bs-target="#connexionButton" data-bs-whatever="@getbootstrap">Rejoindre</button>

			<div class="modal fade" id="connexionButton" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-body">

							<form class="form-group" method="post" action="index.php?page=accueil">
			
								<input type="text" name="idcommu" value= "<?php echo $idcommunaute; ?>">

								<div class="mb-3 text-center">
									<button type="submit" name="rejoindrecommu" value="rejoindrecommu" class="btn btn-success">Rejoindre la communauté</button>
								</div>
							</form>
						</div>
<!-- 						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
						</div>
 -->					</div>
				</div>
			</div>



	<?php
}


function formulairerejointcommu($idcommunaute) {
// Fonction qui affiche le formulaire de création de communauté
	?>


	<form class="form-group" method="post" action="index.php?page=accueil">

		<input type="hidden" name="idcommu" value= "<?php echo $idcommunaute; ?>">

		<div class="mb-3 text-center">
			<button type="submit" name="rejoindrecommu" value="rejoindrecommu" class="btn btn-outline-secondary">Rejoindre la communauté</button>
		</div>
	</form>

	<?php

}


function afficheboutonquitter($iduser, $idcommu) {

?>

	<form method="post" class='text-center' action="index.php?page=communaute"> 


			<?php	

				echo  '<input id="idcommu" name="idcommu" type="hidden" value= '. $idcommu . ">" ;

                echo  '<input id="iduser" name="iduser" type="hidden" value= '. $iduser . ">" ;

			?>
		
		<!-- <input type="submit" class="btn btn-dark bi-plus-circle" name="ajoutermodo" id="ajoutermodo" value=""/> -->

		<button type="submit" name="quittercommu" value="quittercommu" class="btn btn-danger"> Quitter la communauté </button>

	</form>
	<?php	 
}

