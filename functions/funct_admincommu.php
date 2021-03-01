<?php

function affichemembrebtnmodo ($membrecommu, $namedatabase) {

	foreach ($membrecommu as $key => $value) {
		//Affichage des commentaires
			?>
			<img class="roundedImage" src="DATA/profil_pp/<?php echo $value['picture']; ?>" >
<?php
			echo "<a class ='stylelien' href=index.php?page=personneid" . $value[$namedatabase] . ">" . $value["pseudo"] . '</a>';

			// echo "<a class='stylelien' href=index.php?page=commu" . $value['nom'] . ">";
}
}
