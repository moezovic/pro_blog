<?php  
session_start();
$this->title = "Erreur";

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
	<h3>Une erreur a été detecté lors de l'execution de votre requete</h3>
	<p><?=$e->getMessage() ?></p>
	<p>Veuillez nous excuser pour ce probleme imprevu</p>
</div>

