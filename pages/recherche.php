<div class="contener communaute p-5 global">
	<div class='gauche'>
		<h1>Recherche</h1>

		<form  class='form-inline global' action="index.php?page=recherche" method="POST">
			<p>Type de recherche : <select name="type">
				<option value="com">Communauté</option>
				<option value="tag">Tags</option>
				<option value="amis">Amis</option>
			</select></p>
			<input type="text" class='form-control bg-white gauche' placeholder="Recherche" name="cherche">
			<input type="submit" name="rch" value="Chercher" class="btn btn-dark mr-5">
		</form>

					<a href="index.php?page=tag-ls">
				<button type="button" class="btn btn-dark m-5">
					Tag Liste
				</button>
			</a>

	</div>
	<div class='droite'>
		<img class="figure-img img-fluid rounded text-end p-5" src="images/natasha.png">
	</div>
	<?php 

	?><?php 
	if (isset($_POST['cherche']) && isset($_POST['type'])) {
		$rch = $_POST['cherche'];
		$type = $_POST['type'];
		if (!empty($rch) && trim($rch) != "") {
			?>
			<hr>
			<div>
			<?php 
			if ($type == "com") {
				$res = chargesearchcommu($rch);
				affichecommun($res);
			}
			if ($type == "tag") {
				$tag =$rch;
				if (count(explode("#", $tag))== 1) {
				$tag = "#".$tag;
				}
				$data = get_all_tag($tag);
				?>

				<div>
							<h1>Communautés !</h1>
							<ol>
								<?php //communauté
								for ($i=0; $i < count($data[0]); $i++) { 
									echo '<div class="card p-4 my-4" style="width: auto;>';
										echo '<div class="card-body">';
										echo '<h5 class="card-title">'.$data[0][$i]["nom"]."</h5>";
										echo "<p><img src='./images/commu/".$data[0][$i]["image"]."' width= auto; height='200'>";
										echo "<h6 class='card-subtitle mb-2 text-muted'>".$data[0][$i]["description"]."</h6>";
										echo "<a href='index.php?page=commu".Recup_nom_communote_de_id($data[0][$i]["idcommu"])."'><button type='button' class='btn btn-dark'>Aller à la Communauté !</button></a></p>";

									echo "</div>";
								}
								?>
							</ol>
						</div>
						<hr>
						<?php 

						?>
						<div>
							<h1>Publications !</h1><ol>
						<?php //publication
						for ($i=0; $i < count($data[1]); $i++) { 

							// echo "<li><div style='border:1px solid black;margin-left: 15%;width: 70%;'>";
							// echo "<h2>".recup_pseudo_id($data[1][$i]["idauteur"])."</h2>";
							// echo "<img src='./images/post/".$data[1][$i]["image"]."' height='200'>";
							// echo "<p>".$data[1][$i]["description"]."</p>";
							// echo "<a href='index.php?page=commu".Recup_nom_communote_de_id($data[1][$i]["idcommu"])."'><button>Aller à la Communauté !</button></a>";
							// echo "</div></li>";

							echo '<div class="card p-4 my-4" style="width: auto;>';
							echo '<div class="card-body">';
							echo '<h5 class="card-title">'.recup_pseudo_id($data[1][$i]["idauteur"])."</h5>";
							echo "<p><img src='./images/post/".$data[1][$i]["image"]."' width= auto; height='200'>";
							echo "<h6 class='card-subtitle mb-2 text-muted'>".$data[1][$i]["description"]."</h6>";
							echo "<a href='index.php?page=commu".Recup_nom_communote_de_id($data[1][$i]["idcommu"])."'><button type='button' class='btn btn-dark'>Aller à la Communauté !</button></a></p>";
							echo "</div>";
						}
						?>
						</ol>
						</div>
						<hr>
						<?php 

						?>
						<div>
							<h1>Commentaires !</h1><ol>
						<?php //commentaire
						for ($i=0; $i < count($data[2]); $i++) { 
							// echo "<li><div style='border:1px solid black;margin-left: 15%;width: 70%;'>";
							// echo "<h2>".recup_pseudo_id($data[2][$i]["idauteur"])."</h2>";
							// echo "<h6>".$data[2][$i]["date"]."</h6>";
							// echo "<p>".$data[2][$i]["com"]."</p>";
							// echo "<a href='index.php?page=commu".Recup_nom_communote_de_id($data[2][$i]["idcomu"])."'><button>Aller à la Communauté !</button></a>";
							// echo "</div></li>";

							echo '<div class="card p-4 my-4" style="width: auto;>';
							echo '<div class="card-body">';
							echo '<h5 class="card-title">'.recup_pseudo_id($data[2][$i]["idauteur"])."</h5>";
							echo "<h6 class='card-subtitle mb-4 mt-4 text-muted'>".$data[2][$i]["date"]."</h6>";
							echo "<h6 class='card-subtitle mb-4 mt-4 text-muted'>".$data[2][$i]["com"]."</h6>";
							echo "<a href='index.php?page=commu".Recup_nom_communote_de_id($data[2][$i]["idcomu"])."'><button type='button' class='btn btn-dark'>Aller à la Communauté !</button></a></p>";
							echo "</div>";
						}
						?>
						</ol>
						</div>
						<hr>
						<?php 

						?>
						<div>
							<h1>Réponses !</h1><ol>
						<?php //reponse
						for ($i=0; $i < count($data[3]); $i++) { 
							// echo "<li><div style='border:1px solid black;margin-left: 15%;width: 70%;'>";
							// echo "<h2>".recup_pseudo_id($data[3][$i]["idauteur"])."</h2>";
							// echo "<h6>".$data[3][$i]["date_creation"]."</h6>";
							// echo "<p>".$data[3][$i]["reponse"]."</p>";
							// echo "<a href='index.php?page=commu".Recup_nom_communote_de_id($data[3][$i]["idcomu"])."'><button>Aller à la Communauté !</button></a>";
							// echo "</div></li>";

							echo '<div class="card p-4 my-4" style="width: auto;>';
							echo '<div class="card-body">';
							echo '<h5 class="card-title">'.recup_pseudo_id($data[3][$i]["idauteur"])."</h5>";
							echo "<h6 class='card-subtitle mb-4 mt-4 text-muted'>".$data[3][$i]["date_creation"]."</h6>";
							echo "<h6 class='card-subtitle mb-4 mt-4 text-muted'>".$data[3][$i]["reponse"]."</h6>";
							echo "<a href='index.php?page=commu".Recup_nom_communote_de_id($data[3][$i]["idcomu"])."'><button type='button' class='btn btn-dark'>Aller à la Communauté !</button></a></p>";
							echo "</div>";
						}
						?>
						</ol>
						</div>
				<?php 

			}
			if ($type == "amis") {
				$res = get_amis($rch);
				//var_dump($res);
				affiche_amis($res);
			}
			?></div><?php 
		}
		
	}

	 ?>

</div>
