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
	echo "Pour gerer les commentaires vous etes au bon endroit";
?>
		<div class="container">

		<div class="row">
			<table class="table">
				<thead>
					<tr>
						<th>Auteur</th>
						<th>Commentaire</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php
						foreach ($pendingComments as $comment) {
							?>
							<tr>
								<td><?= htmlspecialchars($comment['author']); ?></td>
								<td><?= htmlspecialchars($comment['content']); ?></td>
								<td>
									<a href="index.php?action&comments=validate&id=<?= $comment['id']?>" class="btn btn-warning">Valider</a>

									<a href="index.php?action&comments=delete&id=<?= $comment['id']?>" class="btn btn-danger">Supprimer</a>
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