<?php

 /**
 * sert a supprimer un utilisateur
 */
if (isset($_POST['delete'])) {
    $deleteUser = new users();
    $deleteUser->id = $_SESSION['id'];

    if ($deleteUser->deleteUser()) {

        HEADER('location:index.php');
        session_destroy();
    }
}
