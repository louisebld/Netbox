<?php

function afficheboutonfollow($idutilisateurcourant) {

?>

	<form method="post" class='text-center' action="index.php?page=mescommu"> 


			<?php	

				echo  '<input id="idutilisateurcourant" name="idutilisateurcourant" type="hidden" value= '. $idutilisateurcourant . ">" ;

			?>
		
		<!-- <input type="submit" class="btn btn-dark bi-plus-circle" name="ajoutermodo" id="ajoutermodo" value=""/> -->

		<button type="submit" name="follow" value="follow" class="btn btn-success"> Follow </button>

	</form>
	<?php	 
}

function afficheboutonunfollow($idutilisateurcourant) {

?>

	<form method="post" class='text-center' action="index.php?page=mescommu"> 


			<?php	

				echo  '<input id="idutilisateurcourant" name="idutilisateurcourant" type="hidden" value= '. $idutilisateurcourant . ">" ;

			?>
		
		<!-- <input type="submit" class="btn btn-dark bi-plus-circle" name="ajoutermodo" id="ajoutermodo" value=""/> -->

		<button type="submit" name="unfollow" value="unfollow" class="btn btn-danger"> Unfollow </button>

	</form>
	<?php	 
}

function affichefollow($mesfollow){

		foreach ($mesfollow as $key => $value) {
			// var_dump(recup_profil_id($value['idfollowed']));
			// $personne = recup_profil_id($value['idfollowed']);
			// var_dump($personne);
			// echo $personne[0]['pseudo'];

		}
}