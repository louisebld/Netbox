



<div class="container-fluid bg-dark">
	<div class="navbar-right barre">
		<?php

			if (isset($_SESSION["id"])) {
				$data = recup_profil_id($_SESSION["id"])[0];
				$nom = $data["nom"];
				$prenom = $data["prenom"];

				$_SESSION['pseudo'] = $data["pseudo"];
				$_SESSION['id'] = $data["id"];
				// echo "<button type='button' class='btn btn-light btn-outline-dark border-light m-2' style='text-decoration: none;color: black;'>Accueil</button>";


				echo "<a href='index.php?page=profil'><button type='button' class='btn btn-light btn-outline-dark border-light m-2' style='text-decoration: none;color: black;'>Profil</button></a>";



				?>
				<button type="button" class="btn btn-light btn-outline-dark border-light m-2" data-bs-whatever="@getbootstrap"><a href="index.php?act=deconnexion" style="text-decoration: none;color: black;">Deconnexion</a></button>


				<?php

				modalCommunaute();

			} else {

				modalInscription();

				modalConnection();

				

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

	<div class="container mt-5">
		<div class="row">
			<div class="col-lg-4">
				<h5 class="text-center">Créez vos communautés</h5>
				<img class="card-img-top pt-2 img-article-board" src="images/commu.png">
			</div>
			<div class="col-lg-4">
				<h5 class="text-center">Partagez vos photos avec le monde entier</h5>
				<img class="card-img-top pt-2 img-article-board" src="images/partage.png">
			</div>
			<div class="col-lg-4">
				<h5 class="text-center">Aimez, commentez, partagez</h5>
				<img class="card-img-top pt-2 img-article-board" src="images/like.png">
			</div>
		</div>
	</div>

	<div class="container">
		<div class="text-center m-5">
			<?php

			if (!isset($_SESSION["id"])) {
				modalInscription();
			}
			?>
		</div>
	</div>



	<footer class="barre">
		<div class="container-fluid mt-5" style="height: 300px">
			<div class="row text-light text-center">
				<div class="col-lg-4 mt-5">
					<h5>A propos</h5>
					<p></p>
				</div>
				<div class="col-lg-4 mt-5">
					<h5>Liens utiles</h5>
					<ul class="list-unstyled">
						<li>Accueil</li>
						<li>Espace communautaire</li>
						<li>Mentions légales</li>
					</ul>
				</div>
				<div class="col-lg-4 mt-5">
					<h5>nous contacter</h5>
					<ul  class="list-unstyled">
						<li>Formulaire de contact</li>
						<li>Par mail à netbox@netbox.com</li>
					</ul>
				</div>
			</div>
		</div>
	</footer>

<!-- <div class="modal-footer">

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
 -->