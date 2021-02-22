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

	return $img = '<img src="./images/post/' . $nomimage . '" alt="post" class="card-img-top pt-2 img-article-board"/>';

}




function affichepost($tableaupost){

	// BUT : afficher les communauté

	// $tableaucommu : tableau associatif contenant les infos des communautés

	echo"<div class='container images-wrapper d-flex'>";
		echo "<div class='row'>";

	foreach ($tableaupost as $key => $value) {
		//Affichage
		echo "<div class='col-lg-4 col-md-12 mb-4 text-center width-auto'>";
			echo '<div class="thumbnail">';
			echo "<a class='stylelien' href=index.php?page=post" . $value['idpost'] . ">";
					echo affiche_imagepost($value['image']);
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
	$auteur = recupAuteur($donnepost[0]['idauteur']);
	echo '<div class="container mt-2 mb-4 p-4">';
		echo '<div class="card">';
			echo '<div class="card-body">';
				echo '<h5 class="card-title">' . $auteur['pseudo'] . "</h5>";
				echo '<p class="card-text">' . $donnepost[0]['description'] . '</p>';
				//Pour liker le post
				echo '<div class="float-right">';
					echo '<div class="container">';
						echo '<div class="col-1 bg-light">';
							echo nbLike(getLike(),$donnepost[0]['idpost']);
							echo afficheLikeBouton($donnepost[0]['idpost']);
						echo "</div>";
					echo '</div>';
				echo '</div>';
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

//------------------------------------------------------------function gestion des likes

function getLike(){
    global $db;
    $tab = [];
    $sql = "select * from likes";
    $result = mysqli_query($db,$sql);
    
    while($row = mysqli_fetch_assoc($result)){
        $tab[] = $row;
    }
    return $tab;
}
function afficheLikeBouton($idpost){
    $likeButton= "<button type='button' class='btn btn-dark' name='like' onclick=\"location.href='./index.php?page=commuJeusociete&idpost=$idpost'\">like</button>";
	//$likeButton= '<button type="submit" name="like" value="like" class="btn btn-danger btn-xl bi-heart-half m-1"></button>';
    return $likeButton;
}

function dejaLike($idpost,$idUser){
	global $db;
    $sql="SELECT * FROM `likes` WHERE likes.idpost=$idpost;";
    $tab = [];
    $result = mysqli_query($db,$sql);
    while($row = mysqli_fetch_assoc($result)){
        $tab[] = $row;
    }
    $res=False;
    foreach($tab as $key => $value){
        if ($value['iduser']==$idUser){
            $res=True;
        }
    }
    return $res;
}

function like($idpost,$idUser){
	global $db;
    if (!dejaLike($idpost,$idUser)){
        $sql="INSERT INTO `likes`(`idlike`, `idpost`, `iduser`) VALUES (NULL,$idpost,$idUser);";
        var_dump($sql);
	    mysqli_query($db, $sql); //on fait la requete
    }  
}

function nbLike($like,$idpost){
    $cptLike = 0;
    foreach ($like as $key => $value){
		if ($value['idpost']==$idpost){
			$cptLike++;
		}   
    }
    return $cptLike;
}


