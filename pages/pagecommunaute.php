<?php
$communaute= savoircommu($_GET["page"]);
$donnecommunaute=recupdonnecommu($communaute);
$idcommu = $donnecommunaute[0]['idcommu'];

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
 

