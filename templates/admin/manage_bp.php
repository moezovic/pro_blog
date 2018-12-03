<?php 

session_start();

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

if (isset($_SESSION['name'])) 
{

	?>
<!-- Page Header -->

<header class="masthead" style="background-image: url()">
	<div class="overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-md-10 mx-auto">
				<div class="page-heading">
					<h1></h1>
					<span class="subheading"> </span>
				</div>
			</div>
		</div>
	</div>
</header>

	<div class="container">

		<div class="row">
			<table class="table">
				<thead>
					<tr>
						<th>Titre</th>
						<th>Auteur</th>
						<th>Dernière mise à jour</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php
						foreach ($blogPosts as $blogPost) {
							?>
							<tr>
								<td><?= htmlspecialchars($blogPost->getTitle()); ?></td>
								<td><?= htmlspecialchars($blogPost->getAuthor()); ?></td>
								<td><?= htmlspecialchars($blogPost->getUpdateTime()); ?></td>
								<td>
									<a href="index.php?action&access=connected&admin=edit&id=<?= $blogPost->getId()?>" class="btn btn-warning">Modifier</a>

									<a href="index.php?action&bp=delete&id=<?= $blogPost->getId()?>" class="btn btn-danger">Supprimer</a>
								</td>
								
							</tr>
						<?php	
						}

					?>
				</tbody>
			</table>
		</div>
		
	</div>


<?php
}
else 
{
	throw new Exception("L'access à cette page est reservé aux membres enregistrés");
	
 }




