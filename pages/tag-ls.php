
 <div style="width: 70%;margin-left: 15%;">
 	<div class="mt-4">
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

 	<div class="mt-4">
 		<ol class="list-group list-group-flush">
 		<?php 
			$data = recup_all_tag();
			for ($i=0; $i < count($data); $i++) { 
				echo "<li class='list-group-item'> -> <a href='index.php?page=tag-res&tag=".implode("", explode("#", $data[$i]))."'>".$data[$i]."</a></li>";
			}

		 ?>
		 </ol>

 	</div>


 </div>

