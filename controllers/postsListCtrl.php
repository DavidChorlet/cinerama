<?php

//Instanciation de l'objet posts. 
//$posts devient une instance de la classe posts.
//La méthode magique construct est appelée automatiquement grâce au mot clé new.
$posts = new posts();
//On appelle la méthode grâce à $posts qui se trouve dans ma classe et qui me retourne un tableau stocké dans $postsList.
$postsList = $posts->getPostsList();
?>