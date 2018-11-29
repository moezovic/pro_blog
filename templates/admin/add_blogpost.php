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
?>

<!-- Main Content -->

<div class="container">
	<div class="row">
  <div class="col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2 mx-auto">
		<h2 class="text-center">Ajouter un nouveau article</h2>

	 <form method="POST" action="index.php?action&bp=new" class="form">
	<div class="form-group ">
		<label for="title">Le titre</label>
		<input type="text" name="title" class="form-control " value="" />
	</div>

	<div class="form-group ">
		<label for="topic_sentence">Le chapô</label>
		<input type="text" name="topic_sentence" class="form-control " value="" />
	</div>

   <div class="form-group ">
			<label for="main_content">Le contenu</label>
			<textarea name="main_content" class="form-control"></textarea>
	 </div>

	 	<div class="form-group ">
			<label for="author">L'auteur</label>
			<input type="text" name="author" class="form-control " value="" />
		</div>

    <div class="form-group ">
			<input type="submit" value="Ajouter" class="btn btn-outline-primary submit" />
		</div>

		</form>	    	
	</div>
 </div>
</div>
