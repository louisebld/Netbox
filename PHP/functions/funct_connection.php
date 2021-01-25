<?php 

function contien_sc($text)
{
	return count(explode("<", $text))>1; 
}

function est_utilise($email)
{
	$res = recup_profil_email($email);
	return count($res) != 0;
}

?>
