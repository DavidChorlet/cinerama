<?php
include '../models/users.php';
include '../controllers/registerCtrl.php';
include 'header.php';
?>
<div class="container-fluid">
    <div class="row">
        <div class="text-center col-12" >
            <div class="hat">
                <h1>Rejoindre le Crew</h1>
                <?php if ($isSuccess) { ?>
                    <p class="text-success">Enregistrement effectué !</p>
                    <?php
                }
                if ($isError) {
                    ?>
                    <p class="text-danger">Désolé, mais votre enregistrement a échoué.</p>
                <?php } ?>
            </div>
            <form method="POST" action="register.php">
                <fieldset class="window">
                    <div class="form-group">
                        <div class="form-row">             
                            <label for="nickname" class="col-sm-2 col-form-label">Pseudo:</label>
                            <div class="col-sm-10">
                                <input name="nickname" type="text" class="form-control" id="nickname" placeholder="Pseudo" value="<?= isset($nickname) ? $nickname : '' ?>"/>
                                <p class="text-danger"><?= isset($formError['nickname']) ? $formError['nickname'] : '' ?></p>
                            </div>
                        </div>
                        <div class="form-row">             
                            <label for="mail" class="col-sm-2 col-form-label">Adresse mail :</label>
                            <div class="col-sm-10">
                                <input name="mail" type="email" class="form-control" id="mail" placeholder="E-mail" value="<?= isset($mail) ? $mail : '' ?>"/>
                                <p class="text-danger"><?= isset($formError['mail']) ? $formError['mail'] : '' ?></p>
                            </div>
                        </div>                     
                        <div class="form-row">             
                            <label for="password" class="col-sm-2 col-form-label">Mot de passe :</label>
                            <div class="col-sm-10">
                                <input name="password" type="password" class="form-control" id="password" placeholder="Mot de passe" value="<?= isset($password) ? $password : '' ?>"/>
                                <p class="text-danger"><?= isset($formError['$password']) ? $formError['$password'] : '' ?></p>
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

