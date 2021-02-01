<?php

function print_formulairecreationpost() {
// Fonction qui affiche le formulaire de création de post
	?>


	<form method="post" action="index.php?page=communaute" enctype="multipart/form-data">
		<div class="form-group">
			<input type="text" placeholder="Nom de votre communauté" class="form-control" name="nom"  value="<?php if (isset($_SESSION['donnecreatcommu']['nom'])) echo $_SESSION['donnecreatcommu']['nom']; ?>">
		</div>
		<br/>

		<div class="form-group">
			<input type="file" name="imagecom" class="form-control">
		</div>

		<br/>
		<div class="form-group">
			<textarea class="form-control" name="description" id="description" placeholder="Description de votre communauté" rows="3"><?php if (isset($_SESSION['donnecreatcommu']['description'])) echo $_SESSION['donnecreatcommu']['description']; ?></textarea>
		</div>
		<br/>
		<center><input type="submit" class="btn btn-primary" name="creercommu" id="creercommu" value="Créer" /></center>

	</form>

	<?php

}