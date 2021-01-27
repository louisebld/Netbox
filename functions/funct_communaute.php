<?php

function print_formulairecreationcommu() {
// Fonction qui affiche le formulaire de création de communauté
	?>


<form method="post" action="index.php?page=communaute">
	<div class="form-group">
		<input type="text" class="form-control" name="nom" placeholder="Nom de votre communauté">
	</div>
<br/>

	<div class="form-group">
		<textarea class="form-control" name="description" id="description" placeholder="Description de votre communauté" rows="3"></textarea>
	</div>
<br/>
<center><input type="submit" class="btn btn-primary" name="creercommu" id="creercommu" value="Créer" /></center>

</form>

<?php

	}