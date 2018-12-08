<?php 
session_start(); 

$this->title = "détail d'articles";

// customize menu links

if (isset($_SESSION['name'])) {
    $this->menu = true; 
}
else
{
    
    $this->menu = false;

}
?>

<!-- Page Header -->

<header class="masthead" style="background-image: url('../public/img/read.png')">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="page-heading">
                    <h1><?php echo htmlspecialchars($blogPost->getTitle()); ?></h1>
                    <span class="subheading"><?php echo htmlspecialchars($blogPost->getTopicSentence()); ?></span>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Main Content -->

<div class="container">
    <div class="row">
        <p>
            <a href="index.php?action&bp=list" class="btn btn-primary">Page précédante</a>
        </p>
    </div>
    <div class="row">
            <p class="col-12"><?php echo nl2br(htmlspecialchars($blogPost->getContent())); ?></p>
            <span class="col-12">Articlé écrit par : <strong><?php echo htmlspecialchars($blogPost->getAuthor()); ?></strong></span>
            <span class="col-12">Dernière modification le : <strong><?php echo htmlspecialchars($blogPost->getUpdateTime()); ?></strong></span>
    </div>
</div>

<hr>
<?php

if (0 < count($comments)) {
    ?>
    <div class="container">
        <div class="table-responsive">
            <table class="table table-bordered table-sm">
                <thead class="thead-light">
                    <tr>
                        <th>Auteur</td>
                        <th>Commentaire</td>
                        <th>Date d'ajout</td>
                    </th>
                </thead>
                <tbody>
                <?php 
                foreach ($comments as $comment) 
                {
                    ?>
                        <tr>
                        <td><?php echo $comment->getAuthor(); ?></td>
                        <td><?php echo $comment->getContent(); ?></td>
                        <td><?php echo $comment->getInsertDate(); ?></td>
                    </tr>
                    <?php
                }
                ?>
                 </tbody>
            </table>
        </div>
    </div>

    <hr>
    <?php
} 
?>

<div class="container">

    <form method="POST" action="index.php?action&comments=new&id=<?php echo $blogPost->getId();?>" class="form">

        <div class="form-group ">
            <label for="commentary">Commentaire</label>
            <input type="text" name="commentary" class="form-control " id="commentary" />
        </div>

        <div class="form-group ">
            <label for="name">Nom</label>
            <input type="text" name="name" class="form-control " id="name" />
        </div>

        <div class="form-group ">
            <input type="hidden" name="redirection" class="form-control " value="<?php echo $blogPost->getId(); ?>" />
        </div>

        <div class="form-group ">
            <input type="submit" value="Ajouter" class="btn btn-outline-primary submit" />
        </div>

        </form>    
    
</div>





