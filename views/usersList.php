<?php
include '../models/users.php';
include '../controllers/usersListCtrl.php';
include 'header.php';
?>
<div class="container-fluid">
    <div class="row">
        <div class="text-center col-12">
            <div class="hat">
                <h1>Liste des utilisateurs</h1>
            </div>
            <div class="hat"><a class="linky" href="register.php"><strong>Cliquez ici si vous souhaitez rejoindre le casting</strong></a></div>
            <?php
            if (isset($resultList)) {
                ?>
                <div class="container-fluid">
                    <div class="row">
                        <div class="text-center col-12">
                            <div class="table-responsive">
                                <?php
                            } else {
                                ?>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Pseudo</th>
                                            <th scope="col">Adresse mail</th>
                                            <th scope="col">Détails</th>
                                            <th scope="col">Supprimer cet utilisateur</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($usersList as $users) { ?>
                                            <tr>
                                                <td><?= $users->nickname ?></td>
                                                <td><?= $users->mail ?></td>
                                                <td><a class="btn blue-gradient-rgba btn-lg btn-block" href="profile.php?id=<?= $users->id ?>">Détails concernant cet utilisateur</a></td>
                                                <td><a class="btn blue-gradient-rgba btn-lg btn-block" href="usersList.php?id=<?= $users->id ?>">Supprimer cet utilisateur</a></td>
                                            </tr>
                                        <?php } ?>                 
                                    </tbody>
                                </table>
                            <?php }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php';
?>