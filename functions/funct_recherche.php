<?php 
	function get_amis($pseudo)
	{
		$profil = get_all_profil();
		$amis = [];
		for ($i=0; $i < count($profil); $i++) { 
			if (amis_valide($profil[$i],$pseudo)) {
				array_push($amis, $profil[$i]);
			}
		}
		return $amis;
	}

	function get_all_profil()
	{
		global $db;
		$sql = "SELECT * FROM `profil`";
		$result = mysqli_query($db,$sql);
    
	    while($row = mysqli_fetch_assoc($result)){
	        $tab[] = $row;
	    }
	    return $tab;
	}

	function amis_valide($profil,$pseudo)
	{
		$pseudo_P = strtoupper($profil["pseudo"]);
		$pseudo = strtoupper($pseudo);
		$res = false;
		if (count(explode($pseudo, $pseudo_P)) > 1) {
			$res = true;
		}
		return $res;
	}

	function affiche_amis($amis)
	{
		for ($i=0; $i < count($amis); $i++) { 
			affiche_ami($amis[$i]);
		}
	}
	function affiche_ami($ami)
	{
		?><div style="display: flex;"> <?php 
		?><?php 

		?>
		<div style="width: 25%;">
			<img src="DATA/profil_pp/<?php echo $ami['picture']; ?>" style="width: 100%;">
		</div>
		<div style="width: 75%;text-align: center;">
			<h2><?php echo $ami['pseudo']; ?></h2>
			<p><?php echo $ami['description']; ?></p>
		</div>
		<?php 


		?></div> <hr> <?php 
	}
 ?>