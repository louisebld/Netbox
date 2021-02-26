<?php 

function form_com($idcomu, $idpost){
    //Fonction qui permet d'imprimer le formulaire pour les commentaires d'un post 
	?>

	<form method="post" class="formCommentaire" action="index.php?page=communaute"> <!-- Chercher a prendre l'info sur quelle comu on est -->

		<p>
			<!-- <textarea id="com" id="com" placeholder="Commentaire ..." name="com"
			rows="10" cols="35"></textarea> -->
            <div class="form-group">
                <textarea class="form-control"  id="com" id="com" placeholder="Ajouter un Commentaire" name="com"
			rows="2" cols="25"></textarea>
            </div>
		</p>

		<p>
			<?php	

				echo  '<input id="idcomu" name="idcomu" type="hidden" value= '. $idcomu . ">" ;
				//Champs invisible qui la comu sous laquelle on commente

                echo  '<input id="idpost" name="idpost" type="hidden" value= '. $idpost . ">" ;
				//Champs invisible qui contient le post sous lequel on commente
			?>
		</p>
		<p><input type="submit" class="btn btn-dark" name="envoyer_com" id="envoyer_com" value="Enregistrer"/></p>
	</form>
	<?php	 
}

function print_com ($com) {
    //Fonction qui affiche les commentaires 
        
        echo '<div class="container col-10">';	
        
        foreach ($com as $key => $value) {
            $createur = recupdonneauteurcom($value['id']);
            
            echo '<div class="card ">';
                echo '<div class="card-body">';
                    echo '<div class="row">';
                        echo '<div class="col-md-2">';

                            
                            affichephotomembre($createur);
                            echo '<p class="text-secondary text-center">' . $value["date"] . "</p>";
                        echo '</div>';
                        echo '<div class="col-md-10">';
                            echo '<p>';
                                // Affichage du nom de la personne  
                                echo '<a class ="float-left" href="#"><strong>' . affichepseudomembre($createur, "idauteur") . '</strong></a>';                                                              
                                echo '<span class="float-right"><i class="text-warning fa fa-star"></i></span>';
                                echo '<span class="float-right"><i class="text-warning fa fa-star"></i></span>';
                                echo '<span class="float-right"><i class="text-warning fa fa-star"></i></span>';
                                echo '<span class="float-right"><i class="text-warning fa fa-star"></i></span>';

                            echo '</p>';
                        echo '<div class="clearfix"></div>';
                            //Affichage du commentaire
                            echo '<div class="commentary"><p>Commentaire: ' . $value["com"] . "</p></div>";
                            echo '<p>';
                                //Pour plus tard
                                //echo '<a class="float-right btn btn-outline-dark ml-2"> <i class="fa fa-reply"></i> Répondre</a>';
                                //echo '<a class="float-right btn text-white btn-danger"> <i class="fa fa-heart"></i> Aimer</a>';
                            echo '</p>';
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
            echo '</div>';
        }
}


