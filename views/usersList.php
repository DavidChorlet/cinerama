<?php
include 'header.php';
include '../controllers/usersListCtrl.php';
?>

<div class="row">
    <div class="text-center col-12">
        <div class="hat">
            <h1>Liste des utilisateurs</h1>
        </div>
    </div>
</div>
<?php
if (isset($resultList)) {
    ?>
    <?php
} else {
    ?>
    <div class="container">
         <div class="row">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Pseudo:</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($usersList as $users) { ?>
                            <tr>
                                <td><?= $users->nickname ?></td>                                         
                            </tr>
                        <?php } ?>                 
                    </tbody>
                </table>
            <?php }
            ?>
        </div>
    </div>
    </div>
<?php include 'footer.php';
?>