<?php

function form_rep($idcomu, $idpost, $idcom){
    //Fonction qui permet d'imprimer le formulaire pour les commentaires d'un post 
	?>





            <form method="post" class="formReponses" action="#"> <!-- Chercher a prendre l'info sur quelle comu on est -->

                <p>
                    <div class="form-group">
                        <textarea class="form-control"  id="rep" placeholder="Ajouter un Réponse" name="rep"
                    rows="2" cols="25"></textarea>
                    </div>
                </p>

                <p>
                    <?php	

                        echo  '<input id="idcomu" name="idcomu" type="hidden" value= '. $idcomu . ">" ;
                        //Champs invisible qui la comu sous laquelle on commente

                        echo  '<input id="idpost" name="idpost" type="hidden" value= '. $idpost . ">" ;
                        //Champs invisible qui contient le post sous lequel on commente

                        echo  '<input id="idcom" name="idcom" type="hidden" value= '. $idcom . ">" ;
                        //Champs invisible qui contient le com sous lequel on commente
                    ?>
                </p>
                <p><input type="submit" class="btn btn-dark" name="envoyer_rep" id="envoyer_rep" value="Répondre"/></p>
            </form>


	<?php	 
}


function print_rep ($rep) {
    //Fonction qui affiche les commentaires 
        
        echo '<div class="container col-10">';	
        
        foreach ($rep as $key => $value) {
            $createur = recupdonneauteurrep($value['id']);

            echo '<div class="card ">';
                echo '<div class="card-body">';
                    echo '<div class="row">';
                        echo '<div class="w-auto">';
                            affichephotomembre($createur);
                            echo '<p class=" text-center">' . $value["date_creation"] . "</p>";
                        echo '</div>';
                        echo '<div class="col">';
                            echo '<p>';
                                // Affichage du nom de la personne  
                                echo '<a class ="float-left" href="#"><strong>' . affichepseudomembre($createur, "idauteur") . '</strong></a>';                                                             
                        afficheboutondelrep($value['id'], $value['idpost']);

                            echo '</p>';
                        echo '<div class="clearfix">';
                        echo '<div class="commentary"><p>Commentaire: ' . $value["reponse"] . "</p></div>";
                        echo afficheLikeBoutonCom($value['idpost'],$value['id']);
                        echo nbLikeCom(getLikeCom(),$value['id']);
                        echo afficheUnlikeBoutonCom($value['idpost'],$value['id']);
                        echo nbUnlikeCom(getUnlikeCom(),$value['id']);
                            //Affichage du commentaire
                                //echo '<a class="float-right btn btn-outline-dark ml-2"> <i class="fa fa-reply"></i> Répondre</a>';
                                //echo '<a class="float-right btn text-white btn-danger"> <i class="fa fa-heart"></i> Aimer</a>';
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
            echo '</div>';
        }
}


function afficheboutondelcom($idcom, $idpost) {

?>

    <form method="post" class='text-end' action="index.php?page=communaute"> 


            <?php   

                echo  '<input id="idcom" name="idcom" type="hidden" value= '. $idcom . ">" ;

                echo "<input type='hidden' name='idpost' value= $idpost>";

            ?>
        
        <!-- <input type="submit" class="btn btn-dark bi-plus-circle" name="ajoutermodo" id="ajoutermodo" value=""/> -->
        <button type="submit" name="supcom" value="supcom" class="btn btn-danger bi-x-circle"> Supprimer </button>

    </form>
    <?php    
}

function afficheboutondelrep($idrep, $idpost) {

?>

    <form method="post" class='text-end' action="index.php?page=communaute"> 


            <?php   

                echo  '<input id="idrep" name="idrep" type="hidden" value= '. $idrep . ">" ;

                echo "<input type='hidden' name='idpost' value= $idpost>";

            ?>
        
        <!-- <input type="submit" class="btn btn-dark bi-plus-circle" name="ajoutermodo" id="ajoutermodo" value=""/> -->
        <button type="submit" name="suprep" value="suprep" class="btn btn-danger bi-x-circle"> Supprimer </button>

    </form>
    <?php    
}
