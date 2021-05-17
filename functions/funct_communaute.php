<?php


function remplaceApo ($chaine){
		// BUT : remplaceApo : remplace les apostrophes simple par \'
	$search  = array("'");
	$replace = array("\'");
	$res = str_replace($search, $replace, $chaine);
	return $res;
}


function get_file_extension($file) {
		// BUT : get_file_extension : permet d'obtenir extension d'un fichier, decoupe le nom d'un fichier a partir d'un point

		// $file : contient le nom d'un fichier

	return substr(strrchr($file,'.'),1);
}

function enleveespacemaj($chaine) {
	$ch=str_replace(' ','',$chaine);
	return strtolower($ch);

}

function enleveespace($chaine) {
	return str_replace(' ','',$chaine);
}



function print_formulairecreationcommu() {
// Fonction qui affiche le formulaire de création de communauté
	?>


	<form method="post" action="index.php?page=communaute" enctype="multipart/form-data">
		<div class="form-group">
			<input type="text" placeholder="Nom de votre communauté" class="form-control" name="nom"  value="<?php if (isset($_SESSION['donnecreatcommu']['nom'])) echo $_SESSION['donnecreatcommu']['nom']; ?>">
		</div>
		<br/>

		<div class="form-group">
			<input type="file" name="imagecom" class="form-control">
		</div>

		<br/>
		<div class="form-group">
			<textarea class="form-control" name="description" id="description" placeholder="Description de votre communauté" rows="3"><?php if (isset($_SESSION['donnecreatcommu']['description'])) echo $_SESSION['donnecreatcommu']['description']; ?></textarea>
		</div>
		<br/>
		<center><input type="submit" class="btn btn-primary" name="creercommu" id="creercommu" value="Créer" /></center>

	</form>

	<?php

}

function modalButtonCommunaute(){
	//Modal bouton, a combiner avvec modalcommunaute()
	// Button Inscription Modal 
	?>
	<button type="button" class="btn btn-light btn-outline-dark border-light m-2" data-bs-toggle="modal" data-bs-target="#commuBouton" data-bs-whatever="@getbootstrap">Creer une Communauté</button>
	<?php
}

function modalCommunaute(){
	//Modal (popup), a combiner avvec modalcommunaute()
	// Permet de creer une communaute
	?>
		

		<!-- Modal Communaute Pop Up-->
		<!-- Remplir les liens -->

		<div class="modal fade" id="commuBouton" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Créer une communauté</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
							<!-- Gere les erreurs -->
							<?php
								if(isset($_SESSION["erreurcreatcommu"])){																
									print_error($_SESSION["erreurcreatcommu"][0]);
								}
							?>
						<!-- Possibilité de tout mettre dans une fonction
							dans un funct_inscription-->
							<form method="post" action="index.php?page=communaute" enctype="multipart/form-data">
								<!-- Nom de la communauté-->
								<div class="mb-3">
									<p> Ne mettez pas d'accent(s) dans le nom de votre communauté ! </p>
									<label for="nom" class="col-form-label">Nom de la communauté:</label>
									<input type="text" placeholder="Nom de votre communauté" class="form-control" name="nom"  value="<?php if (isset($_SESSION['donnecreatcommu']['nom'])) echo $_SESSION['donnecreatcommu']['nom']; ?>" required>
								</div>
								<!-- Image -->
								<div class="mb-3">
									<label for="imagecom" class="col-form-label">Image :</label>
									<input type="file" name="imagecom" class="form-control">
								</div>
								<!-- Description -->
								<div class="mb-3">
									<label for="description" class="col-form-label">Description :</label>
									<textarea class="form-control" name="description" id="description" placeholder="Description de votre communauté" rows="3"><?php if (isset($_SESSION['donnecreatcommu']['description'])) echo $_SESSION['donnecreatcommu']['description']; ?></textarea>
								</div>
								<div class="mb-3">
									<center><input type="submit" class="btn btn-primary" name="creercommu" id="creercommu" value="Créer" /></center>
								</div>
							</form>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick=''>Fermer</button>
						</div>
					</div>
				</div>
			</div>
	<?php
}


function affiche_imagecommu($nomimage){

	return $img = '<img src="./images/commu/' . $nomimage . '" alt="communaute" class="card-img-top pt-2 imagecommu img-article-board"/>';

}




function affichecommun($tableaucommu){

	// BUT : afficher les communauté

	// $tableaucommu : tableau associatif contenant les infos des communautés

	echo"<div class='container images-wrapper d-flex'>";
		echo "<div class='card-columns'>";

		foreach ($tableaucommu as $key => $value) {
			//Affichage
				echo '<div class="col-sm-6 col-lg-4 mb-4"> ';
				echo "<a class='stylelien' href=index.php?page=commu" . $value['nom'] . ">";
				echo '<div class="card shadow p-3 bg-white rounded" style="width: 18rem;">';

				if (!estbannicommu($_SESSION['id'], $value['idcommu'])) {

					if (estdanscommu($_SESSION['id'], $value['idcommu'])) {
						// affichage du bouton de nombres de notif
						// soustrait le nombre de post dans la commu - le nombre de post vu
						// l'afficher que quand y'a des notifs ?
						$vue = (combienpostcommu(recuppost($value['idcommu'])) - postvucommu($_SESSION['id'], $value['idcommu']));
						
						if ($vue > 0){
							echo '<button class="btn btn-primary boutonnbpost disabled btn-circle btn-lg">'. $vue . '</button>';
						}					}
				
					
					echo '<div class="image_button_superposed">';
						echo affiche_imagecommu($value['image']);
					echo '</div>';
					echo '<div class="card-body">';
					echo '<h5 class="card-title">';
					
					echo '</h5>';
						echo '<p class="card-text"><h5>' . $value["nom"] . '</h5>' . $value["description"] . '</p>';
					echo '</div>';
				echo '</div>';
				echo '</a>';
				echo '</div>';
			}
		}
		echo "</div>";
	echo "</div>";
}



function commenceparcommu($chaine) {

	if(strpos( $chaine, "commu" ) === 0){
		return true;
	}else {
		return false;
	}

}

function savoircommu($chaine){
	return substr($chaine, 5, (strlen($chaine)-1));

}

function supprimephotocommu($nomphoto){
	unlink('images/commu/' . $nomphoto);
}

function new_commu (){
	echo '<div class="d-flex justify-content-end">';
	echo '<button type="button" class="button_fplan btn btn-danger btn-lg" disabled>New</button>';
	echo '</div>';
}


function affichecommunonly($tableaucommu){

	// BUT : afficher les communauté

	// $tableaucommu : tableau associatif contenant les infos des communautés
	
	echo"<div class='container images-wrapper d-flex'>";
		echo "<div class='card-columns'>";

		foreach ($tableaucommu as $key => $value) {
			//Affichage
			// var_dump($value['idcreateur']);
			if (!estdanscommu($_SESSION['id'], $value['idcommu']) && $_SESSION['id'] != intval($value['idcreateur'])) {
				echo '<div class="col-sm-6 col-lg-4 mb-4">';
				echo "<a class='stylelien' href=index.php?page=commu" . $value['nom'] . ">";
					echo '<div class="card shadow p-3 bg-white rounded" style="width: 18rem; ">';



				if (!estbannicommu($_SESSION['id'], $value['idcommu'])) {



					if (estdanscommu($_SESSION['id'], $value['idcommu'])) {
						// affichage du bouton de nombres de notif
						// soustrait le nombre de post dans la commu - le nombre de post vu
						// l'afficher que quand y'a des notifs ?

						echo '<button class="btn btn-warning boutonnbpost disabled btn-circle btn-lg">'. (combienpostcommu(recuppost($value['idcommu'])) - postvucommu($_SESSION['id'], $value['idcommu'])) . '</button>';
						
					}
				
					echo '<h5 class="card-title">';
					
					echo '</h5>';
					echo '<div class="image_button_superposed">';
						echo affiche_imagecommu($value['image']);
					echo '</div>';
					echo '<div class="card-body">';
						echo '<p class="card-text"><h5 >' . $value["nom"] . '</h5>' . $value["description"] . '</p>';
						if (isset($_SESSION['id'])) {
							if (!estdanscommu($_SESSION['id'], $value['idcommu'])) {
							echo '<p >';
							$communaute= $value['idcommu'];
							formulairerejointcommu($communaute);
							echo '</p>';
							}
						}
					echo '</div>';
				echo '</div>';
				echo '</div>';
				echo '</a>';
			}
		}
	}
		echo "</div>";
	echo "</div>";
}



function affichemodificationcommunaute($idcommunaute){

	echo "<div class='container text-center mt-4'>";
	echo "<form method='post' action='index.php?page=communaute'>";
	echo  "<input id='idcommu' name='idcommu' type='hidden' value= ". $idcommunaute . ">";
	echo "<input type='submit' name='delcommu' class='btn btn-danger' value='Supprimer la communauté'/>" . "</p>";
	echo  "</div>";
	echo "</form>";
	echo "<div id='membres'>";
}


function formulairemodificationnomcommu($communaute, $idcommunaute){
?>

							<!-- Button trigger modal -->
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Changementnommodal">
			  Changer le nom
			</button>

			<form method="post" action="index.php?page=communaute" enctype="multipart/form-data">

			<!-- Modal -->
			<div class="modal fade" id="Changementnommodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLabel">Changement du nom de votre communauté</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">


				<input type="text" placeholder="Nom de votre communauté" class="form-control" name="nomcommunautechangementnom"  value="<?php echo $communaute; ?>" required>

				<input type='hidden' name='idcommu' value="<?php echo $idcommunaute ?>">


			      </div>
			      <div class="modal-footer">
					<input type="submit" class="btn btn-primary" name="changementnomcommu" id="changementnomcommu" value="Changer"/>
					</form>

			        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>

			      </div>
			    </div>
			  </div>
			</div>



<?php

}

function formulairemodificationdescriptioncommu($description, $idcommunaute){
?>

							<!-- Button trigger modal -->
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Changementdescriptionmodal">
			  Changer la description
			</button>

			<form method="post" action="index.php?page=communaute" enctype="multipart/form-data">

			<!-- Modal -->
			<div class="modal fade" id="Changementdescriptionmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLabel">Changement de la description de votre communauté</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">


			    <textarea id="nouvelledescription" name="nouvelledescription" class="form-control" rows="5" cols="33"><?php echo $description; ?></textarea required>

				<input type='hidden' name='idcommu' value="<?php echo $idcommunaute ?>">


			      </div>
			      <div class="modal-footer">
					<input type="submit" class="btn btn-primary" name="changementdescriptioncommu" id="changementdescriptioncommu" value="Changer"/>
					</form>

			        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>

			      </div>
			    </div>
			  </div>
			</div>



<?php

}



function formulairemodificationimagecommu($idcommunaute){
?>

							<!-- Button trigger modal -->
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Changementimagemodal">
			  Changer la photo
			</button>

			<form method="post" action="index.php?page=communaute" enctype="multipart/form-data">

			<!-- Modal -->
			<div class="modal fade" id="Changementimagemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLabel">Changement de la photo de votre communauté</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">


				<input type="file" name="nouvelleimagecommu" class="form-control">


				<input type='hidden' name='idcommu' value="<?php echo $idcommunaute ?>">


			      </div>
			      <div class="modal-footer">
					<input type="submit" class="btn btn-primary" name="changementimagecommu" id="changementimagecommu" value="Changer"/>
					</form>

			        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>

			      </div>
			    </div>
			  </div>
			</div>



<?php

}
							
function aucunResultatRecherche(){
	?>	
		<p class="fs-1 text-center">Il n'y aucun résultat</p>
		<img src="images/aucunecommu.png" alt="Aucun résultat">
	<?php
}
