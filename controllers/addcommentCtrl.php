<?php

$comments = new comments();
$posts = new posts();
$postsList = $posts->getPostsList();

//déclaration des regex :
$nameRegex = '/([a-zA-Z\- ])/';
$dateRegex = '/[0-9]{4}-[0-9]{2}-[0-9]{2}/';
$hourRegex = '/(0[0-9]|1[0-9]|2[0-3]):[0-5][0-9]$/';

//création d'un tableau où l'on vient stocker les erreurs :
$formError = array();
$isSuccess = FALSE;
$isError = FALSE;

//si le submit existe
if (isset($_POST['submit'])) {

    if (isset($_POST['id_cine_posts'])) {
        if (!empty($_POST['id_cine_posts'])) {
            $id_cine_posts = htmlspecialchars($_POST['id_cine_posts']);
        } else {
            $formError['id_cine_posts'] = 'Erreur, veuillez sélectionnez une console.';
        }
    }
    
    if (isset($_POST['text'])) {
        if (!empty($_POST['text'])) {
            if (preg_match($nameRegex, $_POST['text'])) {
                $text = htmlspecialchars($_POST['text']);
            } else {
                $formError['text'] = 'Texte invalide.';
            }
        } else {
            $formError['text'] = 'Erreur, veuillez compléter ce champ.';
        }
    }
    
    if (isset($_POST['date'])) {
        if (!empty($_POST['date'])) {
            if (preg_match($dateRegex, $_POST['date'])) {
                $date = htmlspecialchars($_POST['date']);
            } else {
                $formError['date'] = 'Date invalide.';
            }
        } else {
            $formError['date'] = 'Erreur, veuillez sélectionnez une date.';
        }
    }
    if (isset($_POST['hour'])) {
        if (!empty($_POST['hour'])) {
            if (preg_match($hourRegex, $_POST['hour'])) {
                $hour = htmlspecialchars($_POST['hour']);
            } else {
                $formError['hour'] = 'Heure invalide.';
            }
        } else {
            $formError['hour'] = 'Erreur, veuillez sélectionnez une heure.';
        }
    }
     if (isset($_POST['id_cine_users'])) {
        if (!empty($_POST['id_cine_users'])) {
            $id_cine_users = htmlspecialchars($_SESSION['id_cine_users']);
        } else {
            $formError['id_cine_users'] = 'Erreur, veuillez sélectionnez une console.';
        }
    }
     
    if (count($formError) == 0) {
        $comments = new comments();
        $comments->text = $text;
        $comments->addDate = $date . ' ' . $hour;
        $comments->id_cine_posts = $id_cine_posts;
        $comments->id_cine_users= $id_cine_users;

        if ($comments->addComments()) {
            $isSuccess = TRUE;
        } else {
            $isError = TRUE;
        }
    }
}