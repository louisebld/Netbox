<?php
$communaute= savoircommu($_GET["page"]);

?>

<div class="container ">
<img class='card-img-top pt-2 img-article-board' src='images/commu.png'>


<div class="container nomcommu">

<?php

// On récupère toutes les données de la communauté
$donnecommunaute=recupdonnecommu($communaute);
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


 

