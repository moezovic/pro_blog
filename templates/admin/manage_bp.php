<?php 

session_start();

if (isset($_SESSION['name'])) 
{
	ob_start(); ?>
	<li class="nav-item">
		<a class ="nav-link" href="index.php?action&access=connected&admin=add_blogpost">Ajouter articles</a>
	</li>
	<li class="nav-item">
		<a class ="nav-link" href="index.php?action&access=connected&admin=manage_blogposts">Gérer articles</a>
	</li>
	<li class="nav-item">
		<a class ="nav-link" href="index.php?action&access=connected&admin=manage_comments">Gérer commentaires</a>
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
	echo "Pour gerer un blogpost vous etes au bon endroit";
}
else 
{
	throw new Exception("L'access à cette page est reservé aux membres enregistrés");
	
 }
?>