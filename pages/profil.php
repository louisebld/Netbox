


<div class="contener m-5 communaute p-4">
	<ul class="nav nav-tabs" id="myTab" role="tablist">
		<li class="nav-item">
			<a class="nav-link active" id="filActu-tab" data-toggle="tab" href="#monprofil" role="tab" aria-controls="filActu" aria-selected="true"><h7 class="" id="lesCommu">Mon profil</h7></a>
		</li>

		<li class="nav-item">
			<a class="nav-link" id="filActu-tab" data-toggle="tab" href="#follow" role="tab" aria-controls="filActu" aria-selected="true"><h7 class="" id="lesCommu">Mes follows</h7></a>
		</li>

		<li class="nav-item">
			<a class="nav-link" id="filActu-tab" data-toggle="tab" href="#followers" role="tab" aria-controls="filActu" aria-selected="true"><h7 class="" id="lesCommu">Mes followers</h7></a>
		</li>

	</ul>
		<div class="tab-content" id="myTabContent">




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
					<input type="submit" name="modif" value="Sauvegarder" class="btn btn-light">
				</form>
				<hr>
				<div>
					<a href="index.php?page=profil"><button style="color: white;background-color: red; border:none;border-radius: 15%;">Retour</button></a>
					<a href="index.php?page=profil&modif=img"><button style="color: white;background-color: red; border:none;border-radius: 15%;">Image de Profil</button></a>
					<a href="index.php?page=profil&modif=mdp"><button style="color: white;background-color: red; border:none;border-radius: 15%;">Mot de Passe</button></a>
				</div>
			</div>
			<?php
		} else if($modif == "mdp"){
			?>
			<div style="margin-left: 12.5%; width: 75%; margin-top: 50px;">
				<form  method="post" action="index.php?page=profil&modif=mdp">
					<p>Ancien Mot de Passe : <input type="password" name="A_mdp"></p>
					<p>Nouveau Mot de Passe : <input type="password" name="N_mdp"></p>
					<input type="submit" name="modif" value="Sauvegarder" class="btn btn-light">
				</form>
				<hr>
				<div>
					<a href="index.php?page=profil"><button style="color: white;background-color: red; border:none;border-radius: 15%;">Retour</button></a>
					<a href="index.php?page=profil&modif=all"><button style="color: white;background-color: red; border:none;border-radius: 15%;">Information</button></a>
					<a href="index.php?page=profil&modif=img"><button style="color: white;background-color: red; border:none;border-radius: 15%;">Image de Profil</button></a>
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

	<div class="tab-pane fade show active" id="monprofil" role="tabpanel" aria-labelledby="lescommu-tab">

		<div style="margin-left: 12.5%; width: 75%; margin-top: 50px;">
		<img style="width: 50%; margin-left: 25%; margin-top: 50px;" src="DATA/profil_pp/<?php echo $profil['picture']; ?>" >
		<hr>
		<div style="display: flex;">
			<div style="width: 49%; margin: 0;">Nom : <?php echo $profil['nom']; ?></div>
			<div style="width: 49%; margin: 0;">Prénom : <?php echo $profil['prenom']; ?></div>
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


		<hr>
				</div>

	</div>
	<!-- <hr style="height: 100px;"> -->
	<?php 
}



}else{

		echo '<script>alert("Vous devez être connecté(e) pour accéder à cette page");
		window.location.href = "./index.php?page=connexion";</script>'; 
  		exit();



}



echo '<div class="tab-pane" id="follow" role="tabpanel" aria-labelledby="lescommu-tab">';

	echo '<h5> Mes follows </h5>';
	$mesfollow = takefollow($_SESSION['id']);
	affichemembre($mesfollow, "id");
	echo "<h5> Suggestion de profil : </h5>";
		$usersuggest = getSuggestion($id);

		if ($usersuggest!=[]){

		foreach ($usersuggest as $key => $value) {
			affichemembre(recupDonneProfil($value),'id');
		}
	}
	else {
		echo "Vous n'avez pas de suggestions :(";
	}

echo '</div>';

echo '<div class="tab-pane fade" id="followers" role="tabpanel" aria-labelledby="mescommu-tab">';
echo '<h5> Mes followers </h5>';
$mesfollower = takefollower($_SESSION['id']);
affichemembre($mesfollower, "id");

echo '</div>';


?>
	</div>
</div>
