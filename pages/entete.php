
<!-- <div class="contener-fluid entete m-2 ">
	<h5 class="text-sm-center p-2 align-items-center mr-auto ">#ShareLife</h5>
	position-absolute
	<a class="btn btn-danger" href="index.php">Accueil</a>
	<a class="btn btn-success" href="#">Profil</a>
	<a class="btn btn-success" href="index.php?page=communaute">Communauté</a>

</div> -->


<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <img src="images/community.png" width="50" class="mx-4"> 
  <a class="navbar-brand mx-4" href="index.php?page=accueil">Accueil</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="index.php?page=communaute">Communauté</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Profil</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="index.php?page=publication">Publier</a>
      </li>
    </ul>
    </div>

    <form  method='post' class="form-group form-inline d-flex" action='index.php?page=communaute'>
        <input class="form-control mr-sm-2 w-auto" type="search" name='recherchecommu' placeholder="Communauté" aria-label="Search">
        <button name='cherchercommu' class="btn btn-outline-success my-2 my-sm-0 m-4" value='Chercher' type="submit">Search</button>
    </form>


</nav>
