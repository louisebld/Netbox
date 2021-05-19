<div class="contener m-5 communaute p-4">

				<h4 class="mb-3  mt-4">Mes communautés</h4>		
				<div class='text-end'>
					<a class='hText' href='' data-bs-toggle='modal' data-bs-target='#commuBouton' data-bs-whatever='@getbootstrap'><button type="submit" name="commu" value="commu" class="btn btn-primary  btn-circle bi-cup-straw m-1"> Créer une communauté</button></a>		
				</div>
				<?php				
					if (isset($_SESSION['id'])) {
						$mescommu = selectcommu($_SESSION['id']);

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

				<h4 class="mb-3  mt-4">Mes suggestions</h4>				
				<?php				
					if (isset($_SESSION['id'])) {
						$suggestion = getSuggestionCommu($_SESSION['id']);
						// var_dump($suggestion);
						if (empty($suggestion)){
								echo '<img class="figure-img img-fluid rounded text-end" src="images/box.png">';

						}
						else {
						affichecommunonly($suggestion);
						}
					}
				?> 
				<h4 class="mb-3 mt-4">Les communautés à découvrir ...</h4>
				<?php
					affichecommunonly($tableaucommu);

				?>
</div>