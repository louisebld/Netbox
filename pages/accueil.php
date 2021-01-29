<div class="container-fluid m-2">
	<div class="navbar-right">

		<?php 
		if (isset($_SESSION["id"])) {
			$data = recup_profil_id($_SESSION["id"])[0];
			$nom = $data["nom"];
			$prenom = $data["prenom"];

			echo "<button type='button' class='btn btn-light'>$nom, $prenom</button>";

			?>
			<button type="button" class="btn btn-light" ><a href="index.php?act=deconnexion" style="text-decoration: none;color: black;">Deconnexion<a/></button>

			<?php

		} else {
			?>
			<button type="button" class="btn btn-light" ><a href="index.php?page=connexion" style="text-decoration: none;color: black;">Se connecter<a/></button>
			<button type="button" class="btn btn-light"><a href="index.php?page=inscription" style="text-decoration: none;color: black;">S'inscrire<a/></button>

			<?php
		}
		 ?>
		<a class="btn btn-success" href="index.php?page=communaute">Communauté</a>


	</div>
</div>
<div class="container-fluid bruh text-sm-center">
	<h1 class="display-1 titre mx-auto  w-75">#ShareLife</h1>
	<h5>Rejoignez vite la communauté</h5>
	<!-- <button type="button" class="btn btn-light">Découvrir</button> -->
</div>

<div class="modal-footer">

</div>
<div class="container">
	<div class="row">
		<div class="col-sm text-center" >
			<h5> Créez vos communautés</h5>
			<div class="col" id="centre">
				<img class="card-img-top pt-2 img-article-board" src="images/commu.png">
			</div> 
		</div>
		<div class="col-sm text-center">
			<h5>Partagez vos photos avec le monde entier</h5>
			<div class="col" id="centre">
				<img class="card-img-top pt-2 img-article-board" src="images/partage.png">
			</div> 
		</div>
		<div class="col-sm text-center">
			<h5>Aimez, commentez, partagez</h5>
			<div class="col" id="centre">
				<img class="card-img-top pt-2 img-article-board" src="images/like.png">
			</div> 
		</div>
	</div>
</div>
