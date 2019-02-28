<?php

//Instanciation de l'objet users. 
//$users devient une instance de la classe users.
//La méthode magique construct est appelée automatiquement grâce au mot clé new.
$movies = new movies();


$isDelete = FALSE;
if (!empty($_GET['idDelete'])) {
    $movies->id = htmlspecialchars($_GET['idDelete']);
    $isDelete = $movies->deleteMovie();
    }
//on appelle la méthode grâce à $patients qui se trouve dans ma classe et qui me retourne un tableau stocké dans $patientsList
$moviesList = $movies->getMoviesList();




?>
