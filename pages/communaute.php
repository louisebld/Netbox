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
			<a class="nav-link active textenoir" id="filActu-tab" data-toggle="tab" href="#filActu" role="tab" aria-controls="filActu" aria-selected="true"><h7 class="" id="lesCommu">Quoi de neuf...</h7></a>
		</li>
		<?php
			
		echo '<li class="nav-item ">';
			echo '<a class="nav-link textenoir" id="lescommu-tab" data-toggle="tab" href="#lescommu" role="tab" aria-controls="lescommu" aria-selected="false"><h7 class="" id="lesCommu">Découvrez les communautés déjà existantes...</h7></a>';
		echo '</li>';
		
		if (isset($_SESSION['id'])) {
			$mescommu = selectcommu($_SESSION['id']);

			// if (!empty($mescommu)){
				echo '<li class="nav-item">';
					echo '<a class="nav-link textenoir" id="mescommu-tab" data-toggle="tab" href="#mescommu" role="tab" aria-controls="mescommu" aria-selected="false"><h7 class="" id="lesCommu">Mes Communautés</h7></a>';
				echo '</li>';
			// }
		}
			
		?>
	</ul>
		<div class="tab-content" id="myTabContent">
			<div class="tab-pane fade show active" id="filActu" role="tabpanel" aria-labelledby="lescommu-tab">
				<h4 class="mb-3 mt-4">Quoi de neuf...</h4>	
					<?php
						//var_dump($mescommu);
						//var_dump(recuppostByID($mescommu[0]['idcommu']));
						$iduser = $_SESSION['id'];
						$tabActu = afficheFilActu($mescommu, $iduser);
						//var_dump($tabActu);
						if (!empty($tabActu)){
							affichageActu($tabActu);
						} else {
							//On gere s'il n'y a rien a afficher
							?>	
								<div class="container shadow p-3 bg-white rounded text-center">
									<p class="fs-2 text-white barre rounded">Il n'y a rien à voir pour l'instant !<br/>
									
									Foncez dans l'onglet <span class="fst-italic">Découvrez les communautés déjà existantes</span></p>
									<img src="images/rienavoir.png" alt="Rien A voir">
								</div>
							<?php
						}
					?>
			</div>
			<div class="tab-pane" id="lescommu" role="tabpanel" aria-labelledby="lescommu-tab">
								
				<?php				
					if (isset($_SESSION['id'])) {
						$suggestion = getSuggestionCommu($_SESSION['id']);
						if (!empty($suggestion)){
							echo '<h4 class="mb-3  mt-4">Mes suggestions</h4>';
							affichecommunonly($suggestion);
						}
					}
				?> 
				<h4 class="mb-3 mt-4">Les communautés à découvrir ...</h4>
				<?php
					if (!empty($tableaucommu)){
						affichecommunonly($tableaucommu);
					} else {
						//On gere s'il n'y a rien a afficher
						?>	
							<div class="container shadow p-3 bg-white rounded text-center">
								<p class="fs-2 text-white barre rounded">Il n'y a plus de communautés à voir !<br/>
								
								Crée ta propre communauté</p>
								<div class='fs-2'>
									<a class='hText' href='' data-bs-toggle='modal' data-bs-target='#commuBouton' data-bs-whatever='@getbootstrap'><button type="submit" name="commu" value="commu" class="btn btn-primary  btn-circle bi-cup-straw m-1"> Créer une communauté</button></a>		
								</div>
								<img src="images/aucunecommu.png" alt="Aucune communauté a découvrir">
								
							</div>
						<?php
					}
				?>
			</div>
			<div class="tab-pane fade" id="mescommu" role="tabpanel" aria-labelledby="mescommu-tab">
				<h4 class="mb-3  mt-4">Mes communautés</h4>		
				<div class='text-end'>
					<a class='hText' href='' data-bs-toggle='modal' data-bs-target='#commuBouton' data-bs-whatever='@getbootstrap'><button type="submit" name="commu" value="commu" class="btn btn-primary  btn-circle bi-cup-straw m-1"> Créer une communauté</button></a>		
				</div>
				<?php				
					if (isset($_SESSION['id'])) {
						if (!empty($mescommu)){
							affichecommun($mescommu);
						} else {
							
							//On gere s'il n'y a rien a afficher
							?>	
								<div class="container shadow p-3 bg-white rounded text-center">
									<p class="fs-2 text-white barre rounded">Vous ne suivez aucune communauté :(<br/>
									
									Foncez dans l'onglet <span class="fst-italic">Découvrez les communautés déjà existantes</span><br/>
									Ou alors créez votre propre communauté !</p>
									<div class='fs-2'>
										<a class='hText' href='' data-bs-toggle='modal' data-bs-target='#commuBouton' data-bs-whatever='@getbootstrap'><button type="submit" name="commu" value="commu" class="btn btn-primary  btn-circle bi-cup-straw m-1"> Créer une communauté</button></a>		
									</div>
									<img src="images/aucunemescommu.png" alt="Aucune communauté a découvrir">
									
								</div>
							<?php
						}
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

	</div>
</div>



	<!-- Au cas ou on chercherais a remettre la barre de recherche -- 
		<div class='container mt-4'>
        <form method='post' class='form-group' action='index.php?page=communaute'>
          <input class='form-control mr-sm-2' name='recherchecommu' type='text' placeholder='Communauté' aria-label='Search'>

          <input type='submit' name='cherchercommu' class='btn btn-outline-primary' value='Chercher'/>
        </form>
   
    </div> -->


