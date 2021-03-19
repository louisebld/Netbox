 <div style="width: 70%;margin-left: 15%;">
 	<div class="mt-4 mb-4">
	 <a href="index.php?page=tag" style="text-decoration: none;">
			<button type="button" class="btn btn-dark">
					Rechercher
				</button>
			</a>

			<a href="index.php?page=tag-ls">
			<button type="button" class="btn btn-dark">
					Tag Liste
				</button>
			</a>
 	</div>

 	<?php 
	
	if(isset($_POST['tag']) || isset($_GET['tag'])){
		if (isset($_POST['tag'])) {
			$tag = $_POST['tag'];
		} else {
			$tag = $_GET['tag'];
		}
		
		
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
		

	}else{
		header("location:index.php?page=tag");

	}

 	?>
 </div>
