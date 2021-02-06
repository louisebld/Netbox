<div class="contener m-5 p-4">

	<h4>Postez votre photo !</h4>
	<div class="formulairegroupe">

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

</div>