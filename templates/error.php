<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
}

$this->_title = 'Erreur';
$this->_custom = 'custom-menu';

// customize menu links

if (isset($_SESSION['name'])) {
    $this->_menu = true;
} else {
    $this->_menu = false;
}

?>

<div>
    <h3>Une erreur a été detecté lors de l'execution de votre requete</h3>
    <p><?php echo $e->getMessage(); ?></p>
    <p>Veuillez nous excuser pour ce probleme imprevu</p>
</div>

