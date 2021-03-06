<?php 
	

 ?>
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
 	<form method="post" action="index.php?page=tag-res" style="margin: 20px;">
 		<p>
 			Tag : 
 			<input type="text" name="tag"> 
 			<input type="submit" value="Recherche" >
 		</p>
 	</form>
 </div>