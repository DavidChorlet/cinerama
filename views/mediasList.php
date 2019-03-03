<?php
include 'header.php';
include '../models/posts.php';
include '../models/medias.php';
include '../controllers/mediasListCtrl.php';
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
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Oeuvre</th>
                            <th scope="col">Réalisateur/Auteur</th>
                            <th scope="col">Résumé</th>
                            <th scope="col">Image</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($mediasList as $medias) { ?>
                            <tr>
                                <td><?= $medias->title ?></td>
                                <td><?= $medias->director ?></td>
                                <td><?= $medias->content ?></td>
                                <td><img src="../assets/<?= $medias->picture ?>" alt="<?= $medias->title ?>" /></td>
                            </tr>
                        <?php } ?>                 
                    </tbody>
                </table>
            <?php }
            ?>
        </div>
    </div>
</div>
<?php include 'footer.php';
?>