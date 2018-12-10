<?php
session_start();

$this->title = 'Page introuvable';
$this->custom = 'custom-menu';

// customize menu links

if (isset($_SESSION['name'])) {
    $this->menu = true;
} else {
    $this->menu = false;
}
?>
 
 <div class="alert alert-warning">
     <h3>La page que vous avez demandé n'existe pas</h3>
     <p>Pour retourner à la page d'accueil, cliquez sur ce <a href="index.php">lien</a></p>

 </div>