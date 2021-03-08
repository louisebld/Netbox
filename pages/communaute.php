<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<!-- <div class="contener gros p-4 m-4 text-sm-center">
	<h4>En cours de construction, ne modifiez rien sur cette page svp (sinon conflit)</h4>
</div>
 -->




<!-- Au cas ou on voudrais remettre le bouton pour creer une communauté dans la page principale  -->
<!-- <div class="contener m-5 communaute p-4">

	<h4>Créez votre communauté !</h4>
	<div class="formulairegroupe m-auto">

		<?php
	

		// if (isset($_SESSION['erreurcreatcommu'])) {
		// 	echo "<ul>";
		// 	// on affiche chaque erreur
		// 	foreach($_SESSION["erreurcreatcommu"] as $faute){
		// 		echo "<li>$faute</li>";
		// 	}
		// 	echo "</ul>";

		// }
		?>
	</div>

</div> -->


<div class="contener m-5 communaute p-4">
	<ul class="nav nav-tabs" id="myTab" role="tablist">
		<li class="nav-item">
			<a class="nav-link active" id="lescommu-tab" data-toggle="tab" href="#commu" role="tab" aria-controls="commu" aria-selected="true"><h7 class="" id="lesCommu">Découvrez les communautés déjà existantes..</h7></a>
		</li>
		<?php
		
		if (isset($_SESSION['id'])) {
			$mescommu = selectcommu($_SESSION['id']);
			if (!empty($mescommu)){
				echo '<li class="nav-item">';
					echo '<a class="nav-link" id="mescommu-tab" data-toggle="tab" href="#mescommu" role="tab" aria-controls="mescommu" aria-selected="false"><h7 class="" id="lesCommu">Mes Communautés</h7></a>';
				echo '</li>';
			}
		}
			
		?>
	</ul>
		<div class="tab-content" id="myTabContent">
			<div class="tab-pane fade show active" id="commu" role="tabpanel" aria-labelledby="lescommu-tab">
				<h4 class="mb-3 mt-4">Les communautés à découvrir ...</h4>	
				<?php
          
					affichecommun($tableaucommu);

				?>
			</div>
			<div class="tab-pane fade" id="mescommu" role="tabpanel" aria-labelledby="mescommu-tab">
				<h4 class="mb-3  mt-4">Mes communautés</h4>				
				<?php				
					if (isset($_SESSION['id'])) {
						affichecommun($mescommu);
					}
				?>    
			</div>
	</div>
	



	<!-- Au cas ou on chercherais a remettre la barre de recherche -- 
		<div class='container mt-4'>
        <form method='post' class='form-group' action='index.php?page=communaute'>
          <input class='form-control mr-sm-2' name='recherchecommu' type='text' placeholder='Communauté' aria-label='Search'>

          <input type='submit' name='cherchercommu' class='btn btn-outline-primary' value='Chercher'/>
        </form>
   
    </div> -->


