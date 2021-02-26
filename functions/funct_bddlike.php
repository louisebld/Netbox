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
    $likeButton= "<button type='button' class='btn btn-dark' name='like' onclick=\"location.href='./index.php?page=commuJeusociete&idpost=$idpost'\">like</button>";
	//$likeButton= '<button type="submit" name="like" value="like" class="btn btn-danger btn-xl bi-heart-half m-1"></button>';
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

function like($idpost,$idUser){
	global $db;
    if (!dejaLike($idpost,$idUser)){
        $sql="INSERT INTO `likes`(`idlike`, `idpost`, `iduser`) VALUES (NULL,$idpost,$idUser);";
        var_dump($sql);
	    mysqli_query($db, $sql); //on fait la requête pour l'ajouter à la liste de likes

	    $NouvIntLike = nbLike(getLike(),$idpost);
	    $sqlmaj="UPDATE `publication` SET `nblike` = $NouvIntLike WHERE `idpost` = $idpost; ";
        var_dump($sqlmaj);
	    mysqli_query($db, $sqlmaj); //on fait la requête pour mettre à jour le nombre de likes de la publication
    }  
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




