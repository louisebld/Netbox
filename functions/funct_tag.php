<?php 
	function Recup_nom_communote_de_id($id)
	{
		global $db;
		$sql = "SELECT * FROM `communaute` WHERE `idcommu` = $id";
		$results = mysqli_query($db,$sql);
		$res = [];
		foreach ($results as $key => $val) {
			array_push($res, $val);
		}
		return $res[0]['nom'];
	}
	function recup_all_tag()
	{
		global $db;
		$res = [];

		$sql = "SELECT * FROM communaute";
		$results = mysqli_query($db,$sql);


		foreach ($results as $key => $val) {
			$data = explode(" ", $val['description']);
			for ($i=0; $i < count($data); $i++) { 
				if (count(explode("#", $data[$i]))>1) {
					array_push($res, $data[$i]);
				}
			}
			$data = explode(" ", $val['nom']);
			for ($i=0; $i < count($data); $i++) { 
				if (count(explode("#", $data[$i]))>1) {
					array_push($res, $data[$i]);
				}
			}
		}

		$sql = "SELECT * FROM publication";
		$results = mysqli_query($db,$sql);

		
		$data = [];

		foreach ($results as $key => $val) {
			$data = explode(" ", $val['description']);
			for ($i=0; $i < count($data); $i++) { 
				if (count(explode("#", $data[$i]))>1) {
					array_push($res, $data[$i]);
				}
			}
			
		}

		$sql = "SELECT * FROM com";
		$results = mysqli_query($db,$sql);

		
		$data = [];

		foreach ($results as $key => $val) {
			$data = explode(" ", $val['com']);
			for ($i=0; $i < count($data); $i++) { 
				if (count(explode("#", $data[$i]))>1) {
					array_push($res, $data[$i]);
				}
			}
		}

		$sql = "SELECT * FROM reponses";
		$results = mysqli_query($db,$sql);

		
		$data = [];

		foreach ($results as $key => $val) {
			$data = explode(" ", $val['reponse']);
			for ($i=0; $i < count($data); $i++) { 
				if (count(explode("#", $data[$i]))>1) {
					array_push($res, $data[$i]);
				}
			}
		}


		return array_unique($res);
	}

	function get_all_tag($tag)
	{
		global $db;
		$res = [];

		$sql = "SELECT * FROM communaute";
		$results = mysqli_query($db,$sql);

		
		$data = [];

		foreach ($results as $key => $val) {
			if (count(explode($tag, $val['description'])) >1 || count(explode($tag, $val['nom'])) >1) {
				array_push($data, $val);
			}
		}
		array_push($res, $data);

		$sql = "SELECT * FROM publication";
		$results = mysqli_query($db,$sql);

		
		$data = [];

		foreach ($results as $key => $val) {
			if (count(explode($tag, $val['description'])) >1) {
				array_push($data, $val);
			}
		}
		array_push($res, $data);

		$sql = "SELECT * FROM com";
		$results = mysqli_query($db,$sql);

		
		$data = [];

		foreach ($results as $key => $val) {
			if (count(explode($tag, $val['com'])) >1) {
				array_push($data, $val);
			}
		}
		array_push($res, $data);

		$sql = "SELECT * FROM reponses";
		$results = mysqli_query($db,$sql);

		
		$data = [];

		foreach ($results as $key => $val) {
			if (count(explode($tag, $val['reponse'])) >1) {
				array_push($data, $val);
			}
		}
		array_push($res, $data);


		return $res;
	}

	function recup_pseudo_id($id)
	{
		global $db;
		$sql = "SELECT * FROM `profil` WHERE `id` = '$id'";
		$results = mysqli_query($db,$sql);

		$res = [];
		while($row = mysqli_fetch_assoc($results)){
			$res[] = $row;
		}

		if (count($res)>0) {
			return $res[0]['pseudo'];
		}else{
			return "Utilisateur Inconnu !";
		}

		

	}

 
 function affichelistetag(){
 			echo '<ol class="list-group list-group-flush">';
			$data = recup_all_tag();
			echo '<div class="list-group p-2">';
			echo '<h5 class="m-2"> Listes des tags : </h2>';
			$compteur = 0;
			$taille = count($data);
			$i=0;
			while ($compteur != $taille) { 
				// echo "<li class='list-group-item'> -> <a href='index.php?page=tag-res&tag=".implode("", explode("#", $data[$i]))."'>".$data[$i]."</a></li>";

				if (isset($data[$i])){


				// echo '<a href="index.php?page=tag-res&tag=".implode("", explode("#", $data[$i]))."" class="list-group-item list-group-item-action ">' . $data[$i] . '</a>';		

			// $data[2]=array_pop($data);

				if ($compteur%2 == 0){
					

				// echo '<a href="index.php?page=tag-res&tag="' . implode("", explode("#", $data[$i])). " class='list-group-item list-group-item-action list-group-item-primary'>" . $data[$i] . "</a>";

				echo "<li class='list-group-item list-group-item-primary'><a  class='stylelien' href='index.php?page=tag-res&tag=". implode("", explode("#", $data[$i]))."'>".$data[$i]."</a></li>";



				} 
				else {
					

				echo "<li class='list-group-item'><a class='stylelien' href='index.php?page=tag-res&tag=". implode("", explode("#", $data[$i]))."'>".$data[$i]."</a></li>";

				// echo '<a href="index.php?page=tag-res&tag=".implode("", explode("#", $data[$i]))."" class="list-group-item list-group-item-action ">' . $data[$i] . '</a>';				
				}




			$compteur++;

			}
			$i++;
		}



}

?>