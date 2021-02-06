<?php
$nbpost= intval(savoirpost($_GET["page"]));
$donnepost = recupdonnepost($nbpost);

// var_dump($donnecommunaute);
// var_dump($donnecommunaute[0]);

?>

<div class="container">

<?php
// css à regarder
		echo affichemonpost($donnepost);
?>
</div>



 

