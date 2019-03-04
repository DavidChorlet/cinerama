<?php
include 'header.php';
include '../models/comments.php';
include '../models/posts.php';
include '../models/medias.php';
include '../controllers/mediaUpdateCtrl.php';
?>
<div class="container-fluid">
    <div class="row">
        <div class="text-center col-12">
            <div class="hat">
                <h1>Fiche de l'oeuvre</h1>
            </div>
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
                    <?php if ($isMedia) { ?>
                        <tbody>
                            <tr>
                                <td><?= $medias->title ?></td>
                                <td><?= $medias->director ?></td>
                                <td><?= $medias->content ?></td>
                                <td><img src="../assets/<?= $medias->picture ?>" alt="<?= $medias->title ?>" /></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            <?php } else { ?>
                <div>La fiche n'a pas été trouvée...</div>
            <?php } ?>
            <div class="hat">
                <h1>Modifier la fiche de cette oeuvre</h1>
            </div>
            <?php if ($isSuccess) { ?>
                <p class="text-success">Modifications enregistrées !</p>
                <?php
            }
            if ($isError) {
                ?>
                <p class="text-danger">Désolé, mais vos modifications n'ont pu être enregistrées...</p>
            <?php } ?>
            <!--                Formulaire de mise à jour d'une oeuvre-->
            <form method="POST" action="mediaUpdate.php?id=<?= $medias->id ?>" enctype="multipart/form-data">
                <fieldset class="window">
                    <div class="form-group">
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
                        <div class="form-row">             
                            <label for="title" class="col-sm-2 col-form-label">Titre de l'oeuvre</label>
                            <div class="col-sm-10">
                                <input name="title" type="text" class="form-control" id="title" placeholder="Votre modification" value="<?= isset($title) ? $title : '' ?>"/>
                                <p class="text-danger"><?= isset($formError['title']) ? $formError['title'] : '' ?></p>
                            </div>
                        </div>
                        <div class="form-row">             
                            <label for="director" class="col-sm-2 col-form-label">Réalisateur/Auteur</label>
                            <div class="col-sm-10">
                                <input name="director" type="text" class="form-control" id="director" placeholder="Votre modification" value="<?= isset($director) ? $director : '' ?>"/>
                                <p class="text-danger"><?= isset($formError['director']) ? $formError['director'] : '' ?></p>
                            </div>
                        </div>
                        <div class="form-row">             
                            <label for="content" class="col-sm-2 col-form-label">Résumé modifié</label>
                            <div class="col-sm-10">
                                <textarea name="content" type="text" class="form-control" id="content" value="<?= isset($content) ? $content : '' ?>"></textarea>
                                <p class="text-danger"><?= isset($formError['content']) ? $formError['content'] : '' ?></p>
                            </div>
                        </div>
                        <input class="btn btn-black" type="submit" value="Valider votre contribution" name='submit'/>
                    </div>
                </fieldset>
            </form>
<?php include 'footer.php'; ?>