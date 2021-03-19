<?php 
	

 ?>
<div class="container col-10 mt-4">
	<!-- <div style="width: 70%;margin-left: 15%;"> -->
	<div class="row">
		<div class="col-sm-2">
			<!-- Pourquoi on l'affiche on est deja dans les recherche -->
			<!-- <a href="index.php?page=tag" style="text-decoration: none;">
			<button type="button" class="btn btn-dark">
					Rechercher
				</button>
			</a> -->

			<a href="index.php?page=tag-ls">
			<button type="button" class="btn btn-dark">
					Tag Liste
				</button>
			</a>
		</div>
		<!-- Ancien formulaire - Au cas ou -->
		
		<!-- <div>
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
		</form> -->
		<div class="col-sm-10">
			<form method="post" action="index.php?page=tag-res" class="form-inline">
				<div class="form-group mx-sm-3 mb-2">
					<label for="tag" class="sr-only"><h6>Le nom des tags à rechercher :</h6></label>
					<input type="text" class="form-control" name="tag" id="tag">
				</div>
				<button type="submit" value="Recherche" class="btn btn-dark mb-2 mx-3">Recherche</button>
			</form>
		</div>
	</div>
</div>