<?php
$communaute= savoircommu($_GET["page"]);
$donnecommunaute=recupdonnecommu($communaute);
$idcommu = $donnecommunaute[0]['idcommu'];

echo "<div class='container text-center mt-4'>";
echo "<form method='post' action='index.php?page=communaute'>";
echo  "<input id='idcommu' name='idcommu' type='hidden' value= ". $idcommu . ">";
echo  "<input id='nomphoto' name='nomphoto' type='hidden' value= ". $donnecommunaute[0]['image'] . ">";
echo "<input type='submit' name='delcommu' class='btn btn-danger' value='Supprimer la communauté'/>" . "</p>";
echo  "</div>";


$donnepost = recuppost($idcommu);

// var_dump($donnecommunaute);
// var_dump($donnecommunaute[0]);

?>

<div class="container ">

<?php
		echo affiche_imagecommu($donnecommunaute[0]['image']);
?>

<div class="container nomcommu">

<?php

// On récupère toutes les données de la communauté
// echo "<img class='img-fluid' src='images/community.png'>";
echo "<h1 class='pagecommu text-center '>" . $communaute .  "</h1>";
?>
</div>

<div class="container descriptioncommu">
	<?php
echo "<p>" . $donnecommunaute[0]['description'] .  "</p>";
?>
</div>
</div>

<?php

affichepost($donnepost);
 

