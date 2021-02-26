<?php

function commenceparpersonne($chaine) {
  if(strpos($chaine, "personneid" ) === 0){
      return true;
  }else {
      return false;
}

} 

function savoirpersonne($chaine){
	return intval(substr($chaine, 10, (strlen($chaine)-1)));

}