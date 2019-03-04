<?php
include 'header.php';
include '../models/medias.php';
include '../models/posts.php';
include '../controllers/mediaCtrl.php';
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
            <h1>Liste des oeuvres</h1>
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
                            <th scope="col">Oeuvre</th>
                            <th scope="col">Real/Auteur</th>
                            <th scope="col">Résumé</th>
                            <th scope="col">Modification</th>
                            <th scope="col">Suppression</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($mediasList as $medias) { ?>
                            <tr>
                                <td><?= $medias->title ?></td>
                                <td><?= $medias->director ?></td>
                                <td><?= $medias->content ?></td>
                                <td><a class="btn blue-gradient btn-lg btn-block" href="mediaUpdate.php?id=<?= $medias->id ?>">Modification</a></td>
                                <td><a class="btn blue-gradient-rgba btn-lg btn-block" href="media.php?idDelete=<?= $medias->id ?>">Suppression</a></td>
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