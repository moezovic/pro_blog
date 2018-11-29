<?php
session_start(); 

$this->title ="Liste d'articles";

// customize menu links

if (isset($_SESSION['name'])) 
{
	ob_start(); ?>

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
	<?php $this->menu = ob_get_clean(); 
}
else
{
	ob_start(); ?>
	<li class="nav-item">
		<a class="nav-link" href="index.php?action&access=connexion">Connexion</a>
	</li>
	<li class="nav-item">
		<a class="nav-link" href="index.php?action&access=subscribe">Inscription</a>
	</li>
	<?php $this->menu = ob_get_clean();

}
?>

<!-- Page Header -->

<header class="masthead" style="background-image: url('../public/img/news.jpg')">
	<div class="overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-md-10 mx-auto">
				<div class="page-heading">
					<h1>Articles</h1>
					<span class="subheading">Une variété de sujets abordés </span>
				</div>
			</div>
		</div>
	</div>
</header>

<!-- Main Content -->

<div class="container">
	<div class="row">
		<div class="card-deck mx-auto">

			<?php 
				foreach ($blogPosts as $blogPost) {
 			?>

		 <div class="card text-center">
		 	<div class="card-body">
		 		<h3 class="card-title"><?= htmlspecialchars($blogPost->getTitle());?></h3>
		 		<span class="card-subtitle mb-2 text-muted"><?= htmlspecialchars($blogPost->getUpdateTime()); ?></span>
		 		<p class="card-text"><?= htmlspecialchars($blogPost->getTopicSentence()); ?></p>
		 		
		 	</div>
		 	<div class="card-footer">
		 		<a class="btn btn-primary" href="index.php?action&bp=single&postId=<?=$blogPost->getId(); ?>">Lire la suite</a>
		 	</div>
 		 </div>

	 		 <?php 
	 		 }
	 		 ?>

 	 </div>
	</div>
</div>
