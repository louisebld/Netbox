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


function affiche_imagecommu($nomimage){

	return $img = '<img src="./images/commu/' . $nomimage . '" alt="communaute" class="card-img-top pt-2 imagecommu img-article-board"/>';

}




function affichecommun($tableaucommu){

	// BUT : afficher les communauté

	// $tableaucommu : tableau associatif contenant les infos des communautés

	echo"<div class='container images-wrapper d-flex'>";
	echo "<div class='row'>";

	foreach ($tableaucommu as $key => $value) {
		//Affichage
		echo "<div class='col-lg-4 col-md-12 mb-4 text-center width-auto'>";
		echo '<div class="thumbnail">';
		echo "<a class='stylelien' href=index.php?page=commu" . $value['nom'] . ">";
					// echo	"<img class='card-img-top pt-2 img-article-board' src='images/commu.png'>";
		echo affiche_imagecommu($value['image']);
		echo '<div class="caption img-thumbnail">';
		echo "<h5>" . $value["nom"] . "</h5>\n";
		echo $value["description"];
		echo "</div>";
		echo "</div>";

		echo "</div>";

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
