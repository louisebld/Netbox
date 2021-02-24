<!-- <div class="contener gros p-4 m-4 text-sm-center">
	<h4>En cours de construction, ne modifiez rien sur cette page svp (sinon conflit)</h4>
</div>
 -->




<!-- Au cas ou on voudrais remettre le bouton pour creer une communauté dans la page principale  -->
<!-- <div class="contener m-5 communaute p-4">

	<h4>Créez votre communauté !</h4>
	<div class="formulairegroupe m-auto">

		<?php
	

		// if (isset($_SESSION['erreurcreatcommu'])) {
		// 	echo "<ul>";
		// 	// on affiche chaque erreur
		// 	foreach($_SESSION["erreurcreatcommu"] as $faute){
		// 		echo "<li>$faute</li>";
		// 	}
		// 	echo "</ul>";

		// }
		?>
	</div>

</div> -->

<div class="contener m-5 communaute p-4">

	<h4 class="mb-4">Mes communautés</h4>


<?php
if (isset($_SESSION['id'])) {
$mescommu = selectcommu($_SESSION['id']);
affichecommun($mescommu);
}
?>


</div>








<div class="contener m-5 communaute p-4">

	<h4 class="mb-4">Découvrez les communautés déjà existantes..</h4>

	<!-- <div class='container mt-4'>
        <form method='post' class='form-group' action='index.php?page=communaute'>
          <input class='form-control mr-sm-2' name='recherchecommu' type='text' placeholder='Communauté' aria-label='Search'>

          <input type='submit' name='cherchercommu' class='btn btn-outline-primary' value='Chercher'/>
        </form>
   
    </div> -->


<?php

affichecommun($tableaucommu);

?>


</div>

