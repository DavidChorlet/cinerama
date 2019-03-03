<?php
include 'header.php';
include '../controllers/loginCtrl.php';
?>
<div class="container">
    <div class="row">
        <div class="text-center col-12" >
            <div class="hat">
                <h1>Se connecter</h1>
            </div>
            <form method="POST" action="#">
                <fieldset class="window">
                    <div class="form-group">
                        <label for="mail">Mail:</label>
                        <input type="mail" name="mail" class="form-control" id="mail"  placeholder="Renseignez votre mail" />
                        <div class="mailMessage"></div>
                    </div>
                    <div class="form-group">
                        <label for="password">Mot de passe:</label>
                        <input type="password" name="password" class="form-control" id="password"  placeholder="Renseignez votre mot de passe" />
                    </div>
                    <button type="submit" name="login" class="btn btn-dark">Se connecter</button>
                </fieldset>
            </form>
        </div>
    </div>
</div>
<?php
include 'footer.php';
?>    