<?php 

/* A deplacer peut etre dans un fichier funct_bddconnection */

function contien_sc($text)
{
	return count(explode("<", $text))>1; 
}

function est_utilise_mail($email)
{
	$res = recup_profil_email($email);
	return count($res) != 0;
}
function est_utilise_pseudo($pseudo)
{
	$res = recup_profil_pseudo($pseudo);
	return count($res) != 0;
}
function recup_profil_id($id)
{
	global $db;
	$sql = "SELECT * FROM `profil` WHERE `id` = '$id'";
	$results = mysqli_query($db,$sql);

	$res = [];
	while($row = mysqli_fetch_assoc($results)){
		$res[] = $row;
	}

	return $res;
}

function print_error($error){
	echo $error;
}


/*_____________________________________________________*/

function modalInscription(){
	/*Bouton pop-up Inscription*/
	?>
		
		<!-- Button Inscription Modal -->
		<button type="button" class="btn btn-light btn-outline-dark border-light m-2" data-bs-toggle="modal" data-bs-target="#inscritionButton" data-bs-whatever="@getbootstrap">S'inscrire</button>

		<!-- Modal Inscription Pop Up-->
		<!-- Remplir les liens -->

		<div class="modal fade" id="inscritionButton" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Inscription</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<!-- Possibilité de tout mettre dans une fonction
							dans un funct_inscription-->
							<form class="form-group" method="post" action="index.php?page=accueil">
								<!-- Nom -->
								<div class="mb-3">
									<label for="nom" class="col-form-label">Nom :</label>
									<input type="text" class="form-control" id="name" name="nom">
								</div>
								<!-- Prenom -->
								<div class="mb-3">
									<label for="prenom" class="col-form-label">Prénom :</label>
									<input type="text" class="form-control" id="fname" name="prenom">
								</div>
								<!-- Pseudo -->
								<div class="mb-3">
									<label for="pseudo" class="col-form-label">Pseudo :</label>
									<input type="text" class="form-control" id="pseudo" name="pseudo">
								</div>
								<!-- Mail -->
								<div class="mb-3">
									<label for="mail" class="col-form-label">Adresse mail :</label>
									<input type="mail" class="form-control" id="mail" name="mail"></input>
								</div>
								<!-- Mdp-->
								<div class="mb-3">
									<label for="mdp" class="col-form-label">Mot de passe :</label>
									<input name="mdp" type="password" class="form-control" id="mdp"></input>
								</div>
								<div class="mb-3">
									<button type="submit" name="inscription" value="Inscription" class="btn btn-primary">S'inscrire</button>
								</div>
							</form>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
						</div>
					</div>
				</div>
			</div>
	<?php
}

function modalConnection(){
	/*Bouton pop-up Connection*/
	?>

			<!-- Button Connection Modal -->
			<button type="button" class="btn btn-light btn-outline-dark border-light m-2" data-bs-toggle="modal" data-bs-target="#connexionButton" data-bs-whatever="@getbootstrap">Se connecter</button>

			<!-- Modal Connection Pop up-->
			<!-- Remplir les liens -->

			<div class="modal fade" id="connexionButton" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Se connecter</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">

							<?php
								if(isset($_SESSION['errC'])){																
									print_error($_SESSION['errC']);
								}
							?>
							<form class="form-group" method="post" action="index.php?page=accueil">
								<!-- Mail -->
								<div class="mb-3">
									<label for="mail" class="col-form-label">Adresse mail :</label>
									<input type="mail" class="form-control" id="mail" name="mail"></input>
								</div>
								<!-- Mdp-->
								<div class="mb-3">
									<label for="mdp" class="col-form-label">Mot de passe :</label>
									<input name="mdp" type="password" class="form-control" id="mdp"></input>
								</div>
								
								<div class="mb-3">
									<button type="submit" name="connexion" value="Connexion" class="btn btn-primary">Connexion</button>
								</div>
							</form>
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