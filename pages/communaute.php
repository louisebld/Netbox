<script>
		$(document).ready(function() {
			if (<?php echo trim($_SESSION['erreurcreatcommu'][0])?'true':'false'; ?>) {

				$("#commuBouton").modal('show');
			}
		});
</script>

<div class="contener m-5 communaute p-4">
	<ul class="nav nav-tabs" id="myTab" role="tablist">
		<li class="nav-item">
			<a class="nav-link active" id="filActu-tab" data-toggle="tab" href="#filActu" role="tab" aria-controls="filActu" aria-selected="true"><h7 class="" id="lesCommu">Quoi de neuf...</h7></a>
		</li>
		<?php
			
		echo '<li class="nav-item">';
			echo '<a class="nav-link" id="lescommu-tab" data-toggle="tab" href="#lescommu" role="tab" aria-controls="lescommu" aria-selected="false"><h7 class="" id="lesCommu">Découvrez les communautés déjà existantes...</h7></a>';
		echo '</li>';
		
		if (isset($_SESSION['id'])) {
			$mescommu = selectcommu($_SESSION['id']);

			// if (!empty($mescommu)){
				echo '<li class="nav-item">';
					echo '<a class="nav-link" id="mescommu-tab" data-toggle="tab" href="#mescommu" role="tab" aria-controls="mescommu" aria-selected="false"><h7 class="" id="lesCommu">Mes Communautés</h7></a>';
				echo '</li>';
			// }
		}
			
		
		echo '<li class="nav-item">';
			echo '<a class="nav-link" id="messuggestion-tab" data-toggle="tab" href="#messuggestion" role="tab" aria-controls="messuggestion" aria-selected="false"><h7 class="" id="lesSuggestion">Mes Suggestions</h7></a>';
		echo '</li>';
		?>
	</ul>
		<div class="tab-content" id="myTabContent">
			<div class="tab-pane fade show active" id="filActu" role="tabpanel" aria-labelledby="lescommu-tab">
				<h4 class="mb-3 mt-4">Quoi de neuf...</h4>	
					<?php
						//var_dump($mescommu);
						//var_dump(recuppostByID($mescommu[0]['idcommu']));
						$iduser = $_SESSION['id'];
						
						afficheFilActu($mescommu, $iduser);
					
					?>
			</div>
			<div class="tab-pane" id="lescommu" role="tabpanel" aria-labelledby="lescommu-tab">
				<h4 class="mb-3 mt-4">Les communautés à découvrir ...</h4>	
				<?php
					affichecommunonly($tableaucommu);

				?>
			</div>

			<div class="tab-pane fade" id="mescommu" role="tabpanel" aria-labelledby="mescommu-tab">
				<h4 class="mb-3  mt-4">Mes communautés</h4>				
				<?php				
					if (isset($_SESSION['id'])) {
						affichecommun($mescommu);
					}
				?> 
				<!-- <h4 class="mb-3  mt-4">Vos communautés crées</h4>
				<?php
						// if (isset($_SESSION['id'])) {
						// 	$commucree = charge_commuparid($_SESSION['id']);
						// 	affichecommun($commucree);
						//}
					?>  -->
			</div>
			
			<div class="tab-pane" id="messuggestion" role="tabpanel" aria-labelledby="messuggestion-tab">
				<h4 class="mb-3  mt-4">Mes suggestions</h4>				
				<?php				
					if (isset($_SESSION['id'])) {
						$suggestion = getSuggestionCommu($_SESSION['id']);
						affichecommun($suggestion);
					}
				?>   
			</div>

	</div>
</div>



	<!-- Au cas ou on chercherais a remettre la barre de recherche -- 
		<div class='container mt-4'>
        <form method='post' class='form-group' action='index.php?page=communaute'>
          <input class='form-control mr-sm-2' name='recherchecommu' type='text' placeholder='Communauté' aria-label='Search'>

          <input type='submit' name='cherchercommu' class='btn btn-outline-primary' value='Chercher'/>
        </form>
   
    </div> -->


