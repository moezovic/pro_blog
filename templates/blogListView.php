<?php 
$this->title ="Liste d'articles";
?>

<!-- Page Header -->

<header class="masthead" style="background-image: url('../public/img/news.jpg')">
	<div class="overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-md-10 mx-auto">
				<div class="page-heading">
					<h1>Articles</h1>
					<span class="subheading">Une variété de sujets abordés </span>
				</div>
			</div>
		</div>
	</div>
</header>

<!-- Main Content -->

<div class="container">
	<div class="row">
		<div class="card-deck">
<?php
foreach ($blogPosts as $blogPost) 
{
 ?>
		
		 <div class="card text-center">
		 	<div class="card-body">
		 		<h3 class="card-title"><?= htmlspecialchars($blogPost->getTitle());?></h3>
		 		<span class="card-subtitle mb-2 text-muted"><?= htmlspecialchars($blogPost->getUpdateTime()); ?></span>
		 		<p class="card-text"><?= htmlspecialchars($blogPost->getTopicSentence()); ?></p>
		 		
		 	</div>
		 	<div class="card-footer">
		 		<a class="btn btn-primary" href="index.php?action=single&postId=<?=$blogPost->getId(); ?>">Lire la suite</a>
		 	</div>
 		 </div>
		
 <?php 
}
 ?>
 	 </div>
	</div>
</div>
