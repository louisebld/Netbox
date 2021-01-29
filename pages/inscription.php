<div class="container-fluid m-2">
	<div class="navbar-right">
		<button type="button" class="btn btn-light" ><a href="index.php?page=accueil" style="text-decoration: none;color: black;">Accueil<a/></button>
		<button type="button" class="btn btn-light" ><a href="index.php?page=connexion" style="text-decoration: none;color: black;">Se connecter<a/></button>
		<a class="btn btn-success" href="index.php?page=communaute">Communauté</a>


	</div>
</div>

<div class="container" >
	<form class="form-group" method="post" action="index.php?page=inscription">
		<h3>Inscription</h3>
		<p>
			Nom : 
			<input type="text" name="nom">
			Prenom : 
			<input type="text" name="prenom">
		</p>
		<p>
			Pseudo : 
			<input type="text" name="pseudo">
			
		</p>
		<p>
			E-mail : 
			<input type="mail" name="mail">
			
		</p>
		<p>
			Mot de passe : 
			<input type="password" name="mdp">
			
		</p>
		<p>
			<input type="submit" name="inscription" value="Inscription" class="btn btn-light">
			
		</p>


	</form>
	<div id="errI">
		<?php 
			if (isset($_SESSION["errI"])) {
				echo $_SESSION["errI"];
			}
			

		 ?>
	</div>

</div>