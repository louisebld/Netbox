<?php

// On vérifie la méthode utilisée
if($_SERVER['REQUEST_METHOD'] == 'GET'){

        if(isset($_GET['lastId'])){
        // On récupère l'id et on le nettoie
        $lastId = (int)strip_tags($_GET['lastId']);

        // On se connecte à la base
        require_once('../db.php');
        require_once('funct_connection.php');

        // $donnees->idcommunaute;
        $idcommunaute = $_GET['commu'];
        // $idcommunaute = 62;


        $sql = "SELECT * FROM messagecommu WHERE communaute=$idcommunaute AND idmessage > $lastId ORDER BY datemessage";

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
