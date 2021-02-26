<?php

$donnepostlike = getPostLike($_SESSION['id']);
?>

<div class='container mt-5'> 
	<h5> Voici vos posts likés : </h5>
<?php
affichepost($donnepostlike);


?>

</div>