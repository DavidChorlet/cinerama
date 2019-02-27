<?php
include 'header.php';
include '../models/movies.php';
include '../models/posts.php';
include '../controllers/postsListCtrl.php';
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
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Titre:</th>
                            <th scope="col">Contenu:</th>
                            <th scope="col">id film:</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($postsList as $posts) { ?>
                            <tr>
                                <td><?= $posts->title ?></td> 
                                <td><?= $posts->content ?></td>
                                <td><?= $posts->id_cine_movies ?></td>
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
