<?php

session_start();
$this->_title = 'Gérer les articles';
$this->_custom = 'custom-menu';

if (isset($_SESSION['name'])) {
    $this->_menu = true;
        ?>
    <!-- Main Content -->
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
    $this->_menu = false;
    throw new Exception("L'access à cette page est reservé aux membres enregistrés");
}