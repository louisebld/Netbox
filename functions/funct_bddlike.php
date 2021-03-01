<?php

//------------------------------------------------------------function gestion des likes

function getLike(){
    global $db;
    $tab = [];
    $sql = "select * from likes";
    $result = mysqli_query($db,$sql);
    
    while($row = mysqli_fetch_assoc($result)){
        $tab[] = $row;
    }
    return $tab;
}


function afficheLikeBouton($idpost){
	//affiche le bouton like
	$likeButton= '<form action="index.php?page=post'.$idpost.'" method="post">
						<input type="hidden" value="'.$idpost.'" id="idpost" name="idpost">
						<input type="submit" value="like" id="like" name="like" class="btn btn-danger btn-xl bi-heart-half m-1">
   					</form>';
    return $likeButton;
}

function dejaLike($idpost,$idUser){
	global $db;
    $sql="SELECT * FROM `likes` WHERE likes.idpost=$idpost;";
    $tab = [];
    $result = mysqli_query($db,$sql);
    while($row = mysqli_fetch_assoc($result)){
        $tab[] = $row;
    }
    $res=False;
    foreach($tab as $key => $value){
        if ($value['iduser']==$idUser){
            $res=True;
        }
    }
    return $res;
}

function idDejaLike($idpost,$idUser){
	//recupere l'id du like en function du post et de l'utilisateur
	global $db;
    $sql="SELECT * FROM `likes` WHERE likes.idpost=$idpost;";
    $tab = [];
    $result = mysqli_query($db,$sql);
    while($row = mysqli_fetch_assoc($result)){
        $tab[] = $row;
    }
    $res=-1;
    foreach($tab as $key => $value){
        if ($value['iduser']==$idUser){
            $res=$value['idlike'];
        }
    }
    return $res;
}

function like($idpost,$idUser){
	/*global $db;
    if (!dejaLike($idpost,$idUser)){
        $sql="INSERT INTO `likes`(`idlike`, `idpost`, `iduser`) VALUES (NULL,$idpost,$idUser);";
        var_dump($sql);
	    mysqli_query($db, $sql); //on fait la requête pour l'ajouter à la liste de likes

	    $NouvIntLike = nbLike(getLike(),$idpost);
	    $sqlmaj="UPDATE `publication` SET `nblike` = $NouvIntLike WHERE `idpost` = $idpost; ";
        var_dump($sqlmaj);
	    mysqli_query($db, $sqlmaj); //on fait la requête pour mettre à jour le nombre de likes de la publication
    }  */
    global $db;
    if (dejaUnlike($idpost,$idUser)){
		$sql="INSERT INTO `likes`(`idlike`, `idpost`, `iduser`) VALUES (NULL,$idpost,$idUser);";
		$sql2="DELETE FROM `netbox`.`unlikes` WHERE `unlikes`.`idunlike` = ". idDejaUnlike($idpost,$idUser) .";";
        var_dump($sql);
		mysqli_query($db, $sql); //on fait la requete
        mysqli_query($db, $sql2);
        
    }else if(dejaLike($idpost,$idUser)){
		$sql="DELETE FROM `netbox`.`likes` WHERE `likes`.`idlike` = ". idDejalike($idpost,$idUser) .";";
		mysqli_query($db, $sql);
	}else {
		$sql="INSERT INTO `likes`(`idlike`, `idpost`, `iduser`) VALUES (NULL,$idpost,$idUser);";
		mysqli_query($db, $sql);
    }

    $NouvIntLike = nbLike(getLike(),$idpost);
    $sqlmaj="UPDATE `publication` SET `nblike` = $NouvIntLike WHERE `idpost` = $idpost; ";
    var_dump($sqlmaj);
    mysqli_query($db, $sqlmaj); //on fait la requête pour mettre à jour le nombre de likes de la publication
}

function nbLike($like,$idpost){
    $cptLike = 0;
    foreach ($like as $key => $value){
		if ($value['idpost']==$idpost){
			$cptLike++;
		}   
    }
    return $cptLike;
}

function getPostLike($id){
    global $db;
    $tab = [];
    $sql = "SELECT * FROM publication INNER JOIN likes ON publication.idpost = likes.idpost WHERE  likes.iduser=$id ORDER BY likes.idlike DESC";
    $result = mysqli_query($db,$sql);
    
    while($row = mysqli_fetch_assoc($result)){
        $tab[] = $row;
    }
    return $tab;
}

//------------------------------------------------------------fonction gestion unlike

function getUnlike(){
	//recupere la table unlike
    global $db;
    $tab = [];
    $sql = "select * from unlikes";
    $result = mysqli_query($db,$sql);
    
    while($row = mysqli_fetch_assoc($result)){
        $tab[] = $row;
    }
    return $tab;
}
function afficheUnlikeBouton($idpost){
	//affiche le bouton unlike
    $unlikeButton= '<form action="index.php?page=post'.$idpost.'" method="post">
						<input type="hidden" value="'.$idpost.'" id="idpost" name="idpost">
						<input type="submit" value="unlike" id="unlike" name="unlike" class="btn btn-dark">
   					</form>';
	//$unlikeButton= '<button type="submit" name="like" value="like" class="btn btn-danger btn-xl bi-heart-half m-1"></button>';
    return $unlikeButton;
}

function dejaUnlike($idpost,$idUser){
	//test si le post est deja unliké par l'utilisateur
	global $db;
    $sql="SELECT * FROM `unlikes` WHERE unlikes.idpost=$idpost;";
    $tab = [];
    $result = mysqli_query($db,$sql);
    while($row = mysqli_fetch_assoc($result)){
        $tab[] = $row;
    }
    $res=False;
    foreach($tab as $key => $value){
        if ($value['iduser']==$idUser){
            $res=True;
        }
    }
    return $res;
}
function idDejaUnlike($idpost,$idUser){
	//recupere l'id du unlike en function du post et de l'utilisateur
	global $db;
    $sql="SELECT * FROM `unlikes` WHERE unlikes.idpost=$idpost;";
    $tab = [];
    $result = mysqli_query($db,$sql);
    while($row = mysqli_fetch_assoc($result)){
        $tab[] = $row;
    }
    $res=-1;
    foreach($tab as $key => $value){
        if ($value['iduser']==$idUser){
            $res=$value['idunlike'];
        }
    }
    return $res;
}

function unlike($idpost,$idUser){
	//ajoute ou supprime le unlike en fonction de si il est deja unliké par l'utilisateur
	global $db;
    if (dejaLike($idpost,$idUser)){
		$sql="INSERT INTO `unlikes`(`idunlike`, `idpost`, `iduser`) VALUES (NULL,$idpost,$idUser);";
		$sql2="DELETE FROM `netbox`.`likes` WHERE `likes`.`idlike` = ". idDejalike($idpost,$idUser) .";";
        var_dump($sql);
		mysqli_query($db, $sql); //on fait la requete
		mysqli_query($db, $sql2);
    }else if (dejaUnlike($idpost,$idUser)){
		$sql="DELETE FROM `netbox`.`unlikes` WHERE `unlikes`.`idunlike` = ". idDejaUnlike($idpost,$idUser) .";";
		mysqli_query($db, $sql);
	}else {
		$sql="INSERT INTO `unlikes`(`idunlike`, `idpost`, `iduser`) VALUES (NULL,$idpost,$idUser);";
		mysqli_query($db, $sql);
    }
    
    $NouvIntLike = nbLike(getLike(),$idpost);
    $sqlmaj="UPDATE `publication` SET `nblike` = $NouvIntLike WHERE `idpost` = $idpost; ";
    var_dump($sqlmaj);
    mysqli_query($db, $sqlmaj); //on fait la requête pour mettre à jour le nombre de likes de la publication
}


function nbUnlike($like,$idpost){
	//renvoie le nombre de unlike du post
    $cptUnlike = 0;
    foreach ($like as $key => $value){
		if ($value['idpost']==$idpost){
			$cptUnlike++;
		}   
    }
    return $cptUnlike;
}




