<?php  
$this->title = "détail d'articles";
?>
<div>
	<p><a href="index.php?action=list">Retourner à la page precedante</a></p>
	<h3><?= htmlspecialchars($blogPost->getTitle()); ?></h3>
	<span><?= htmlspecialchars($blogPost->getTopicSentence()); ?></span>
	<p><?= htmlspecialchars($blogPost->getContent()); ?></p>
	<span><?= htmlspecialchars($blogPost->getAuthor()); ?></span>
	<span><?= htmlspecialchars($blogPost->getUpdateTime()); ?></span>
</div>
<div>
	<?php 
	foreach ($comments as $comment) {
		
		echo '<p><strong>'. $comment->getAuthor().'</strong> '.  $comment->getContent().' <strong>'. $comment->getInsertDate().'</strong></p>';
	 } 
	 ?>
</div>