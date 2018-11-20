
<!-- Page Header -->

<header class="masthead" style="background-image: url('../public/img/read.png')">
	<div class="overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-md-10 mx-auto">
				<div class="page-heading">
					<h1><?= htmlspecialchars($blogPost->getTitle()); ?></h1>
					<span class="subheading"><?= htmlspecialchars($blogPost->getTopicSentence()); ?></span>
				</div>
			</div>
		</div>
	</div>
</header>

<!-- Main Content -->

<div class="container">
	<div>
			<a href="index.php?action=list" class="btn btn-primary">Page précédante</a>
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
</div>
