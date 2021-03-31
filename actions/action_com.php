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
        if (trim($com)){
            insert_com($autor, $com, $idcomu, $idpost, $date);
            
        }
        // Insetion du commentaire dans la table avis

        // on informe l'utilisateur qu'il a posté un commentaire
        // redirection vers la page projets
        $post = "post" . $idpost; 
        header("Location:index.php?page=$post");
    }



 if (isset($_POST['supcom'])){

            $idcom = $_POST['idcom'];
            $idpost=$_POST['idpost'];
      
            supprime_com($idcom);
            supprime_allrep($idcom);
            // on informe l'utilisateur qu'il a posté un commentaire
            // redirection vers la page projets
            $post = "post" . $idpost; 
            header("Location:index.php?page=$post");
        }


 if (isset($_POST['suprep'])){

            $idrep = intval($_POST['idrep']);
            $idpost=intval($_POST['idpost']);
      
            supprime_rep($idrep);

            // on informe l'utilisateur qu'il a posté un commentaire
            // redirection vers la page projets
            $post = "post" . $idpost; 
            header("Location:index.php?page=$post");
}

if (isset($_POST) && isset($_POST["likecom"]) && isset($_SESSION['id'])) {
	$createur = $_SESSION['id']; // ICI IL FAUDRA METTRE LA VARIABLE DE SESSION QUI CONTIENT L'ID DU COMPTE && isset($_POST['like'])
	likeCom($_POST["idcom"],$createur);
	header("Location: ./index.php?page=post" . $_POST['idpost']);
}
if (isset($_POST) && isset($_POST["unlikecom"]) && isset($_SESSION['id'])) {
	$createur = $_SESSION['id']; // ICI IL FAUDRA METTRE LA VARIABLE DE SESSION QUI CONTIENT L'ID DU COMPTE && isset($_POST['like'])
	unlikeCom($_POST["idcom"],$createur);
	header("Location: ./index.php?page=post" . $_POST['idpost']);
}