<?php
include 'header.php';
include '../models/comments.php';
include '../models/medias.php';
include '../models/posts.php';
include '../controllers/addMediaCtrl.php';
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
            <form method="POST" action="addMedia.php" enctype="multipart/form-data">
                <fieldset class="window">
                    <div class="input-group mb-3">
                        <label for="title" class="col-sm-2 col-form-label">Affiche</label>
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupFileAddon01">Affiche du film</span>
                        </div>
                        <div class="custom-file">
                            <input name="affiche" type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                            <label class="custom-file-label" for="inputGroupFile01">Choisir un fichier</label>
                        </div>
                    </div>
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
                        <div class="form-row">
                            <div class="col-sm-12">
                                <input class="btn btn-black" type="submit" value="Valider" name="submit"/>
                            </div>
                        </div>
                </fieldset>
            </form>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>
