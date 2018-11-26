<?php 
session_start();
$this->title = "Page introuvable";

if (isset($_SESSION['name'])) 
{
	ob_start(); ?>
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
 
 <div>
 	<h3>La page que vous avez demandé n'existe pas</h3>
 	<p>Pour retourner à la page d'accueil, cliquez sur ce <a href="index.php">lien</a></p>

 </div>