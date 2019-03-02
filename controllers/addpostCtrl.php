<?php

$posts = new posts();
$medias = new medias();
$mediasList = $medias->getmediasList();


//déclaration des regex :
$nameRegex = '/([a-zA-Z\- ])/';

//création d'un tableau où l'on vient stocker les erreurs :
$formError = array();
$isSuccess = FALSE;
$isError = FALSE;

//si le submit existe
if (isset($_POST['submit'])) {

    if (isset($_POST['title'])) {
        if (!empty($_POST['title'])) {
            if (preg_match($nameRegex, $_POST['title'])) {
                $title = htmlspecialchars($_POST['title']);
            } else {
                $formError['title'] = 'Date invalide.';
            }
        } else {
            $formError['title'] = 'Erreur, veuillez sélectionnez une date.';
        }
    }

    if (isset($_POST['content'])) {
        if (!empty($_POST['content'])) {
            if (preg_match($nameRegex, $_POST['content'])) {
                $content = htmlspecialchars($_POST['content']);
            } else {
                $formError['content'] = 'Heure invalide.';
            }
        } else {
            $formError['content'] = 'Erreur, veuillez sélectionnez une heure.';
        }
    }

    if (isset($_POST['id_cine_medias'])) {
        if (!empty($_POST['id_cine_medias'])) {
            $id_cine_medias = htmlspecialchars($_POST['id_cine_medias']);
        } else {
            $formError['id_cine_medias'] = 'Erreur, veuillez sélectionnez une console.';
        }
    }



    //si mon tableau ne contient aucune erreur
    if (count($formError) == 0) {
        //Instanciation de l'objet patients. 
        //$patients devient une instance de la classe patients.
        //la méthode magique construct est appelée automatiquement grâce au mot clé new.
       $posts = new posts();
        $posts->title = $title;
        $posts->content = $content;
        $posts->id_cine_medias = $id_cine_medias;




        if ($posts->addPosts()) {
            $isSuccess = TRUE;
        } else {
            $isError = TRUE;
        }
    }
}
    


