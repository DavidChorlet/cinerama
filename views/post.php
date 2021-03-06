<?php
include 'header.php';
include '../models/posts.php';
include '../models/medias.php';
include '../controllers/postCtrl.php';
?>
<?php
if (isset($_GET['idDelete'])) {
    if ($isDelete) {
        ?>
        <p> Suppression réussie! </p><?php
    } else {
        ?>
        <p class="text-danger">Echec de la suppression...</p>
        <?php
    }
}
?>
<div class="row">
    <div class="text-center col-12">
        <div class="hat">
            <h1>Liste des articles</h1>
        </div>
    </div>
</div>
<?php
if (isset($resultList)) {
    ?>
    <?php
} else {
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <table class="table-responsive">
                    <thead>
                        <tr>
                            <th scope="col">Titre</th>
                            <th scope="col">Contenu</th>
                            <th scope="col">Modification</th>
                            <th scope="col">Suppression</th>
                        </tr>
                    </thead>
                    <tbody>
<!--                        Boucle foreach pour parcourir la liste des articles-->
                        <?php foreach ($postsList as $posts) { ?>
                            <tr>
                                <td><?= $posts->title ?></td>
                                <td><?= $posts->content ?></td>
                                <td><a class="btn blue-gradient btn-lg btn-block" href="postUpdate.php?id=<?= $posts->id ?>">Modification</a></td>
                                <td><a class="btn blue-gradient-rgba btn-lg btn-block" href="post.php?idDelete=<?= $posts->id ?>">Suppression</a></td>
                            </tr>
                        <?php } ?>                 
                    </tbody>
                </table>
            <?php }
            ?>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>