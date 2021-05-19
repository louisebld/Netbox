<div class="contener m-5 communaute p-4">

<div class="tab-content" id="myTabContent">
			<div class="tab-pane fade show active" id="filActu" role="tabpanel" aria-labelledby="lescommu-tab">
<!-- 				<h4 class="mb-3 mt-4">Quoi de neuf...</h4>	
 -->					<?php
				if (isset($_SESSION['id'])) {
						$mescommu = selectcommu($_SESSION['id']);
						$iduser = $_SESSION['id'];
						
						// afficheFilActu($mescommu, $iduser);
						$tabActu = afficheFilActu($mescommu, $iduser);
						//var_dump($tabActu);
						$tabActu = array();
						if (!empty($tabActu)){
							affichageActu($tabActu);
						} else {
							//On gere s'il n'y a rien a afficher
							?>	
								<div class="container shadow p-3 bg-white rounded text-center">
									<p class="fs-2 text-white barre rounded">Il n'y a rien à voir pour l'instant !<br/>
									
									Foncez <span class="fst-italic">Découvrir des communautés déjà existantes</span></p>
									<img src="images/rienavoir.png" alt="Rien A voir">
								</div>
							<?php
						}
				}

					?>
				
			</div>
</div>

</div>