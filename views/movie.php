<?php
include '../models/movies.php';
include '../controllers/movieCtrl.php';
include 'header.php';
?>
<?php
if (isset($_GET['idDelete'])) {
    if ($isDelete) {
        ?>
        <p> Suppression réussie! </p><?php
    } else {
        ?>
        <p class="text-danger">Echec de la suppression !</p>
        <?php
    }
}
?>
<div class="row">
    <div class="text-center col-12">
        <div class="hat">
            <h1>Liste des films</h1>
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
                            <th scope="col">Film</th>
                            <th scope="col">Réalisateur</th>
                            <th scope="col">Synopsis</th>
                            <th scope="col">Modifier cette fiche</th>
                            <th scope="col">Supprimer cette fiche</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($moviesList as $movies) { ?>
                            <tr>
                                <td><?= $movies->title ?></td>
                                <td><?= $movies->director ?></td>
                                <td><?= $movies->content ?></td>
                                <td><a class="btn blue-gradient btn-lg btn-block" href="movieUpdate.php?id=<?= $movies->id ?>">Modification</a></td>
                                <td><a class="btn blue-gradient-rgba btn-lg btn-block" href="movie.php?idDelete=<?= $movies->id ?>">Supprimer cette fiche</a></td>
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

