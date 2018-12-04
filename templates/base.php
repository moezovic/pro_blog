<!DOCTYPE html>
<html lang="fr">

	<head>
		<meta charset="utf-8">
		<title><?= $title ?></title>

		<link rel="stylesheet" type="text/css" href="css/clean-blog.min.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.15/css/mdb.min.css" rel="stylesheet">
    <script type="text/javascript" src= js/effect.js></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.15/js/mdb.min.js"></script>


	</head>

	<body>
	    <!-- Navigation -->
    <nav class="<?= $custom; ?> navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand" href="index.php">Moez Thabti</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Accueil</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php?action&bp=list">Articles</a>
            </li>
            <?php

              if ($menu) 
              {
                ?>
                  
                <li class="nav-item dropdown">
                  <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button">Administration</a>

                  <ul class="dropdown-menu">
                    <li class="nav-item">
                      <a class ="nav-link" href="index.php?action&access=connected&admin=add_blogpost">Ajouter articles</a>
                    </li>
                    <li class="nav-item">
                      <a class ="nav-link" href="index.php?action&access=connected&admin=manage_blogposts">Gérer articles</a>
                    </li>
                    <li class="nav-item">
                      <a class ="nav-link" href="index.php?action&access=connected&admin=manage_comments">Gérer commentaires</a>
                    </li>
                  </ul>
              </li>

              <li class="nav-item">
                <a class ="nav-link" href="index.php?action&access=sessionend">Déconnexion</a>
              </li>

                <?php
              }
              else
              {

                ?>
              <li class="nav-item">
                <a class="nav-link" href="index.php?action&access=connexion">Connexion</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="index.php?action&access=subscribe">Inscription</a>
              </li>
                <?php
              }

            ?>
          </ul>
        </div>
      </div>
    </nav>

<!-- Include page header and main content -->

		<div id="content">
			<?= $content ?>
		</div>

		<!-- Footer -->

	<footer>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <ul class="list-inline text-center">
              <li class="list-inline-item">
                <a href="https://fr.linkedin.com/in/moez-thabti-3949b915a">
                  <span class="fa-stack fa-lg">
                    <i class="fas fa-circle fa-stack-2x"></i>
                    <i class="fab fa-linkedin fa-stack-1x fa-inverse"></i>
                  </span>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="https://github.com/moezovic">
                  <span class="fa-stack fa-lg">
                    <i class="fas fa-circle fa-stack-2x"></i>
                    <i class="fab fa-github fa-stack-1x fa-inverse"></i>
                  </span>
                </a>
              </li>
            </ul>
            <p class="copyright text-muted">Copyright &copy; Moez THABTI 2018</p>
          </div>
        </div>
      </div>
    </footer>

		<script src="../public/vendor/jquery.min.js"></script>
		<script src="../public/vendor/bootstrap.bundle.min.js"></script>
	</body>
</html>