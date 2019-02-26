<?php

//Instanciation de l'objet users. 
//$users devient une instance de la classe users.
//La méthode magique construct est appelée automatiquement grâce au mot clé new.
$posts = new posts();
//on appelle la méthode grâce à $patients qui se trouve dans ma classe et qui me retourne un tableau stocké dans $patientsList
$postsList = $posts->getPostsList();


//if (isset($_GET['id'])) {
//    $deleteUser = NEW users();
//    $deleteUser->id = $_GET['id'];
//    $deleteUser = $deleteUser->deleteUser();
//    header('location:usersList.php');
//}


?>
