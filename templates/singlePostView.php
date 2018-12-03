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
	<div class="row">
		<p>
			<a href="index.php?action&bp=list" class="btn btn-primary">Page précédante</a>
		</p>
	</div>
	<div class="row">
			<p class="col-12"><?= nl2br(htmlspecialchars($blogPost->getContent())); ?></p>
			<span class="col-12">Articlé écrit par : <strong><?= htmlspecialchars($blogPost->getAuthor()); ?></strong></span>
			<span class="col-12">Dernière modification le : <strong><?= htmlspecialchars($blogPost->getUpdateTime()); ?></strong></span>
	</div>
</div>

<hr>

<div class="container">
	<div class="table-responsive">
		<table class="table table-bordered table-sm">
			<thead class="thead-light">
				<tr>
					<th>Auteur</td>
					<th>Commentaire</td>
					<th>Date d'ajout</td>
				</th>
			</thead>
			<tbody>
			<?php 
				foreach ($comments as $comment) 
				{
				?>
					<tr>
					<td><?= $comment->getAuthor(); ?></td>
					<td><?= $comment->getContent(); ?></td>
					<td><?= $comment->getInsertDate(); ?></td>
				</tr>
				<?php
				}
			 ?>
			 </tbody>
		</table>
	</div>
</div>

<hr>

<div class="container">

	<form method="POST" action="index.php?action&comments=new&id=<?=$comment->getId();?>" class="form">

		<div class="form-group ">
			<label for="commentary">Commentaire</label>
			<input type="text" name="commentary" class="form-control " id="commentary" />
		</div>

		<div class="form-group ">
			<label for="name">Nom</label>
			<input type="text" name="name" class="form-control " id="name" />
		</div>

		<div class="form-group ">
			<input type="submit" value="Ajouter" class="btn btn-outline-primary submit" />
		</div>

		</form>	
	
</div>





