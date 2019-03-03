<?php
$isPost = FALSE;
$posts = new posts();
if (!empty($_GET['id'])) {
    $posts->id = htmlspecialchars($_GET['id']);
    $isPost = $posts->profilePost();
}

//déclaration des regex :
$nameRegex = "/([a-zA-Z\- ])/";
//création d'un tableau où l'on vient stocker les erreurs :
$formError = array();
$isSuccess = FALSE;
$isError = FALSE;

//si le submit existe
if (isset($_POST['submit'])) {
    //si $_POST['lastname'] existe
    if (isset($_POST['title'])) {
        //si $_POST['lastname'] n'est pas vide
        if (!empty($_POST['title'])) {
            //on vérifie si $_POST['lastname'] respecte la regex
            if (preg_match($nameRegex, $_POST['title'])) {
                $title = htmlspecialchars($_POST['title']);
            //sinon on stock un message dans le tableau formError    
            } else {
                $formError['title'] = 'Saisie invalide.';
            }
        } else {
            $formError['title'] = 'Erreur, veuillez remplir le champ.';
        }
    }
  
    if (isset($_POST['content'])) {
        if (!empty($_POST['content'])) {
            if (preg_match($nameRegex, $_POST['content'])) {
                $content = htmlspecialchars($_POST['content']);
            } else {
                $formError['content'] = 'Saisie invalide.';
            }
        } else {
            $formError['content'] = 'Erreur, veuillez remplir le champ.';
        }
    }
   
    
    //si mon tableau ne contient aucune erreur
    if (count($formError) == 0) {
        //Instanciation de l'objet patients. 
        //$patients devient une instance de la classe patients.
        //la méthode magique construct est appelée automatiquement grâce au mot clé new.
        
        $posts->title = $title;
        $posts->content = $content;
        $posts->postUpdate();
        
        if ($posts->postUpdate()) {
            $isSuccess = TRUE;
        } else {
            $isError = TRUE;
        }
    }
}