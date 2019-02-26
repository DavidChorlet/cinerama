<?php
include 'header.php';
include '../models/movies.php';
include '../controllers/moviesListCtrl.php';
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
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($moviesList as $movies) { ?>
                            <tr>
                                <td><?= $movies->title ?></td>
                                <td><?= $movies->director ?></td>
                                <td><?= $movies->content ?></td>
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
























