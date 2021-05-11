<div class="contener m-5 p-4 pageminimumtaille global ">

	<div class="formulairegroupe gauche">
	<h2 class='text-center p-2'>Postez votre photo !</h2>

		<?php

		print_formulairecreationpost();
		
		if (isset($_SESSION['erreurpost'])) {
			echo "<ul>";
	// on affiche chaque erreur
			foreach($_SESSION["erreurpost"] as $faute)
				echo "<li>$faute</li>";
			echo "</ul>";

		}

		?>
	</div>

		<div class='droite'>
		<img class="figure-img img-fluid rounded text-end" style='max-height:400px' src="images/ordi.png">
	</div>
</div>