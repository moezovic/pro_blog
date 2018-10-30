<?php 
$this->title ="Liste d'articles";

foreach ($blogPosts as $blogPost) 
{
 ?>

 <div>
 		<h3><?= htmlspecialchars($blogPost->getTitle());?></h3>
 		<span><?= htmlspecialchars($blogPost->getUpdateTime()); ?></span>
 		<p><?= htmlspecialchars($blogPost->getTopicSentence()); ?></p>
 		<a href="index.php?action=single&postId=<?=$blogPost->getId(); ?>">Lire la suite</a>
 </div>

 <?php 
}
  ?>