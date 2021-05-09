<?php
$mon_id = $_SESSION['id'];
?>
<div class="fixed-bottom">
	<div class="position-absolute justify-content-start">
		<?php
			afficheboutonNotification($mon_id);
		?>
	</div>
	<div class="d-flex flex-row justify-content-end">
		<div class="">
			<a href='index.php?page=publication'><button type="submit" name="addpost" value="post" class="btn btn-primary btn-circle btn-xl bi-pencil-square m-1 "></button></a>
		</div>
		<div class="">
			<a href='index.php?page=likes'><button type="submit" name="like" value="like" class="btn btn-danger  btn-circle btn-xl bi-heart-half m-1"></button></a>
		</div>
		<div class="">
			<a href='index.php?page=communaute'><button type="submit" name="commu" value="commu" class="btn btn-warning  btn-circle btn-xl bi-journal-richtext m-1"></button></a>
		</div>
	</div>
</div>


	