<?php

session_start();
$this->_title = 'Gérer les commentaires';
$this->_custom = 'custom-menu';

if (isset($_SESSION['name'])) {
    $this->_menu = true;
    ?>
    <div class="container">
        <div class="row">
    <?php
    $comments = $pendingComments->fetchAll();
    if (0 < count($comments)) {
        ?>
            <table class="table table-sm table-bordered">
                <thead>
                    <tr>
                        <th>Auteur</th>
                        <th>Commentaire</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
        <?php
        foreach ($comments as $comment) {
            ?>
                            <tr>
                                <td><?php echo htmlspecialchars($comment['author']); ?></td>
                                <td><?php echo htmlspecialchars($comment['content']); ?></td>
                                <td>
                                    <a href="index.php?action&comments=validate&id=<?php echo $comment['id']; ?>" class="btn btn-warning btn-sm">Valider</a>

                                    <a href="index.php?action&comments=delete&id=<?php echo $comment['id']; ?>" class="btn btn-danger btn-sm">Supprimer</a>
                                </td>
                                
                            </tr>
            <?php
        } ?>
                </tbody>
            </table>
        <?php
    } else {
        ?>
           <div class="alert alert-secondary">
                   <h3> Vous avez <strong>0</strong> commentaire.</h3>
           </div>
        <?php
    } ?>
        </div>
    </div>
    <?php

} else {
    $this->_menu = false;
    throw new Exception("L'access à cette page est reservé aux membres enregistrés");
}
