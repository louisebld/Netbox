<?php
// ------------------------------------------------- RECUPERATION DES DONNEES
// pour le numéro de post
$nbpost= intval(savoirpost($_GET["page"]));
$donnepost = recupdonnepost($nbpost);

$idpost = $donnepost[0]['idpost'];
$idcommunaute = $donnepost[0]['idcommu'];
$commucourante = recupdonnecommuparid($idcommunaute);



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


?>


<div class="container">

<?php
// css à regarder
		echo affichemonpost($donnepost);

		echo '<div class="commentaire">';
		echo "<h2>Ajouter un commentaire :</h2>";
		form_com($idcommunaute, $idpost);
		echo "</div>";
		
		$com = charge_com($idcommunaute, $idpost);
		if (!empty($com)) {
			echo '<div class="sectionCommentaire">';
			echo "<h2>Commentaires: </h2></br>";	
			print_com($com);
			echo "</div>";
		}
?>



</div> 




 

