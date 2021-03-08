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
						<!-- Possibilité de tout mettre dans une fonction
							dans un funct_inscription-->
							<form method="post" action="index.php?page=communaute" enctype="multipart/form-data">
								<!-- Nom de la communauté-->
								<div class="mb-3">
									<p> Ne mettez pas d'accent(s) dans le nom de votre communauté ! </p>
									<label for="nom" class="col-form-label">Nom de la communauté:</label>
									<input type="text" placeholder="Nom de votre communauté" class="form-control" name="nom"  value="<?php if (isset($_SESSION['donnecreatcommu']['nom'])) echo $_SESSION['donnecreatcommu']['nom']; ?>">
								</div>
								<!-- Image -->
								<div class="mb-3">
									<label for="imagecom" class="col-form-label">Image :</label>
									<input type="file" name="imagecom" class="form-control">
								</div>
								<!-- Pseudo -->
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
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
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
			
				echo '<div class="card" style="width: 18rem;">';
					if (isset($_SESSION['id'])) {
						if (!estdanscommu($_SESSION['id'], $value['idcommu'])) {
						echo '<h5 class="card-header">';
						$communaute= $value['idcommu'];
						formulairerejointcommu($communaute);
						echo '</h5>';
						}
					}
				
					echo '<h5 class="card-title">';
					echo "<a class='stylelien' href=index.php?page=commu" . $value['nom'] . ">";
					echo '</h5>';
					echo '<div class="image_button_superposed">';
						echo affiche_imagecommu($value['image']);
					echo '</div>';
					echo '<div class="card-body">';
						echo '<p class="card-text"><h5>' . $value["nom"] . '</h5>' . $value["description"] . '</p>';
					echo '</div>';
				echo '</div>';
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