<?php

	// ----------------------------- Ajoute de commentaire --------------------- 
    if (isset($_POST['envoyer_com'])){


            $autor = $_SESSION['id'];

            $idcomu = $_POST['idcomu'];
            $idpost = $_POST['idpost'];
            $com = remplaceApo($_POST["com"]);
            //recuperation de l'id du projet, pour savoir a quel projet correspond le commentaire

            date_default_timezone_set('Europe/Paris');
            $date = date('d-m-y h:i:s');

            insert_com($autor, $com, $idcomu, $idpost, $date);
            // Insetion du commentaire dans la table avis

            // on informe l'utilisateur qu'il a posté un commentaire
            // redirection vers la page projets
            $post = "post" . $idpost; 
            header("Location:index.php?page=$post");
        }

