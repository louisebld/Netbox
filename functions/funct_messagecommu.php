<?php
function print_formulairemessagecommu($id) {
// Fonction qui affiche le formulaire
	?>


	<!-- <form method="post" action="index.php?page=communaute" enctype="multipart/form-data"> -->

   <div class="container content">
    <div class="row">
        <div class="">
        	<div class="card">
        		<div class="card-header">Tchat</div>
<!--         		<div class="card-body height3">
 -->        			<ul class="chat-list">
				    <div class="p-2" id="discussion">
				    </div>
		</ul>
        		</div>
        	</div>
        </div>
    </div>




		<input type="hidden" id="idutilisateur" name="idutilisateur" value="<?php if (isset($_SESSION['id'])) {echo $_SESSION['id'];} ?>" />
		<input type="hidden" id="idcommu" name="idcommu" value="<?php echo $id; ?>" />
		<!-- <input type="hidden" id="nomcommu" name="nomcommu" value="<?php //echo $communaute; ?>" /> -->

		
		<div class="form-group">
			<textarea class="form-control" name="message" id="message" placeholder="Message" rows="3"></textarea>
		</div>
		<br/>


		<center><input type="submit" class="btn btn-primary" name="postermessagecommu" id="postermessagecommu" value="Envoyer" /></center>

	<!-- </form> -->

	<?php

}



function affichemessagecommu($tableaumessagecommu){

	echo"<div class='container'>";
	foreach ($tableaumessagecommu as $key => $value) {
		echo "<p>";
		echo $value["utilisateur"];
		echo "<br/>";
		echo $value["message"];
		echo "</p>";
	}

	echo "</div>";
}