
<!-- <div class="contener-fluid entete m-2 ">
	<h5 class="text-sm-center p-2 align-items-center mr-auto ">#ShareLife</h5>
	position-absolute
	<a class="btn btn-danger" href="index.php">Accueil</a>
	<a class="btn btn-success" href="#">Profil</a>
	<a class="btn btn-success" href="index.php?page=communaute">Communauté</a>

</div> -->


<nav class="navbar navbar-expand-lg navbar-dark barre">
  <!-- <img src="images/community.png" width="50" class="mx-4">  -->
  <!-- <i class="bi bi-people-fill"></i> -->
  <!-- <button type="button" name="people" value="people" class="btn btn-danger btn-xl bi-people-fill m-1"></button> -->

  <a class="navbar-brand mx-4 .text-light" href="index.php?page=actu">Netbox</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup"><?php modalCommunaute(); ?>
    <ul class="navbar-nav">


<!-- AFFICHER LES COMMUS -->
<!--         <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Communauté
          </a> -->
         <!--  <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item hText" href="index.php?page=communaute">Voir les Communautés</a></li>
            <?php
            // if (isset($_SESSION['id'])) {
            //   echo "<li><a class='dropdown-item hText' href='' data-bs-toggle='modal' data-bs-target='#commuBouton' data-bs-whatever='@getbootstrap'> Créer une Communauté</a></li>";
            // }
            ?>
            
          </ul> -->
        <!-- </li> -->
      <li class='nav-item'>

            <a href='index.php?page=publication'><button type="submit" name="addpost" value="post" class="btn btn-primary btn-circle bi-pencil-square m-1 "> Publier</button></a>
      </li>
      <li class='nav-item'>
            <a href='index.php?page=mescommu'><button type="submit" name="commu" value="commu" class="btn btn-warning  btn-circle bi-journal-richtext m-1"> Communauté</button></a>
      </li>

      <li class='nav-item'>
    <a href='index.php?page=recherche'><button type="submit" name="commu" value="commu" class="btn btn-success  btn-circle bi-search m-1"> Recherche</button></a>


      </li>
      <?php
      if (isset($_SESSION['id'])) {
      //   echo "
      // <li class='nav-item'>
      //   <a class='nav-link' href='index.php?page=profil'>Profil</a>
      // </li>";

      // echo "
      // <li class='nav-item'>
      //   <a class='nav-link' href='index.php?page=publication'>Publier</a>
      // </li>";

      }
      ?>

 <!--      <li class='nav-item'>
        <a class='nav-link' href='index.php?page=tag'>Tag</a>
      </li> -->
<!--       <li class='nav-item'>
        <a class='nav-link' href='index.php?page=recherche'>Recherche</a>
      </li>
       -->
    </ul>
    </div>

<!--     <form  method='post' class="form-group form-inline d-flex" action='index.php?page=communaute'>
        <input class="form-control mr-sm-2 w-auto" type="search" name='recherchecommu' placeholder="Communauté" aria-label="Search">
        <button name='cherchercommu' class="btn btn-outline-success my-2 my-sm-0 m-4" value='Chercher' type="submit">Chercher</button>
    </form> -->

<?php  $id = $_SESSION['id'];

  $profil = recup_profil_id($id)[0];

?>
<!-- window open bof bof nouvel onglet onclick="window.open('index.php?page=profil')"-->
<a href='index.php?page=profil'>
<img class="roundedImageentete"  src="DATA/profil_pp/<?php echo $profil['picture']; ?>">
</a>
        <a href="index.php?act=deconnexion" style="text-decoration: none;color: black;"><button type="button" class="btn btn-secondary bi-box-arrow-right m-2" data-bs-whatever="@getbootstrap"></button></a>
</nav>
