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

function afficheboutonsignaler($iduser, $idmodo, $idcommu, $nomcommu) {

?>

	<form method="post" action="index.php?page=communaute"> 
		
		<!-- <input type="submit" class="btn btn-dark bi-plus-circle" name="ajoutermodo" id="ajoutermodo" value=""/> -->

		<!-- Affichage du button en fonction de s'il est pas signaler / signaler par le même modo / ou signaler -->
		<?php if (!estsignaler($iduser, $idcommu) && !estsignalerpar($iduser, $idmodo, $idcommu)) { ?>
			<button type="button" class="btn btn-danger bi-exclamation-circle" data-bs-toggle="modal" data-bs-target="#signal<?php echo $iduser;?>" data-bs-whatever="@getbootstrap">Signaler</button>
		<?php } elseif (estsignaler($iduser, $idcommu) && !estsignalerpar($iduser, $idmodo, $idcommu)) { ?>
			<button type="button" class="btn btn-warning bi-exclamation-circle" data-bs-toggle="modal" data-bs-target="#signal<?php echo $iduser;?>" data-bs-whatever="@getbootstrap">Signaler</button>
		<?php } else {?>
			<button type="button" class="btn btn-warning bi-check2" data-bs-toggle="modal" data-bs-target="#signal<?php echo $iduser;?>" data-bs-whatever="@getbootstrap"> Signaler </button>
		<?php } ?>

		<!-- Modal pour les raisons du signalement -->
		<div class="modal fade" id="signal<?php echo $iduser;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h6 class="modal-title" id="exampleModalLabel">Signalement</h6>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
							<?php if (!estsignalerpar($iduser, $idmodo, $idcommu)) { ?>
								<!-- Gere les erreurs -->
								<?php
									// if(isset($_SESSION['errS'])){																
									// 	print_error($_SESSION['errS']);
									// }
								?>
								
								<!-- Formulaire -->
								<form method="post" action="index.php?page=communaute"> 

									<label for="raison" class="col-form-label">Raison :</label>
									<input type="text" class="form-control" id="raison" name="raison">
									<?php	

										echo  '<input id="idcommu" name="idcommu" type="hidden" value= '. $idcommu . ">" ;

						                echo  '<input id="iduser" name="iduser" type="hidden" value= '. $iduser . ">" ;

						                echo  '<input id="idmodo" name="idmodo" type="hidden" value= '. $idmodo . ">" ;

										echo  "<input type='hidden' name='nomcommu' value=$nomcommu>";
									?>
								<div class="mb-3">
									<button type="submit" name="signalgens" value="signalgens" class="btn btn-primary"> Signaler </button>
								</div>

							<!-- Message si le modo l'a déja signalé (mis en forme peut-être à faire)-->
							<?php } else { ?>
								<p>Vous avez déja signalé cette utilisateur</p>
							<?php } ?>

							</form>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
						</div>
					</div>
				</div>
			</div>
	</form>
	<?php	 
}

function affichebouton($iduser, $idcommu, $nomcommu) {

?>

	<form method="post" action="index.php?page=communaute"> 


			<?php	

				echo  '<input id="idcommu" name="idcommu" type="hidden" value= '. $idcommu . ">" ;

                echo  '<input id="iduser" name="iduser" type="hidden" value= '. $iduser . ">" ;

				echo  "<input type='hidden' name='nomcommu' value=$nomcommu>";

			?>
		
		<!-- <input type="submit" class="btn btn-dark bi-plus-circle" name="ajoutermodo" id="ajoutermodo" value=""/> -->
		<button type="submit" name="ajoutermodo" value="ajoutermodo" class="btn btn-dark bi-plus-circle">Modérateur</button>
		<button type="submit" name="bannirgens" value="bannirgens" class="btn btn-danger bi-slash-circle"> Bannir</button>

	</form>
	<?php	 
}

function afficheboutondesignalban($iduser, $idcommu, $nomcommu) {

?>
	<div>
		<form method="post" action="index.php?page=communaute"> 


				<?php	

					echo  '<input id="idcommu" name="idcommu" type="hidden" value= '. $idcommu . ">" ;

	                echo  '<input id="iduser" name="iduser" type="hidden" value= '. $iduser . ">" ;

					echo  "<input type='hidden' name='nomcommu' value=$nomcommu>";

				?>
			
			<!-- <input type="submit" class="btn btn-dark bi-plus-circle" name="ajoutermodo" id="ajoutermodo" value=""/> -->
			<button type="submit" name="designaluser" value="designaluser" class="btn btn-warning bi-check2"> Enlever Signalement </button>
			<button type="submit" name="bannirgens" value="bannirgens" class="btn btn-danger bi-slash-circle"> Bannir</button>

		</form>
	</div>
	<?php	 
}

function affichemembrenonmodo($membre, $namedatabase, $idcommu, $nomcommu) {

	$createur = recupdonneauteurcommu($idcommu);

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
			if ($_SESSION['id']==$createur[0]['id']) {
			affichebouton($value['iduser'], $idcommu, $nomcommu);
			}
			if (estmodo($_SESSION['id'], $idcommu)) {
			afficheboutonsignaler($value['iduser'], $_SESSION['id'], $idcommu, $nomcommu);
			}
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

function affichemembresignale($membre, $namedatabase, $idcommu, $nomcommu) {

	$createur = recupdonneauteurcommu($idcommu);
	$compteur = 0;

	echo "<div class=' d-flex flex-wrap text-center '>";
	foreach ($membre as $key => $value) {
		$idmembre = $value[$namedatabase];
		if (estsignaler($idmembre, $idcommu)) {

		$compteur = $compteur + 1;

		//Affichage des commentaires
			?>
			<div class="d-flex m-4 text-center global">
			<div class='gauche'>
			<img class="roundedImage" src="DATA/profil_pp/<?php echo $value['picture']; ?>" >
			<?php

			echo "<a class ='stylelien' href=index.php?page=personneid" . $value[$namedatabase] . ">" . $value["pseudo"] . '</a>';
			affichemodosignal($idmembre,$idcommu);
			echo "</div>";

			echo "<div>";
			if ($_SESSION['id']==$createur[0]['id']) {
			afficheboutondesignalban($value['iduser'], $idcommu, $nomcommu);
			}
			echo "</div>";
			echo "</div>";
			
		}
			
	}
			echo "</div>";
}

function affichemodosignal($iduser, $idcommu){ 
	// 
	?>
	<div>
  		<button type='button' class='dropdown-item' data-bs-toggle='modal' data-bs-target='#listesignal<?php echo $iduser;?>' data-bs-whatever='@getbootstrap'>
    	<?php
    	echo nbsignalement($iduser,$idcommu). ' Signalement(s)';
    	?>
    	</button>
  		<?php
		$modo = recupmodosignalement($iduser,$idcommu);
			?>
			<!-- Modal pour les raisons du signalement -->
			<div class="modal fade" id="listesignal<?php echo $iduser;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h6 class="modal-title" id="exampleModalLabel">Signalement</h6>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
							<?php
							foreach ($modo as $key => $value) {
							?>	
								<div>
								<img class="roundedImage" src="DATA/profil_pp/<?php echo $value['picture']; ?>" >
								<?php
								echo "<a class ='stylelien' href=index.php?page=personneid" . $value['iduser'] . ">" . $value["pseudo"] . '</a>';
								?>
								</div>

							<?php }	?>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
						</div>
					</div>
				</div>
			</div>
  	</div>
<?php 
}


function affichemembremodo($membre, $namedatabase, $idcommu, $nomcommu) {

	$createur = recupdonneauteurcommu($idcommu);

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
			if ($_SESSION['id']==$createur[0]['id']) {
			afficheboutonmoins($value['iduser'], $idcommu, $nomcommu);
			}
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
  <a href="#banni" class="btn btn-default" title="Bruh" role="button">Membres bannis</a>
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

function afficheboutondeban($iduser, $idcommu, $nomcommu) {

?>

	<form method="post" action="index.php?page=communaute"> 


			<?php	

				echo  '<input id="idcommu" name="idcommu" type="hidden" value= '. $idcommu . ">" ;

                echo  '<input id="iduser" name="iduser" type="hidden" value= '. $iduser . ">" ;

				echo "<input type='hidden' name='nomcommu' value=$nomcommu>";

			?>
		
		<!-- <input type="submit" class="btn btn-dark bi-plus-circle" name="ajoutermodo" id="ajoutermodo" value=""/> -->
		<button type="submit" name="debanuser" value="debanuser" class="btn btn-warning bi-check2">Débannir</button>

	</form>
	<?php	 
}

function affichemembredeban($membre, $namedatabase, $idcommu, $nomcommu) {

	$createur = recupdonneauteurcommu($idcommu);

	echo "<div class=' d-flex flex-wrap text-center '>";
	foreach ($membre as $key => $value) {
		//Affichage des commentaires
			?>
			<div class="d-flex m-4 text-center global">
			<div class='gauche'>
			<img class="roundedImage" src="DATA/profil_pp/<?php echo $value['picture']; ?>" >
<?php

			echo "<a class ='stylelien' href=index.php?page=personneid" . $value[$namedatabase] . ">" . $value["pseudo"] . '</a>';
			echo "</div>";
			echo "<div class='droite'>";
			if ($_SESSION['id']==$createur[0]['id']) {
			afficheboutondeban($value['iduser'], $idcommu, $nomcommu);
			}
			// echo "<a class='stylelien' href=index.php?page=commu" . $value['nom'] . ">";
			echo "</div>";
			echo "</div>";
}
			echo "</div>";

}


function affichemembrepublieleplus ($membrecommu, $namedatabase, $idcommu) {
	echo "<div class='row'>";
	foreach ($membrecommu as $key => $value) {
		//Affichage des commentaires
			?>
			<div class='col-lg-4 col-md-12 mb-4 text-center width-auto'>
			<img class="roundedImage" src="DATA/profil_pp/<?php echo $value['picture']; ?>" >
<?php
			echo "<a class ='stylelien' href=index.php?page=personneid" . $value[$namedatabase] . ">" . $value["pseudo"] . '</a>';
			echo "<p>";
			echo "<div class='bi-file-earmark-richtext'> " . recupnbpost($value[$namedatabase], $idcommu) . "</div>";
			echo "</p>";
			echo "</div>";


			// echo "<a class='stylelien' href=index.php?page=commu" . $value['nom'] . ">";
}
	echo "</div>";

}


function affichemembrecommenteleplus ($membrecommu, $namedatabase, $idcommu) {
	echo "<div class='row'>";
	foreach ($membrecommu as $key => $value) {
		//Affichage des commentaires
			?>
			<div class='col-lg-4 col-md-12 mb-4 text-center width-auto'>
			<img class="roundedImage" src="DATA/profil_pp/<?php echo $value['picture']; ?>" >
<?php
			echo "<a class ='stylelien' href=index.php?page=personneid" . $value[$namedatabase] . ">" . $value["pseudo"] . '</a>';
			echo "<p>";
			echo "<div class='bi-chat'> " . recupnbcom($value[$namedatabase], $idcommu) . "</div>";
			echo "</p>";
			echo "</div>";


			// echo "<a class='stylelien' href=index.php?page=commu" . $value['nom'] . ">";
}
	echo "</div>";

}
