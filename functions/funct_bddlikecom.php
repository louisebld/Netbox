<?php

//------------------------------------------------------------function gestion des likes

function getLikeCom(){
    global $db;
    $tab = [];
    $sql = "select * from likescommentaire";
    $result = mysqli_query($db,$sql);
    
    while($row = mysqli_fetch_assoc($result)){
        $tab[] = $row;
    }
    return $tab;
}


function afficheLikeBoutonCom($idpost,$idcom,$like){
	//affiche le bouton like
	$likeButton= '<form action="index.php?page=post'.$idpost.'" method="post">
                        <input type="hidden" value="'.$idcom.'" id="idcom" name="idcom">
                        <input type="hidden" value="'.$idpost.'" id="idpost" name="idpost">
						<button type="submit" value="likecom" id="likecom" name="likecom" class="btn btn-danger btn-xl bi-hand-thumbs-up m-1"> '.$like.'</button>
   					</form>';
    return $likeButton;
}

function dejaLikeCom($idcom,$idUser){
	global $db;
    $sql="SELECT * FROM `likescommentaire` WHERE likescommentaire.idcom=$idcom;";
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

function idDejaLikeCom($idcom,$idUser){
	//recupere l'id du like en function du post et de l'utilisateur
	global $db;
    $sql="SELECT * FROM `likescommentaire` WHERE likescommentaire.idcom=$idcom;";
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

function likeCom($idcom,$idUser){
	/*global $db;
    if (!dejaLike($idcom,$idUser)){
        $sql="INSERT INTO `likescommentaire`(`idlike`, `idcom`, `iduser`) VALUES (NULL,$idcom,$idUser);";
        var_dump($sql);
	    mysqli_query($db, $sql); //on fait la requête pour l'ajouter à la liste de likescommentaire

	    $NouvIntLike = nbLike(getLike(),$idcom);
	    $sqlmaj="UPDATE `publication` SET `nblike` = $NouvIntLike WHERE `idcom` = $idcom; ";
        var_dump($sqlmaj);
	    mysqli_query($db, $sqlmaj); //on fait la requête pour mettre à jour le nombre de likes de la publication
    }  */
    global $db;
    if (dejaUnlikeCom($idcom,$idUser)){
		$sql="INSERT INTO `likescommentaire`(`idlike`, `idcom`, `iduser`) VALUES (NULL,$idcom,$idUser);";
		$sql2="DELETE FROM `netbox`.`dislikescommentaire` WHERE `dislikescommentaire`.`idunlike` = ". idDejaUnlikeCom($idcom,$idUser) .";";
        var_dump($sql);
		mysqli_query($db, $sql); //on fait la requete
        mysqli_query($db, $sql2);
        
    }else if(dejaLikeCom($idcom,$idUser)){
		$sql="DELETE FROM `netbox`.`likescommentaire` WHERE `likescommentaire`.`idlike` = ". idDejalikeCom($idcom,$idUser) .";";
		mysqli_query($db, $sql);
	}else {
		$sql="INSERT INTO `likescommentaire`(`idlike`, `idcom`, `iduser`) VALUES (NULL,$idcom,$idUser);";
		mysqli_query($db, $sql);
    }

    var_dump($idcom);
    var_dump($idUser);

    //$NouvIntLike = nbLikeCom(getLikeCom(),$idcom);
    //$sqlmaj="UPDATE `publication` SET `nblike` = $NouvIntLike WHERE `idcom` = $idcom; ";
    //var_dump($sqlmaj);
    //mysqli_query($db, $sqlmaj); //on fait la requête pour mettre à jour le nombre de likes de la publication
}

function nbLikeCom($like,$idcom){
    $cptLike = 0;
    foreach ($like as $key => $value){
		if ($value['idcom']==$idcom){
			$cptLike++;
		}   
    }
    return $cptLike;
}

function getPostLikeCom($id){
    global $db;
    $tab = [];
    $sql = "SELECT * FROM publication INNER JOIN likescommentaire ON publication.idcom = likescommentaire.idcom WHERE  likescommentaire.iduser=$id ORDER BY likescommentaire.idlike DESC";
    $result = mysqli_query($db,$sql);
    
    while($row = mysqli_fetch_assoc($result)){
        $tab[] = $row;
    }
    return $tab;
}

//------------------------------------------------------------fonction gestion unlike

function getUnlikeCom(){
	//recupere la table unlike
    global $db;
    $tab = [];
    $sql = "select * from dislikescommentaire";
    $result = mysqli_query($db,$sql);
    
    while($row = mysqli_fetch_assoc($result)){
        $tab[] = $row;
    }
    return $tab;
}
function afficheUnlikeBoutonCom($idpost,$idcom, $dislike){
	//affiche le bouton unlike
    $unlikeButton= '<form action="index.php?page=post'.$idpost.'" method="post">
                        <input type="hidden" value="'.$idcom.'" id="idcom" name="idcom">
                        <input type="hidden" value="'.$idpost.'" id="idpost" name="idpost">
						<button type="submit" value="unlikecom" id="unlikecom" name="unlikecom" class="btn btn-dark bi-hand-thumbs-down"> '.$dislike.'</button>
   					</form>';
	//$unlikeButton= '<button type="submit" name="like" value="like" class="btn btn-danger btn-xl bi-heart-half m-1"></button>';
    return $unlikeButton;
}

function dejaUnlikeCom($idcom,$idUser){
	//test si le post est deja unliké par l'utilisateur
	global $db;
    $sql="SELECT * FROM `dislikescommentaire` WHERE dislikescommentaire.idcom=$idcom;";
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
function idDejaUnlikeCom($idcom,$idUser){
	//recupere l'id du unlike en function du post et de l'utilisateur
	global $db;
    $sql="SELECT * FROM `dislikescommentaire` WHERE dislikescommentaire.idcom=$idcom;";
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

function unlikeCom($idcom,$idUser){
	//ajoute ou supprime le unlike en fonction de si il est deja unliké par l'utilisateur
	global $db;
    if (dejaLikeCom($idcom,$idUser)){
		$sql="INSERT INTO `dislikescommentaire`(`idunlike`, `idcom`, `iduser`) VALUES (NULL,$idcom,$idUser);";
		$sql2="DELETE FROM `netbox`.`likescommentaire` WHERE `likescommentaire`.`idlike` = ". idDejalikeCom($idcom,$idUser) .";";
        var_dump($sql);
		mysqli_query($db, $sql); //on fait la requete
		mysqli_query($db, $sql2);
    }else if (dejaUnlikeCom($idcom,$idUser)){
		$sql="DELETE FROM `netbox`.`dislikescommentaire` WHERE `dislikescommentaire`.`idunlike` = ". idDejaUnlikeCom($idcom,$idUser) .";";
		mysqli_query($db, $sql);
	}else {
		$sql="INSERT INTO `dislikescommentaire`(`idunlike`, `idcom`, `iduser`) VALUES (NULL,$idcom,$idUser);";
		mysqli_query($db, $sql);
    }
    
    var_dump($idcom);
    var_dump($idUser);
    //$NouvIntLike = nbLikeCom(getLikeCom(),$idcom);
    //$sqlmaj="UPDATE `publication` SET `nblike` = $NouvIntLike WHERE `idcom` = $idcom; ";
    //var_dump($sqlmaj);
    //mysqli_query($db, $sqlmaj); //on fait la requête pour mettre à jour le nombre de likes de la publication
}


function nbUnlikeCom($like,$idcom){
	//renvoie le nombre de unlike du post
    $cptUnlike = 0;
    foreach ($like as $key => $value){
		if ($value['idcom']==$idcom){
			$cptUnlike++;
		}   
    }
    return $cptUnlike;
}