<?php
include '../models/movies.php';
include '../controllers/addmovieCtrl.php';
include 'header.php';
?>
<div class="container-fluid">
    <div class="row">
        <div class="text-center col-12" >
            <div class="hat">
                <h1>Ajouter un film</h1>
                <?php if ($isSuccess) { ?>
                    <p class="text-success">Enregistrement effectué !</p>
                    <?php
                }
                if ($isError) {
                    ?>
                    <p class="text-danger">Désolé, le film n'a pas pu être enregistré.</p>
                <?php } ?>
            </div>
            <form method="POST" action="addmovie.php">
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
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
