<?php 
if ($db = mysqli_connect("localhost", "NetBox", "rwuv8s1Fx9ldR2RW","NetBox")) {
	mysqli_set_charset($db, "utf8");
} else {
	echo "Impossible de ce connecter";
}

session_start();

?>
