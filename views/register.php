<?php
include 'header.php';
include '../controllers/registerCtrl.php';
?>
<div class="container">
    <div class="row">
        <div class="text-center col-12" >
            <div class="hat">
                <h1>Inscription</h1></div>
            <form method="POST" action="#" enctype="multipart/form-data">
                <fieldset class="window">
                    <div class="form-group">
                        <label for="mail">Mail</label>
                        <input type="mail" name="mail" class="form-control" id="mail"  placeholder="Renseignez votre adresse mail" />
                        <div class="mailMessage"></div>
                    </div>
                    <div class="form-group">
                        <label for="mailVerify">Mail (confirmation)</label>
                        <input type="mail" name="mailVerify" class="form-control" id="mailVerify"  placeholder="Confirmez votre adresse mail" />
                    </div>
                    <div class="form-group">
                        <label for="nickname">Pseudo</label>
                        <input type="text" name="nickname" class="form-control" id="nickname"  placeholder="Renseignez votre pseudo" />
                    </div>
                    <div class="form-group">
                        <label for="password">Mot de passe</label>
                        <input type="password" name="password" class="form-control" id="password"  placeholder="Renseignez votre mot de passe" />
                    </div>
                    <div class="form-group">
                        <label for="passwordVerify">Mot de passe (confirmation)</label>
                        <input type="password" name="passwordVerify" class="form-control" id="passwordVerify"  placeholder="Confirmez votre mot de passe" />
                    </div>
                    <button type="submit" name="register" class="btn btn-dark">S'enregistrer</button>
                </fieldset>
            </form>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="text-center col-12" >
            <form method="post" action="picture.php" enctype="multipart/form-data">
                <fieldset class="window">
                    <p>Formulaire d'envoi de fichier</p>
                    <input type="file" name="file" />
                    <input type="submit" class="btn btn-dark" value="Envoyer une image pour avatar" />
                </fieldset>
            </form>
        </div>
    </div>
</div> 
<script src="assets/js/script.js" type="text/javascript"></script>
<?php include 'footer.php'; ?>

