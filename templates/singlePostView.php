<?php 
session_start(); 

$this->title = "détail d'articles";

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

<header class="masthead" style="background-image: url('../public/img/read.png')">
	<div class="overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-md-10 mx-auto">
				<div class="page-heading">
					<h1><?= htmlspecialchars($blogPost->getTitle()); ?></h1>
					<span class="subheading"><?= htmlspecialchars($blogPost->getTopicSentence()); ?></span>
				</div>
			</div>
		</div>
	</div>
</header>

<!-- Main Content -->

<div class="container">
	<div>
			<a href="index.php?action&bp=list" class="btn btn-primary">Page précédante</a>
			<p><?= htmlspecialchars($blogPost->getContent()); ?></p>
			<span><?= htmlspecialchars($blogPost->getAuthor()); ?></span>
			<span><?= htmlspecialchars($blogPost->getUpdateTime()); ?></span>
	</div>
	<div>
		<?php 
		foreach ($comments as $comment) {
			
			echo '<p><strong>'. $comment->getAuthor().'</strong> '.  $comment->getContent().' <strong>'. $comment->getInsertDate().'</strong></p>';
		 } 
		 ?>
	</div>
</div>
