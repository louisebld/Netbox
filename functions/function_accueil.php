<?php 
	function recup_photo_carroussel(){
		global $db;
		$sql = "SELECT nom,image FROM communaute ORDER BY RAND()LIMIT 6";
		$result=  mysqli_query($db, $sql);
	
		$tableau = [];
		while ($row=mysqli_fetch_assoc($result)) {
			$tableau[] = $row;
		}
	
		return $tableau;
	}

	function affiche_photo_carroussel($tableau){
		for ($i=0; $i < sizeof($tableau); $i++) { 
			if ($i == 0){
				echo '<div class="carousel-item active opacity">';
					echo '<img src="images/commu/' . $tableau[$i]['image'] . '" class="d-block w-100" alt="bruh">';
					echo '<div class="carousel-caption d-none d-md-block" style="background-color: #22223B; opacity: 0.75;">';
						echo '<h1 class="display-1 mx-auto w-75" style="font-size:100;">' . $tableau[$i]['nom'] . '</h1>';
						echo '<h5 style="">Rejoignez vite la communauté</h5>';
					echo '</div>';
				echo '</div>';
			} else {
				echo '<div class="carousel-item">';
					echo '<img src="images/commu/' . $tableau[$i]['image'] . '" class="d-block w-100" alt="bruh">';
					echo '<div class="carousel-caption d-none d-md-block" style="background-color: #22223B; opacity: 0.75;">';
						echo '<h1 class="display-1 mx-auto  w-75">' . $tableau[$i]['nom'] . '</h1>';
						echo '<h5>Rejoignez vite la communauté</h5>';
					echo '</div>';
				echo '</div>';
			}
		}
	}

	function buttons_carrousel($tableau){
		for ($i=0; $i < sizeof($tableau); $i++) { 
			if ($i == 0){
				echo '<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>';
		
			}else {
				echo '<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>';
			}
		}
	}

	?>
