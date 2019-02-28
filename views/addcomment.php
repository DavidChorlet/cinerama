<?php
include '../models/comments.php';
include '../models/movies.php';
include '../models/pictures.php';
include '../models/posts.php';
include '../controllers/addcommentCtrl.php';
include 'header.php';
?>
<div class="container-fluid">
    <div class="row">
        <div class="text-center col-12" >
            <div class="hat">
                <h1>Ajouter un commentaire</h1>
            </div>
            <form method="POST" action="addcomment.php">
                <fieldset class="window">
                    <div class="form-group">
                        <div class="form-row">
                            <label for="id_cine_posts" class="col-sm-offset-2 col-sm-4 col-form-label">Choisir un article : </label>
                            <div class="col-sm-offset-2 col-sm-4">
                                <select name="id_cine_posts">
                                    <?php foreach ($postsList as $posts) { ?>
                                        <option value="<?= $posts->id ?>"><?= $posts->title . ' ' . $posts->content ?></option>
                                    <?php } ?>
                                </select>
                                <p class="text-danger"><?= isset($formError['$posts']) ? $formError['$posts'] : '' ?></p>
                            </div>
                        </div>
                        <div class="form-row">             
                            <label for="text" class="col-sm-2 col-form-label">Votre commentaire</label>
                            <div class="col-sm-10">
                                <textarea name="text" type="text" class="form-control" id="text" value="<?= isset($text) ? $text : '' ?>"></textarea>
                                <p class="text-danger"><?= isset($formError['text']) ? $formError['text'] : '' ?></p>
                            </div>
                        </div>
                        <div class="form-row">
                            <label for="date" class="col-sm-offset-2 col-sm-4 col-form-label">Date de votre commentaire </label>
                            <div class="col-sm-6">
                                <input name="date" type="date" class="form-control" id="date" placeholder="Date" value="<?= isset($date) ? $date : '' ?>"/>
                                <p class="text-danger"><?= isset($formError['date']) ? $formError['date'] : '' ?></p>
                            </div>
                        </div>
                        <div class="form-row">
                            <label for="hour" class="col-sm-offset-2 col-sm-4 col-form-label">Heure de votre commentaire </label>
                            <div class="col-sm-6">
                                <input name="hour" type="time" class="form-control" id="hour" placeholder="Heure" min="00:00" max="23:59" value="<?= isset($hour) ? $hour : '' ?>"/>
                                <p class="text-danger"><?= isset($formError['hour']) ? $formError['hour'] : '' ?></p>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-sm-12">
                                <input class="btn aqua-gradient" type="submit" value="Valider" name="submit"/>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</div>
<?php
include 'footer.php';
?>

