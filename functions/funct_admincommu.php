<?php
function affichemembre ($membrecommu, $namedatabase) {
	echo "<div class='row'>";
	foreach ($membrecommu as $key => $value) {
		//Affichage des commentaires
			?>
			<div class='col-lg-4 col-md-12 mb-4 text-center width-auto'>
			<img class="roundedImage" src="DATA/profil_pp/<?php echo $value['picture']; ?>" >
<?php
			echo "<a class ='stylelien' href=index.php?page=personneid" . $value[$namedatabase] . ">" . $value["pseudo"] . '</a>';
			echo "</div>";

			// echo "<a class='stylelien' href=index.php?page=commu" . $value['nom'] . ">";
}
	echo "</div>";
}

function affichephotomembre($membre){
	foreach ($membre as $key => $value) {
		?>
		<img class="roundedImage" src="DATA/profil_pp/<?php echo $value['picture']; ?>" >
		<?php
	}
}

function affichepseudomembre($membre, $namedatabase){
	foreach ($membre as $key => $value) {
		echo "<a class ='stylelien' href=index.php?page=personneid" . $value[$namedatabase] . ">" . $value["pseudo"] . '</a>';
	}
}



function affichebouton($iduser, $idcommu, $nomcommu) {

?>

	<form method="post" action="index.php?page=communaute"> 


			<?php	

				echo  '<input id="idcommu" name="idcommu" type="hidden" value= '. $idcommu . ">" ;

                echo  '<input id="iduser" name="iduser" type="hidden" value= '. $iduser . ">" ;

				echo "<input type='hidden' name='nomcommu' value=$nomcommu>";

			?>
		
		<!-- <input type="submit" class="btn btn-dark bi-plus-circle" name="ajoutermodo" id="ajoutermodo" value=""/> -->
		<button type="submit" name="ajoutermodo" value="ajoutermodo" class="btn btn-dark bi-plus-circle">Modérateur</button>
		<button type="submit" name="bannirgens" value="bannirgens" class="btn btn-danger bi-slash-circle"> Bannir</button>

	</form>
	<?php	 
}

function affichemembrenonmodo($membre, $namedatabase, $idcommu, $nomcommu) {
	echo "<div class=' d-flex flex-wrap text-center '>";
	foreach ($membre as $key => $value) {
				if (!estmodo($value[$namedatabase], $idcommu)) {

		//Affichage des commentaires
			?>
			<div class="d-flex m-4 text-center global">
			<div class='gauche'>
			<img class="roundedImage" src="DATA/profil_pp/<?php echo $value['picture']; ?>" >
<?php

			echo "<a class ='stylelien' href=index.php?page=personneid" . $value[$namedatabase] . ">" . $value["pseudo"] . '</a>';
			echo "</div>";
			echo "<div class='droite'>";
			affichebouton($value['iduser'], $idcommu, $nomcommu);
			// echo "<a class='stylelien' href=index.php?page=commu" . $value['nom'] . ">";
			echo "</div>";
			echo "</div>";
}
}
			echo "</div>";

}


function afficheboutonmoins($iduser, $idcommu, $nomcommu) {

?>

	<form method="post" action="index.php?page=communaute"> 


			<?php	

				echo  '<input id="idcommu" name="idcommu" type="hidden" value= '. $idcommu . ">" ;

                echo  '<input id="iduser" name="iduser" type="hidden" value= '. $iduser . ">" ;

				echo "<input type='hidden' name='nomcommu' value=$nomcommu>";

			?>
		
		<!-- <input type="submit" class="btn btn-dark bi-plus-circle" name="ajoutermodo" id="ajoutermodo" value=""/> -->
		<button type="submit" name="enlevermodo" value="enlevermodo" class="btn btn-dark bi-dash-circle">Modérateur</button>

	</form>
	<?php	 
}



function affichemembremodo($membre, $namedatabase, $idcommu, $nomcommu) {
	echo "<div class=' d-flex flex-wrap text-center '>";
	foreach ($membre as $key => $value) {
				if (estmodo($value[$namedatabase], $idcommu)) {

		//Affichage des commentaires
			?>
			<div class="d-flex m-4 text-center global">
			<div class='gauche'>
			<img class="roundedImage" src="DATA/profil_pp/<?php echo $value['picture']; ?>" >
<?php

			echo "<a class ='stylelien' href=index.php?page=personneid" . $value[$namedatabase] . ">" . $value["pseudo"] . '</a>';
			echo "</div>";
			echo "<div class='droite'>";
			afficheboutonmoins($value['iduser'], $idcommu, $nomcommu);
			// echo "<a class='stylelien' href=index.php?page=commu" . $value['nom'] . ">";
			echo "</div>";
			echo "</div>";
}
}
			echo "</div>";

}


function affichebarreadmin() {
?>
<div class="btn-group btn-group-justified container" role="group" aria-label="...">
  <a href="#membres" class="btn btn-default" title="Membres" role="button">Membres</a>
  <a href="#moderation" class="btn btn-default" title="Modérateur" role="button">Modération</a>
  <a href="#" class="btn btn-default" title="Bruh" role="button">Bruh</a>
</div>


<?php
}
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

function affichemembrecollapse($membrecommu, $idcommu, $communaute) {
?>
<p>
        <button class="btn btn-default bi-caret-down-square" type="button" data-toggle="collapse" data-target="#reponseCollapse" aria-expanded="false" aria-controls="reponseCollapse">
           Membres de la communauté
        </button>
    </p>


    <div class="collapse" id="reponseCollapse">
        <div class="card card-body">
           <?php 					affichemembrenonmodo($membrecommu, "iduser", $idcommu, $communaute); ?>
        </div>
    </div>

<?php
}

