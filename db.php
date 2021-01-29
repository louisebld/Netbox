<?php 
if ($db = mysqli_connect("localhost", "root", "","netbox")) {
	mysqli_set_charset($db, "utf8");
} else {
	echo "Impossible de ce connecter";
}
?>
