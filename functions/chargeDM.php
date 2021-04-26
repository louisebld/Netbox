<?php

// On vérifie la méthode utilisée
if($_SERVER['REQUEST_METHOD'] == 'GET'){

        if(isset($_GET['lastIdDM'])){
        // On récupère l'id et on le nettoie
        $lastIdDM = (int)strip_tags($_GET['lastIdDM']);

        // On se connecte à la base
        require_once('../db.php');
        require_once('funct_connection.php');

        // $donnees->idcommunaute;
        $id_Destinataire = $_GET['destinataire'];
        $idutilisateur = $_GET['utilisateur'];
        // $idcommunaute = 62;


        $sql = "SELECT * FROM messagedm WHERE ((utilisateur = $idutilisateur AND destinataire = $id_Destinataire) OR (utilisateur = $id_Destinataire AND destinataire = $idutilisateur)) AND idmessage > $lastIdDM ORDER BY datemessage";

        $query = mysqli_query($db, $sql);


        $tableau = [];
        $i=0;
        while ($row=mysqli_fetch_assoc($query)) {
            $tableau[] = $row;
            $tableau[$i]['pseudo'] = recup_profil_id($row['utilisateur'])[0]['pseudo'];
            $tableau[$i]['image'] = recup_profil_id($row['utilisateur'])[0]['picture'];
            $i++;

        }        

        $messages = $tableau;

        // On encode en JSON
        $messagesJson = json_encode($messages);

        // On envoie
        echo $messagesJson;
}
}
else{
    // Mauvaise méthode
    http_response_code(405);
    echo json_encode(['message' => 'Mauvaise méthode']);
}
