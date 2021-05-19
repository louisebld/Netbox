<?php 
$mon_id = $_SESSION['id'];
$id_notification_DM = 1;
$id_notification_follow = 2;
$id_notification_autre = 3;
?>

<div class="contener m-5 communaute p-4">


	<h4>Vos notifications !</h4>
	<div>

		<ul class="nav nav-tabs" id="myTab" role="tablist">

			<li class="nav-item">
				<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Notification</a>
			</li>

			<?php if (aTypeDeNotification($mon_id,$id_notification_DM)) { ?>
				<li class="nav-item">
				<a class="nav-link" id="tchat-tab" data-toggle="tab" href="#tchat" role="tab" aria-controls="tchat" aria-selected="false">Messages Privés</a>
				</li>
			<?php } ?>
			
			<?php if (aTypeDeNotification($mon_id,$id_notification_follow)) { ?>
			<li class="nav-item">
				<a class="nav-link" id="stats-tab" data-toggle="tab" href="#stats" role="tab" aria-controls="stats" aria-selected="false">Nouveaux Followers</a>
			</li>
			<?php } ?>

		</ul>

	<div class="container col-lg-8">
		<div class="tab-content" id="myTabContent">
			<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
				<div class="container descriptioncommu caption img-thumbnail mt-4">
					<h4> Bienvenue sur vos Notifications </h4>
					<?php
					// Affichage du récapitulatif des Notifications
						// print_recapNotification($mon_id);
						if (anotification($mon_id)) { ?>
							<form method="post" action="index.php?page=notification" enctype="multipart/form-data">
				    		<?php  
				    		?>
				    		<div class="d-flex justify-content-center" style="padding: 10px; margin-bottom: 10px">
				    		
				    		<input type="hidden" id="idCurrentUser" name="idCurrentUser" value="<?php echo $mon_id; ?>" />
				    		<input type="submit" class="btn btn-danger" name="supprToutesLesNotifs" id="supprAllNotif" value="Supprimer toutes les notifications" />

				    		</div>
				    		</form>
		    			<?php
						}
						print_formulairemessageNotificationDM($mon_id,$id_notification_DM);
						print_formulairemessageNotificationFollow($mon_id,$id_notification_follow);
					?>
				</div>
			</div>

			<div class="tab-pane fade" id="tchat" role="tabpanel" aria-labelledby="tchat-tab">
				<div class="container descriptioncommu caption img-thumbnail mt-4">
					<h4> Messages Privés </h4>
					<?php
					// Affichage des Notifications
						print_formulairemessageNotificationDM($mon_id,$id_notification_DM);
					?>
				</div>
			</div>

			<div class="tab-pane fade" id="stats" role="tabpanel" aria-labelledby="stats-tab">
				<div class="container descriptioncommu caption img-thumbnail mt-4">
					<h4> Nouveaux Followers </h4>
					<?php
						// Affichage des Notifications
						print_formulairemessageNotificationFollow($mon_id,$id_notification_follow);
					?>
				</div>
			</div>
			<div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
				<div class="container descriptioncommu caption img-thumbnail mt-4">
					<h4> Autres </h4>
					<?php
						// Affichage des Notifications
						print_formulairemessageNotificationFollow($mon_id,$id_notification_autre);
					?>
				</div>
			</div>
		</div>
	</div>
</div>
</div>