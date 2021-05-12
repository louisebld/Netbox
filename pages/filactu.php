<div class="contener m-5 communaute p-4">

<div class="tab-content" id="myTabContent">
			<div class="tab-pane fade show active" id="filActu" role="tabpanel" aria-labelledby="lescommu-tab">
<!-- 				<h4 class="mb-3 mt-4">Quoi de neuf...</h4>	
 -->					<?php
				if (isset($_SESSION['id'])) {
						$mescommu = selectcommu($_SESSION['id']);
						$iduser = $_SESSION['id'];
						
						afficheFilActu($mescommu, $iduser);
				}
					?>
			</div>
</div>

</div>