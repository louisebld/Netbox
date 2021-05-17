<!-- <div class="container m-5 p-4 pageminimumtaille communaute"> -->
<div class="container shadow bg-white rounded">
	<div class="row m-3">
		<div class="col-sm-6">
			<div class="gauche">
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
		</div>
		<div class="col-sm-6">
			<div class='droite'>
				<img class="figure-img img-fluid rounded text-end" style='max-height:400px' src="images/bureau.png">
			</div>
		</div>
		
	</div>
</div>