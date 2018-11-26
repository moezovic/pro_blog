<?php 

session_start();
if (isset($_SESSION['name'])) 
{
	$this->menu =?>
	<ul class="nav-item">
		<a class ="nav-link" href="index.php?action&access=sessionend">Déconnexion</a>
	</ul>
	
<?php
}
else
{
	$this->menu =?>

	<ul class="nav-item">
		<a class="nav-link" href="index.php?action&access=Connexion">Connexion</a>
	</ul>
	<ul class="nav-item">
		<a class="nav-link" href="index.php?action&access=subscribe">Inscription</a>
	</ul>

<?php	
}

if (isset($_SESSION['name'])) 
{
	echo "Pour gerer les commentaires vous etes au bon endroit";
}
else 
{
	throw new Exception("L'access à cette page est reservé aux membres enregistrés");
	
 }
?>