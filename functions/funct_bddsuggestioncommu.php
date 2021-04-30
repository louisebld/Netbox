<?php
function getLastFollowUser($iduser){
    global $db;
    $sql = "SELECT `idfollowed` from follow where idfollower = $iduser";
    $result =  mysqli_query($db, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row['idfollowed'];
}

//recupere lescommus qui suivies par l'utilisateur $iduser
function getCommuJoinUser($iduser){
    global $db;
    $sql = "SELECT `idcommu` from joincommu where iduser = $iduser";
    $result =  mysqli_query($db, $sql);
    $users = [];
    while($row = mysqli_fetch_assoc($result)){
        $users[] = $row['idcommu'];
    }
    return $users;
}

function get5BestCommu($commus){
    //$usersOccurence = array_count_values($users);
    //asort($usersOccurence);
    $commusOccurence = array_slice($commus, -5);
    return $commusOccurence;
}

function supDejaFollowCommu($commus,$iduser){
    global $db;
    $sql = "SELECT idcommu from joincommu where iduser = $iduser";
    $result =  mysqli_query($db, $sql);
    $commusFollow = [];
    while($row = mysqli_fetch_assoc($result)){
        $commusFollow[] = $row['idcommu'];
    }
    $newCommus = [];
    foreach ($commus as $key => $value) {
        if (!(in_array($value,$commusFollow))){
            $newCommus[] = $value;
        }
    }
    return $newCommus;
}

function aFollow($iduser){
    global $db;
    $sql = "SELECT COUNT(*) from follow where idfollower = $iduser";
    $result =  mysqli_query($db, $sql);
    $row=mysqli_fetch_assoc($result);

    return $row["COUNT(*)"] >= 1;
}
function getInfoCommu($commus){
    global $db;
    $InfoCommus = [];
    foreach ($commus as $key => $value) {
        $sql =  "SELECT * from communaute where idcommu = $value";
        $result =  mysqli_query($db, $sql);
        $row=mysqli_fetch_assoc($result);

        $InfoCommus[] = array('idcommu' => $row['idcommu'], 'nom' => $row['nom'], 'description' => $row['description'], 'idcreateur' => $row['idcreateur'], 'image' => $row['image']);
    }
    return $InfoCommus;
}
//recupere les utilisateurs a suggerer
function getSuggestionCommu($iduser){
    global $db;
    $BestCommus = array();
    if (aFollow($iduser)){
        $LastFollowed = getLastFollowUser($iduser);
        $commus = getCommuJoinUser($LastFollowed);
        $commus = supDejaFollowCommu($commus,$iduser);
        $BestCommus = get5BestCommu($commus);
        $BestCommus = getInfoCommu($BestCommus);
    }
    return $BestCommus;
}
?>