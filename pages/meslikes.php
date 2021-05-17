<?php

$donnepostlike = getPostLike($_SESSION['id']);
?>
<div class="container shadow rounded mt-3 coulGrisActu">
    <div class="container shadow p-3 rounded mt-3 coulGrisActu">
        <div class='container mt-5 pageminimumtaille'> 
            
            <h5 class="fs-3"> Voici vos posts likés : </h5>
            
            <div class="m-4">
                <?php
                    affichepost($donnepostlike);
                ?>
            </div>
        </div>
    </div>
</div>
<!-- <div class="conteneur">
    <div class="contenu">fddfdfdffddfdfdfdfdf</div>
    <div class="apercu">bonjour</div>
</div> -->
