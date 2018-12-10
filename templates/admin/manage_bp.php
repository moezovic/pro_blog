<?php

session_start();
$this->title = 'Gérer les articles';
$this->custom = 'custom-menu';

if (isset($_SESSION['name'])) {
    $this->menu = true;
} else {
    $this->menu = false;
}

if (isset($_SESSION['name'])) {
    ?>

    <div class="container">

        <div class="row">
            <table class="table table-sm table-bordered ">
                <thead>
                    <tr>
                        <th>Titre</th>
                        <th>Auteur</th>
                        <th>Dernière mise à jour</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($blogPosts as $blogPost) {
                        ?>
                            <tr>
                                <td><?php echo htmlspecialchars($blogPost->getTitle()); ?></td>
                                <td><?php echo htmlspecialchars($blogPost->getAuthor()); ?></td>
                                <td><?php echo htmlspecialchars($blogPost->getUpdateTime()); ?></td>
                                <td>
                                    <a href="index.php?action&access=connected&admin=edit&id=<?php echo $blogPost->getId(); ?>" class="btn btn-warning btn-sm">Modifier</a>

                                    <a href="index.php?action&bp=delete&id=<?php echo $blogPost->getId(); ?>" class="btn btn-danger btn-sm">Supprimer</a>
                                </td>
                                
                            </tr>
                        <?php
                    } ?>
                </tbody>
            </table>
        </div>
        
    </div>


    <?php
} else {
                        throw new Exception("L'access à cette page est reservé aux membres enregistrés");
                    }
