<?php
include 'header.php';
include '../controllers/profileCtrl.php';
?>
<div class="container-fluid">
    <div class="row">
        <div class="text-center col-12">
            <div class="hat">
                <h1>Votre Profil</h1>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Pseudo</th>
                            <th scope="col">Adresse Mail</th>
                            <th scope="col">Mot de passe</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?= $_SESSION['nickname']; ?></td>
                            <td><?= $_SESSION['mail']; ?></td>
                            <td><?= $_SESSION['password']; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="hat">
    <h1>Modifier votre profil</h1>
</div>
<?php if ($isSuccess) { ?>
    <p class="text-success">Modifications enregistrées !</p>
    <?php
}
if ($isError) {
    ?>
    <p class="text-danger">Désolé, les modifications n'ont pu être enregistrées.</p>
<?php } ?>
<form method="POST" action="profile.php?id=<?= $users->id ?>">
    <fieldset class="window">
        <div class="form-group">
            <div class="form-row">             
                <label for="nickname" class="col-sm-2 col-form-label">Pseudo:</label>
                <div class="col-sm-10">
                    <input name="nickname" type="text" class="form-control" id="nickname" placeholder="<?= $_SESSION['nickname']; ?>" value="<?= $_SESSION['nickname']; ?>"/>
                    <p class="text-danger"><?= isset($formError['nickname']) ? $formError['nickname'] : '' ?></p>
                </div>
            </div>
            <div class="form-row">             
                <label for="mail" class="col-sm-2 col-form-label">Adresse mail :</label>
                <div class="col-sm-10">
                    <input name="mail" type="email" class="form-control" id="mail" placeholder="<?= $_SESSION['mail']; ?>" value="<?= $_SESSION['mail']; ?>"/>
                    <p class="text-danger"><?= isset($formError['mail']) ? $formError['mail'] : '' ?></p>
                </div>
            </div>
            <div class="form-row">             
                <label for="password" class="col-sm-2 col-form-label">Mot de passe :</label>
                <div class="col-sm-10">
                    <input name="password" type="password" class="form-control" id="password" placeholder="<?= $_SESSION['password']; ?>" value="<?= $_SESSION['password']; ?>"/>
                    <p class="text-danger"><?= isset($formError['password']) ? $formError['password'] : '' ?></p>
                </div>
            </div>       
            <input class="btn btn-black" type="submit" value="Valider" name='submit'/>
        </div>
    </fieldset>
</form>
    
    <p>Si vous êtes sûr de vouloir supprimer votre compte, cliquer sur le bouton ci-dessous.</p>
    <form method="POST" action="delete.php">
        <button type="submit" name="delete" class="btn red" id="delete">SUPPRIMER MON COMPTE</button>
    </form>
    
    
    <div class="hat">
        <div><a href="?action=deconnexion">Déconnexion</a></div>
    </div>
<?php
include 'footer.php';
?>