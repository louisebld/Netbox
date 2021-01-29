<div class="container-fluid m-2">
	<div class="navbar-right">
		<button type="button" class="btn btn-light" ><a href="index.php?page=accueil" style="text-decoration: none;color: black;">Accueil<a/></button>
		<button type="button" class="btn btn-light"><a href="index.php?page=inscription" style="text-decoration: none;color: black;">S'inscrire<a/></button>
		<a class="btn btn-success" href="index.php?page=communaute">Communauté</a>


	</div>
</div>

<div class="container" >
	<form class="form-group" method="post" action="index.php?page=connexion">
		<h3>Connexion</h3>
		<p>
			E-mail : 
			<input type="mail" name="mail">
			
		</p>
		<p>
			Mot de passe : 
			<input type="password" name="mdp">
			
		</p>
		<p>
			<input type="submit" name="connexion" value="Connexion" class="btn btn-light">
			
		</p>


	</form>
	<div id="errC">
		<?php 
			if (isset($_SESSION["errC"])) {
				echo $_SESSION["errC"];
			}
			

		 ?>
	</div>

</div>