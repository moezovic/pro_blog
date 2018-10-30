<?php  

$this->title = "Erreur";
?>

<div>
	<h3>Une erreur a été detecté lors de l'execution de votre requete</h3>
	<p><?=$e->getMessage() ?></p>
	<p>Veuillez nous excuser pour ce probleme imprevu</p>
</div>

