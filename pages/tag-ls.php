<div class="container">

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

 	<div class="mt-4 pageminimumtaillerecherche">
 		<ol class="list-group list-group-flush">
 		<?php 
			$data = recup_all_tag();
			echo '<div class="list-group"> Listes des tags :';
			$compteur = 0;
			$taille = count($data);
			$i=0;
			while ($compteur != $taille) { 
				// echo "<li class='list-group-item'> -> <a href='index.php?page=tag-res&tag=".implode("", explode("#", $data[$i]))."'>".$data[$i]."</a></li>";

				if (isset($data[$i])){


				// echo '<a href="index.php?page=tag-res&tag=".implode("", explode("#", $data[$i]))."" class="list-group-item list-group-item-action ">' . $data[$i] . '</a>';		

			// $data[2]=array_pop($data);

				if ($compteur%2 == 0){
					

				// echo '<a href="index.php?page=tag-res&tag="' . implode("", explode("#", $data[$i])). " class='list-group-item list-group-item-action list-group-item-primary'>" . $data[$i] . "</a>";

				echo "<li class='list-group-item list-group-item-primary'><a  class='stylelien' href='index.php?page=tag-res&tag=". implode("", explode("#", $data[$i]))."'>".$data[$i]."</a></li>";



				} 
				else {
					

				echo "<li class='list-group-item'><a class='stylelien' href='index.php?page=tag-res&tag=". implode("", explode("#", $data[$i]))."'>".$data[$i]."</a></li>";

				// echo '<a href="index.php?page=tag-res&tag=".implode("", explode("#", $data[$i]))."" class="list-group-item list-group-item-action ">' . $data[$i] . '</a>';				
				}




			$compteur++;

			}
			$i++;
		}

		 ?>
		 </ol>

 	</div>
 </div>

</div>
<!-- 

    <div class="container">


      <div class="list-group">Liste de liens :
        <a href="#" class="list-group-item list-group-item-action">Défaut</a>
        <a href="#" class="list-group-item list-group-item-action list-group-item-primary">Primary</a>
        <a href="#" class="list-group-item list-group-item-action list-group-item-secondary">Secondary</a>
        <a href="#" class="list-group-item list-group-item-action list-group-item-success">Success</a>
        <a href="#" class="list-group-item list-group-item-action list-group-item-danger">Danger</a>
        <a href="#" class="list-group-item list-group-item-action list-group-item-warning">Warning</a>
        <a href="#" class="list-group-item list-group-item-action list-group-item-info">Info</a>
        <a href="#" class="list-group-item list-group-item-action list-group-item-light">Light</a>
        <a href="#" class="list-group-item list-group-item-action list-group-item-dark">Dark</a>
      </div>
    </div> 
 -->