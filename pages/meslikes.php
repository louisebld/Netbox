<?php

$donnepostlike = getPostLike($_SESSION['id']);
?>

<div class='container mt-5 pageminimumtaille'> 
	<h5> Voici vos posts likés : </h5>
<?php
affichepost($donnepostlike);


?>

</div>