<?php

if (isset($_POST['mailTest'])) { //Appel AJAX pour le mail.
    include '../models/users.php';
    $user = new users();
    $user->mail = htmlspecialchars($_POST['mailTest']);
    echo $user->checkFreeMail();
} else { //Validation du formulaire


    $user = new users();
//J'initialise mon tableau d'erreur.
    $formError = array();
//On initialise les variables de stockage des informations pour éviter d'avoir des erreurs dans la vue.
    $nickname = '';
    $mail = '';

//Quand on s'enregistre
    if (isset($_POST['register'])) {
        //On vérifie que le pseudo n'est pas vide.
        if (!empty($_POST['nickname'])) {
            $nickname = htmlspecialchars($_POST['nickname']);
        } else {
            $formError['nickname'] = 'Veuillez renseigner un pseudo';
        }
        //On vérifie que l'adresse mail est renseigné, qu'il correspond à la confirmation et qu'il a la bonne forme.
        if (!empty($_POST['mail']) && !empty($_POST['mailVerify'])) {
            if ($_POST['mail'] == $_POST['mailVerify']) {
                if (filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
                    $mail = htmlspecialchars($_POST['mail']);
                } else {
                    $formError['mail'] = 'Le courriel n\'est pas valide';
                }
            } else {
                $formError['mail'] = 'Les courriels ne sont pas identiques';
            }
        } else {
            $formError['mail'] = 'Veuillez renseigner un courriel';
            $formError['mailVerify'] = 'Veuillez confirmer le courriel';
        }
        //On vérifie que le mot de passe est renseigné et qu'il est identique à la confirmation. On le hash avant de le mettre en base de données. 
        if (!empty($_POST['password']) && !empty($_POST['passwordVerify'])) {
            if ($_POST['password'] == $_POST['passwordVerify']) {
                $user->password = password_hash($_POST['password'], PASSWORD_BCRYPT);
            } else {
                $formError['password'] = 'Les mots de passe ne sont pas identiques';
            }
        } else {
            $formError['password'] = 'Veuillez renseigner un mot de passe';
            $formError['passwordVerify'] = 'Veuillez confirmer le mot de passe';
        }
        //Si il n'y a pas d'erreur, j'enregistre l'utilisateur
        if (count($formError) == 0) {
            $user->mail = $mail;
            $user->nickname = $nickname;
            $user->addUsers();
        }
    }
}