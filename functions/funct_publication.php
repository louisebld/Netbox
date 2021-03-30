<?php

function print_formulairecreationpost() {
// Fonction qui affiche le formulaire de création de post
	?>


	<form method="post" action="index.php?page=publication" enctype="multipart/form-data">


		<div class="form-group">
			<input type="file" name="imagepost" class="form-control">
		</div>

		<br/>
		<div class="form-group">
			<textarea class="form-control" name="description" id="description" placeholder="Légende de votre publication" rows="3"><?php if (isset($_SESSION['donnecreatpost']['description'])) echo $_SESSION['donnecreatpost']['description']; ?></textarea>
		</div>

		<input type="hidden" id="idutilisateur" name="idutilisateur" value="<?php if (isset($_SESSION['id'])) {echo $_SESSION['id'];} ?>" />

		<?php
		listederoulcommu();
		?>


		<br/>
		<center><input type="submit" class="btn btn-primary" name="poster" id="poster" value="Créer" /></center>

	</form>

	<?php

}


function affiche_imagepost($nomimage){

	return $img = '<img src="./images/post/' . $nomimage . '" alt="post" class="  card-img-top pt-2 img-article-board"/>';

}




function affichepost($tableaupost){

	// BUT : afficher les communauté

	// $tableaucommu : tableau associatif contenant les infos des communautés

	echo"<div class='container images-wrapper d-flex'>";
		echo "<div class='card-columns'>";

	foreach ($tableaupost as $key => $value) {
		//Affichage


		echo "<div class='col-lg-4 col-md-12 mb-4 text-center width-auto'>";

	if (!estdejaawarenesspost($_SESSION['id'], $value['idpost'])) {
				echo '<div class="btn btn-warning boutonnew disabled" style="cursor:default;">NEW</div>';

			}
			echo '<div class="card" style="width: 18rem;">';
			echo "<a class='stylelien' href=index.php?page=post" . $value['idpost'] . ">";

			

					echo affiche_imagepost($value['image']);
					echo "<div class='text-start'>" . nbLike(getLike(),$value['idpost']) . " ♥" . "</div>"; 
					echo '<div class="caption img-thumbnail">';
						echo $value["description"];
					echo "</div>";
			echo "</div>";
		echo "</div>";

	}
		echo "</div>";
	echo "</div>";
}


function commenceparpost($chaine) {
  if(strpos($chaine, "post" ) === 0){
      return true;
  }else {
      return false;
}

}

function savoirpost($chaine){
	return substr($chaine, 4, (strlen($chaine)-1));

}


function recupdonnepost($idpost){

	global $db;
	$sql = "SELECT * FROM publication WHERE idpost = $idpost";
	$result=  mysqli_query($db, $sql);

	//on met dans un tableau
	$tableau = [];
	while ($row=mysqli_fetch_assoc($result)) {
		$tableau[] = $row;
	}

	return $tableau;


}

function affichebouttonpartage(){
echo "
<p>
<h3>Partager ce post: </h3>
   <div class='form-group d-flex mx-auto'>
   	<input class='form-control w-auto d-flex mx-3 mt-2' type='url' id='lien' value=''/>
	<button type='button' class='btn btn-dark' onclick='copierLien()'>Copier</button>
   </div>
   
</p>
<script>
	 document.getElementById('lien').value = window.location.href;
</script>
";
}


function affichemonpost($donnepost){

	echo affiche_imagepost($donnepost[0]['image']);
	//Pour la description de la publi
	$auteur = recupAuteur(intval(($donnepost[0]['idauteur'])));
	echo '<div class="container mt-2 mb-4 p-4">';
				//$createur = recupdonneauteurcommu($idcommu);
				$createur = recupdonneauteurpost($donnepost[0]["idpost"]);
				echo '<h5 class="card-title">' . affichemembre ($createur, "id") . "</h5>";
				echo '<p class="card-text">' . $donnepost[0]['description'] . '</p>';

				//Pour liker le post
				echo '<div class="text-end">';
					echo '<div class="container">';
							echo nbLike(getLike(),$donnepost[0]['idpost']);
							echo afficheLikeBouton($donnepost[0]['idpost']);
							echo nbUnlike(getUnlike(),$donnepost[0]['idpost']);
							echo afficheUnlikeBouton($donnepost[0]['idpost']);
			echo'</div>';
		echo'</div>';
		
	echo "</div>";
	//Lien de partage
	echo affichebouttonpartage();

	

	
	$idcomu =  $donnepost[0]['idcommu'];
	$idpost = $donnepost[0]['idpost'];

	

}


	//if (isset($_SESSION['connected'])){

// function affichecommentaire ($idcomu, $idpost){
// 		echo '<div class="commentaire">';
// 		echo "<h2>Ajouter un commentaire :</h2>";
// 		form_com($idcomu, $idpost);
// 		echo "</div>";
		
// 		$com = charge_com($idcomu, $idpost);
// 		if (!empty($com)) {
// 				echo '<div class="sectionCommentaire">';
// 				echo "<h2>Commentaire: </h2></br>";	
// 				print_com($com);
// 				echo "</div>";
// 		}
// 	}

function supprimephotopost($nomphoto){
	unlink('images/post/' . $nomphoto);
}


function afficheFilActu($mescommu, $iduser){
	$tab = [];
	//var_dump(sizeof($mescommu));
	//var_dump($mescommu);
	for ($i=0; $i < sizeof($mescommu); $i++) { 	
		$tab[] = recuppostByID($mescommu[$i]['idcommu'], $iduser);
	}
	//var_dump($tab);
	echo '<div class="container">';
		echo"<div class='row'>";
			foreach ($tab as $key => $value) {
				//var_dump($value);
				foreach ($value as $key2 => $value2) {
					//var_dump(array_unique($value2));
					echo '<div class="col-sm-12 col-lg-7 mx-auto my-4">';	
						echo '<div class="card" style=";">';
							echo affiche_imagepost($value2['image']);
							echo '<div class="card-body">';
								echo '<h5 class="card-title">'. "tom" .'</h5>';
								echo '<p class="card-text">' . $value2['description'] . '</p>';
							echo '</div>';
						echo '</div>';
					echo '</div>';
				}
			}
		echo '</div>';
	echo '</div>';
}