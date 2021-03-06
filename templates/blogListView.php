<?php
session_start();

$this->_title = "Liste d'articles";

// customize menu links

if (isset($_SESSION['name'])) {
    $this->_menu = true;
} else {
    $this->_menu = false;
}
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

<div class="container ">
    <div class="row justify-content-center">
        <div class="card-deck justify-content-center">

    <?php
    $startDiv = '<div class ="row justify-content-center">';
    $endDiv = '</div>';
    for ($i = 1; $bpCount = count($blogPosts), $i < $bpCount + 1; ++$i) {
        if (1 == $i || (0 == ($i - 1) % 3)) {
            echo $startDiv;
        } ?>

                 <div class="card text-center">
                     <div class="card-body">
                         <h3 class="card-title"><?php echo htmlspecialchars($blogPosts[$i]->getTitle()); ?></h3>
                         <span class="card-subtitle mb-2 text-muted"><?php echo htmlspecialchars($blogPosts[$i]->getUpdateTime()); ?></span>
                         <p class="card-text"><?php echo htmlspecialchars($blogPosts[$i]->getTopicSentence()); ?></p>
                         
                     </div>
                     <div class="card-footer">
                         <a class="btn btn-primary" href="index.php?action&bp=single&postId=<?php echo $blogPosts[$i]->getId(); ?>">Lire la suite</a>
                     </div>
                  </div>

        <?php
        if (0 == $i % 3) {
            echo $endDiv;
        }
    }
    ?>
      </div>
    </div>
</div> 

