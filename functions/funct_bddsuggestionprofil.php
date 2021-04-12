<?php
//recupere la derniere commu rejoint par l'utilisateur $iduser
function getLastCommuJoinUser($iduser){
    global $db;
    $sql = "SELECT `idcommu` from joincommu where iduser = $iduser";
    $result =  mysqli_query($db, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row['idcommu'];
}

//recupere les utilisateurs qui suivent la commu $idcommu
function getUserJoinCommu($idcommu){
    global $db;
    $sql = "SELECT `iduser` from joincommu where idcommu = $idcommu";
    $result =  mysqli_query($db, $sql);
    $users = [];
    while($row = mysqli_fetch_assoc($result)){
        $users[] = $row['iduser'];
    }
    return $users;
}

//prend un tableau d'utilisateur et renvoi les 5 derniers
function get5BestProfil($users){
    //$usersOccurence = array_count_values($users);
    //asort($usersOccurence);
    $usersOccurence = array_slice($users, -5);
    return $usersOccurence;
}

//prend un tableau d'utilisateur et supprime tous ceux deja suivi par l'utilisateur $iduser
function supDejaFollow($users,$iduser){
    global $db;
    $sql = "SELECT idfollowed from follow where idfollower = $iduser";
    $result =  mysqli_query($db, $sql);
    $usersFollow = [];
    while($row = mysqli_fetch_assoc($result)){
        $usersFollow[] = $row['idfollowed'];
    }
    $newUsers = [];
    foreach ($users as $key => $value) {
        if (!(in_array($value,$usersFollow)) && !($value == $iduser)){
            $newUsers[] = $value;
        }
    }
    return $newUsers;
}

//recupere les donnes du profil $iduser
function recupDonneProfil($iduser){
    global $db;
    $sql = "SELECT * from profil where id = $iduser";
    $result =  mysqli_query($db, $sql);
    $tableau = [];
	while ($row=mysqli_fetch_assoc($result)) {
		$tableau[] = $row;
	}

	return $tableau;
}

//test si $iduser suit une communaute
function estDansCommuV2($iduser){
    global $db;
    $sql = "SELECT COUNT(*) from joincommu where iduser = $iduser";
    $result =  mysqli_query($db, $sql);
    $row=mysqli_fetch_assoc($result);

    return $row["COUNT(*)"] >= 1;
}
//recupere les utilisateurs a suggerer
function getSuggestion($iduser){
    global $db;
    $BestUsers = array();
    if (estDansCommuV2($iduser)){
        $LastCommu = getLastCommuJoinUser($iduser);
        $users = getUserJoinCommu($LastCommu);
        $users = supDejaFollow($users,$iduser);
        $BestUsers = get5BestProfil($users);
    }
    return $BestUsers;
}


?>