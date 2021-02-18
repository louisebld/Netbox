<?php 
if (isset($_SESSION['id'])) {
	$id = $_SESSION['id'];

	$profil = recup_profil_id($id)[0];
	if (isset($_GET['modif'])) {
		$modif= $_GET['modif'];

		if ($modif == "all") {
			?>
			<div style="margin-left: 12.5%; width: 75%; margin-top: 50px;">
				<form  method="post" action="index.php?page=profil&modif=all">
					<p>Nom : <input type="text" name="nom" value="<?php echo $profil['nom']; ?>"></p>
					<p>Prénom : <input type="text" name="prenom" value="<?php echo $profil['prenom']; ?>"></p>
					<p>Pseudo : <input type="text" name="pseudo" value="<?php echo $profil['pseudo']; ?>"></p>
					<p>E-mail : <input type="text" name="mail" value="<?php echo $profil['mail']; ?>"></p>
					<p>Description : <input type="text" name="description" value="<?php echo $profil['description']; ?>"></p>
					<input type="submit" name="modif" value="Sauvegerder" class="btn btn-light">
				</form>
				<hr>
				<div>
					<a href="index.php?page=profil"><button style="color: white;background-color: red; border:none;border-radius: 15%;">Retour</button></a>
					<a href="index.php?page=profil&modif=img"><button style="color: white;background-color: red; border:none;border-radius: 15%;">Image de Profil</button></a>
					<a href="index.php?page=profil&modif=mdp"><button style="color: white;background-color: red; border:none;border-radius: 15%;">Mot de Passe</button></a>
					<a href="index.php?page=profil"><button style="color: white;background-color: red; border:none;border-radius: 15%;">Mot de Passe Oublié !</button></a>
				</div>
			</div>
			<?php
		} else if($modif == "mdp"){
			?>
			<div style="margin-left: 12.5%; width: 75%; margin-top: 50px;">
				<form  method="post" action="index.php?page=profil&modif=mdp">
					<p>Ancien Mot de Passe : <input type="password" name="A_mdp"></p>
					<p>Nouveau Mot de Passe : <input type="password" name="N_mdp"></p>
					<input type="submit" name="modif" value="Sauvegerder" class="btn btn-light">
				</form>
				<hr>
				<div>
					<a href="index.php?page=profil"><button style="color: white;background-color: red; border:none;border-radius: 15%;">Retour</button></a>
					<a href="index.php?page=profil&modif=all"><button style="color: white;background-color: red; border:none;border-radius: 15%;">Information</button></a>
					<a href="index.php?page=profil&modif=img"><button style="color: white;background-color: red; border:none;border-radius: 15%;">Image de Profil</button></a>
					<a href="index.php?page=profil"><button style="color: white;background-color: red; border:none;border-radius: 15%;">Mot de Passe Oublié !</button></a>
				</div>
				<div class="err">
					<?php 
						if (isset($_GET["err"])) {
							echo $_GET["err"];
						}
					 ?>
					
				</div>
			</div>
			<?php
		} else if($modif == "img"){
			?>
			<div style="margin-left: 12.5%; width: 75%; margin-top: 50px;">
				<form  method="post" action="index.php?page=profil&modif=img" enctype="multipart/form-data">
					<p>Choisir votre nouvelle image de Profil : </p>
					<p><input type="file" name="img_profil" id="img_profil"></p>
					
					<input type="submit" name="modif" value="Sauvegarder" class="btn btn-light">
				</form>
				<hr>
				<div>
					<a href="index.php?page=profil"><button style="color: white;background-color: red; border:none;border-radius: 15%;">Retour</button></a>
					<a href="index.php?page=profil&modif=all"><button style="color: white;background-color: red; border:none;border-radius: 15%;">Information</button></a>
					<a href="index.php?page=profil&modif=mdp"><button style="color: white;background-color: red; border:none;border-radius: 15%;">Mot de Passe</button></a>
					<a href="index.php?page=profil"><button style="color: white;background-color: red; border:none;border-radius: 15%;">Mot de Passe Oublié !</button></a>
				</div>
				<div class="err">
					<?php 
						if (isset($_GET["err"])) {
							echo $_GET["err"];
						}
					 ?>
					
				</div>
			</div>
			<?php
		} else if(false){
			# code...
		}
		
		
	} else {	
		?>
		<div style="margin-left: 12.5%; width: 75%; margin-top: 50px;">
		<img style="width: 50%; margin-left: 25%; margin-top: 50px;" src="DATA/profil_pp/<?php echo $profil['picture']; ?>" >
		<hr>
		<div style="display: flex;">
			<div style="width: 49%; margin: 0;">Nom : <?php echo $profil['nom']; ?></div>
			<div style="width: 49%; margin: 0;">Prenom : <?php echo $profil['prenom']; ?></div>
		</div>
		<hr>
		<div style="display: flex;">
			<div style="width: 49%; margin: 0;">Pseudo : <?php echo $profil['pseudo']; ?></div>
			<div style="width: 49%; margin: 0;">E-mail : <?php echo $profil['mail']; ?></div>
		</div>
		<hr>
		<div>
			<p>Description :</p>
			<p style="width: 80%;margin-left: 10%; border:solid black 1px; padding: 5px;"><?php echo $profil['description']; ?></p>
		</div>

		<hr>
		<a href="index.php?page=profil&modif=all"><button style="color: white;background-color: red; border:none;border-radius: 15%;">Editer</button></a>



	</div>
	<hr style="height: 100px;">
	<?php 
}



}else{
	header('location:index.php?page=connexion');

}



?>