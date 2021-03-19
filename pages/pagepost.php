<?php
// ------------------------------------------------- RECUPERATION DES DONNEES
// pour le numéro de post
$nbpost= intval(savoirpost($_GET["page"]));
$donnepost = recupdonnepost($nbpost);

$idpost = $donnepost[0]['idpost'];
$idcommunaute = $donnepost[0]['idcommu'];
$commucourante = recupdonnecommuparid($idcommunaute);
$createur = recupdonneauteurcommu($idcommunaute);

$idcreateur=$createur[0]['idcreateur'];


if (!estdejaawarenesspost($_SESSION['id'], $idpost)) {

	insertawarenesspost($_SESSION['id'], $idpost, $idcommunaute);

}



echo '<div class="contener  m-5 communaute p-4">';
if (estdanscommu($_SESSION['id'], $idcommunaute) || $_SESSION['id']==$idcreateur) {

	?>
	<div class="col-sm-3 d-flex">
		<form>
			<input type = "button" class="btn btn-dark btn-outline-white" value = "Retour à la communauté"  onclick = "history.back()">
		</form>
	</div>
	<div class="container col-lg-6 d-flex float-left">
		<div class="card bg-light">
			<div class="card-header"></div>
				<div class="card-body">
					<?php echo affichemonpost($donnepost); ?>
				</div>
				<?php

				echo '<li class="list-group-item"><div class="contenercommentaire ">';
				echo '<h2 class="mt-2">Ajouter un commentaire :</h2>';
				form_com($idcommunaute, $idpost);
			echo "</div>";				
			$com = charge_com($idcommunaute, $idpost);
			if (!empty($com)) {
				echo '<div class="sectionCommentaire col-sm-12">';
					echo "<h2>Commentaires: </h2></br>";	
					print_com($com);
				echo "</div></li>";
			}


			if (estmodo($_SESSION['id'], $idcommunaute)) {

			// Pour supprimer un post
			echo "<div class='container text-center mt-4'>";
				echo "<form method='post' action='index.php?page=communaute'>";
				// l'id du post
				echo  "<input id='idpost' name='idpost' type='hidden' value= ". $idpost . ">";
				// le nom de la commu
				echo  "<input id='nomcommu' name='nomcommu' type='hidden' value= ". $commucourante[0]['nom'] . ">";
				// le nom de la photo
				echo  "<input id='nomphoto' name='nomphoto' type='hidden' value= ". $donnepost[0]['image'] . ">";
				echo "<input type='submit' name='delpost' class='btn btn-danger' value='Supprimer la publication'/>" . "</p>";
			echo  "</div>";
			}
			?>

		</div>
		<?php
				// echo affichemonpost($donnepost);
				// echo '<div class="commentaire">';
				// 	echo "<h2>Ajouter un commentaire :</h2>";
				// 	form_com($idcommunaute, $idpost);
				// echo "</div>";				
				// $com = charge_com($idcommunaute, $idpost);
				// if (!empty($com)) {
				// 	echo '<div class="sectionCommentaire">';
				// 		echo "<h2>Commentaires: </h2></br>";	
				// 		print_com($com);
				// 	echo "</div>";
				// }



				// // Pour supprimer un post
				// echo "<div class='container text-center mt-4'>";
				// 	echo "<form method='post' action='index.php?page=communaute'>";
				// 	// l'id du post
				// 	echo  "<input id='idpost' name='idpost' type='hidden' value= ". $idpost . ">";
				// 	// le nom de la commu
				// 	echo  "<input id='nomcommu' name='nomcommu' type='hidden' value= ". $commucourante[0]['nom'] . ">";
				// 	// le nom de la photo
				// 	echo  "<input id='nomphoto' name='nomphoto' type='hidden' value= ". $donnepost[0]['image'] . ">";
				// 	echo "<input type='submit' name='delpost' class='btn btn-danger' value='Supprimer la publication'/>" . "</p>";
				// echo  "</div>";
		
			?>
		</div> 
	</div>
</div>

<?php }
else {
		echo '<script>alert("Vous devez être membre de la communauté pour accéder");
	window.location.href = "./index.php?page=communaute";</script>'; 
  	exit();
}

?>


 

