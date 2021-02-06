<?php

function print_formulairecreationpost() {
// Fonction qui affiche le formulaire de création de post
	?>


	<form method="post" action="index.php?page=publication" enctype="multipart/form-data">


		<div class="form-group">
			<input type="file" name="imagecom" class="form-control">
		</div>

		<br/>
		<div class="form-group">
			<textarea class="form-control" name="description" id="description" placeholder="Légende de votre publication" rows="3"><?php if (isset($_SESSION['donnecreatcommu']['description'])) echo $_SESSION['donnecreatcommu']['description']; ?></textarea>
		</div>

		<input type="hidden" id="idutilisateur" name="idutilisateur" value="<?php if (isset($_SESSION['id'])) {echo $_SESSION['id'];} ?>" />

		<?php

		listederoulcommu();
		?>


		<br/>
		<center><input type="submit" class="btn btn-primary" name="creercommu" id="creercommu" value="Créer" /></center>

	</form>

	<?php

}