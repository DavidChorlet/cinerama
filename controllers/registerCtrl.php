<?php

//déclaration des regex :
$nameRegex = "/([a-zA-Z\- ])/";

//création d'un tableau où l'on vient stocker les erreurs :
$formError = array();
$isSuccess = FALSE;
$isError = FALSE;

//si le submit existe
if (isset($_POST['submit'])) {
    //si $_POST['nickname'] existe
    if (isset($_POST['nickname'])) {
        //si $_POST['nickname'] n'est pas vide
        if (!empty($_POST['nickname'])) {
            //on vérifie si $_POST['nickname'] respecte la regex
            if (preg_match($nameRegex, $_POST['nickname'])) {
                $nickname = htmlspecialchars($_POST['nickname']);
                //sinon on stock un message dans le tableau formError    
            } else {
                $formError['nickname'] = 'Saisie invalide.';
            }
        } else {
            $formError['nickname'] = 'Erreur, veuillez remplir le champ.';
        }
    }


    if (isset($_POST['mail'])) {
        if (!empty($_POST['mail'])) {
            //emploi de la fonction PHP filter_var pour valider l'adresse mail
            if (filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
                $mail = htmlspecialchars($_POST['mail']);
            } else {
                $formError['mail'] = 'Saisie invalide.';
            }
        } else {
            $formError['mail'] = 'Erreur, veuillez remplir le champ.';
        }
    }
    if (isset($_POST['password'])) {
        if (!empty($_POST['password'])) {
            if (preg_match($nameRegex, $_POST['password'])) {
                $password = htmlspecialchars($_POST['password']);
            } else {
                $formError['password'] = 'Saisie invalide.';
            }
        } else {
            $formError['password'] = 'Erreur, veuillez remplir le champ.';
        }
    }
    //si mon tableau ne contient aucune erreur
    if (count($formError) == 0) {
        //Instanciation de l'objet users. 
        //$users devient une instance de la classe users
        //la méthode magique construct est appelée automatiquement grâce au mot clé new.
        $users = new users();
        $users->nickname = $nickname;
        $users->mail = $mail;
        $users->password = $password;

        if ($users->addUsers()) {
            $isSuccess = TRUE;
        } else {
            $isError = TRUE;
        }
    }
}
