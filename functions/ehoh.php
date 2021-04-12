<?php
require_once('db.php');

function recup_profil_id($id)
{
        global $db;
        $sql = "SELECT * FROM `profil` WHERE `id` = '$id'";
        $results = mysqli_query($db,$sql);

        $res = [];
        while($row = mysqli_fetch_assoc($results)){
                $res[] = $row;
        }

        return $res;
}



        $idcommunaute = 62;
        // On écrit la requête
        $sql = "SELECT * FROM messagecommu WHERE communaute=$idcommunaute";

        $query = mysqli_query($db, $sql);

        // On exécute la requête
        // $query = $db->query($sql);




        var_dump($query);

        $tableau = [];
        $i=0;
		while ($row=mysqli_fetch_assoc($query)) {
			$tableau[] = $row;
                        $tableau[$i]['pseudo'] = recup_profil_id($row['utilisateur'])[0]['pseudo'];
                        $tableau[$i]['image'] = recup_profil_id($row['utilisateur'])[0]['picture'];
                        $i++;

		}

		var_dump($tableau);