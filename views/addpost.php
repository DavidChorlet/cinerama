<?php
include 'header.php';
include '../models/comments.php';
include '../models/medias.php';
include '../models/posts.php';
include '../controllers/addpostCtrl.php';
?>
<div class="container-fluid">
    <div class="row">
        <div class="text-center col-12" >
            <div class="hat">
                <h1>Ajouter un article</h1>
                <?php if ($isSuccess) { ?>
                    <p class="text-success">Enregistrement effectué !</p>
                    <?php
                }
                if ($isError) {
                    ?>
                    <p class="text-danger">Désolé, mais votre article n'a pas pu être enregistré...</p>
                <?php } ?>
            </div>
            <form method="POST" action="addpost.php" enctype="multipart/form-data">
                <fieldset class="window">
                    <div class="input-group mb-3">
                        <label for="title" class="col-sm-2 col-form-label">Affiche/Couverture</label>
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupFileAddon01">Image illustrative</span>
                        </div>
                        <div class="custom-file">
                            <input name="affiche" type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                            <label class="custom-file-label" for="inputGroupFile01">Choisir un fichier d'illustration</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-row">             
                            <label for="title" class="col-sm-2 col-form-label">Titre de votre article</label>
                            <div class="col-sm-10">
                                <input name="title" type="text" class="form-control" id="title" placeholder="Titre" value="<?= isset($title) ? $title : '' ?>"/>
                                <p class="text-danger"><?= isset($formError['title']) ? $formError['title'] : '' ?></p>
                            </div>
                        </div>
                        <div class="form-row">             
                            <label for="content" class="col-sm-2 col-form-label">Votre texte</label>
                            <div class="col-sm-10">
                                <textarea name="content" type="text" class="form-control" id="content" value="<?= isset($content) ? $content : '' ?>"></textarea>
                                <p class="text-danger"><?= isset($formError['content']) ? $formError['content'] : '' ?></p>
                            </div>
                        </div>
                        <div class="form-row">
                            <label for="id_cine_medias" class="col-sm-offset-2 col-sm-4 col-form-label">Choisir une oeuvre à analyser: </label>
                            <div class="col-sm-offset-2 col-sm-4">
                                <select name="id_cine_medias">
                                    <?php foreach ($mediasList as $medias) { ?>
                                        <option value="<?= $medias->id ?>"><?= $medias->title . ' ' . $medias->director ?></option>
                                    <?php } ?>
                                </select>
                                <p class="text-danger"><?= isset($formError['id_cine_medias']) ? $formError['id_cine_medias'] : '' ?></p>
                            </div>
                        </div>
                        <input class="btn btn-black" type="submit" value="Valider votre contribution" name='submit'/>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>