<?php
include '../models/posts.php';
include '../models/movies.php';
include '../controllers/movieUpdateCtrl.php';
include 'header.php';
?>
<div class="container-fluid">
    <div class="row">
        <div class="text-center col-12">
            <div class="hat">
                <h1>Fiche du film</h1>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Film</th>
                            <th scope="col">Réalisateur</th>
                            <th scope="col">Synopsis</th>
                        </tr>
                    </thead>
                    <?php if ($isMovie) { ?>
                        <tbody>
                            <tr>
                                <td><?= $movies->title ?></td>
                                <td><?= $movies->director ?></td>
                                <td><?= $movies->content ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            <?php } else { ?>
                <div>Le patient n'a pas été trouvé !</div>
            <?php } ?>
            <div class="hat">
                <h1>Modifier la fiche de ce film</h1>
            </div>
            <?php if ($isSuccess) { ?>
                <p class="text-success">Modifications enregistrées !</p>
                <?php
            }
            if ($isError) {
                ?>
                <p class="text-danger">Désolé, les modifications n'ont pu être enregistrées.</p>
            <?php } ?>
                <form method="POST" action="movieUpdate.php?id=<?= $movies->id ?>">
                <fieldset class="window">
                    <div class="form-group">
                        <div class="form-row">             
                            <label for="title" class="col-sm-2 col-form-label">Titre du film</label>
                            <div class="col-sm-10">
                                <input name="title" type="text" class="form-control" id="title" placeholder="Titre" value="<?= isset($title) ? $title : '' ?>"/>
                                <p class="text-danger"><?= isset($formError['title']) ? $formError['title'] : '' ?></p>
                            </div>
                        </div>
                        <div class="form-row">             
                            <label for="director" class="col-sm-2 col-form-label">Réalisateur</label>
                            <div class="col-sm-10">
                                <input name="director" type="text" class="form-control" id="director" placeholder="Réalisateur" value="<?= isset($director) ? $director : '' ?>"/>
                                <p class="text-danger"><?= isset($formError['director']) ? $formError['director'] : '' ?></p>
                            </div>
                        </div>
                        <div class="form-row">             
                            <label for="content" class="col-sm-2 col-form-label">Synopsis</label>
                            <div class="col-sm-10">
                                <textarea name="content" type="text" class="form-control" id="content" value="<?= isset($content) ? $content : '' ?>"></textarea>
                                <p class="text-danger"><?= isset($formError['content']) ? $formError['content'] : '' ?></p>
                            </div>
                        </div>
                        <input class="btn btn-black" type="submit" value="Valider" name='submit'/>
                    </div>
                </fieldset>
            </form>
            <?php include 'footer.php'; ?>