<?php

// ----------------------------- Ajoute de commentaire --------------------- 
if (isset($_POST['envoyer_rep'])){

    var_dump($_POST);
    var_dump($_SESSION);
    $autor = $_SESSION['id'];

    $idcomu = intval($_POST['idcomu']);
    $idpost = intval($_POST['idpost']);
    $idcom = intval($_POST['idcom']);
    $rep = remplaceApo($_POST["rep"]);

    //recuperation de l'id du projet, pour savoir a quel projet correspond le commentaire



    insert_rep($autor, $rep, $idcomu, $idpost, $idcom);
    // Insetion du commentaire dans la table avis

    // on informe l'utilisateur qu'il a posté un commentaire
    // redirection vers la page projets
    $post = "post" . $idpost; 
    header("Location:index.php?page=$post");
}