
 <div style="width: 70%;margin-left: 15%;">
 	<div>
 		<a href="index.php?page=tag" style="text-decoration: none;">
	 		<button style="border: 2px solid black; border-radius: 25%; background-color: white;color: black;">
		 		Rechercher
		 	</button>
	 	</a>

	 	<a href="index.php?page=tag-ls">
		 	<button style="border: 2px solid black; border-radius: 25%; background-color: white;color: black;">
		 		Tag Liste
		 	</button>
	 	</a>
 	</div>

 	<div>
 		<ol>
 		<?php 
			$data = recup_all_tag();
			for ($i=0; $i < count($data); $i++) { 
				echo "<li> -> ".$data[$i]."</li>";
			}

		 ?>
		 </ol>

 	</div>


 </div>