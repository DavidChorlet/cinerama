<?php

//Instanciation de l'objet users. 
//$users devient une instance de la classe users.
//La méthode magique construct est appelée automatiquement grâce au mot clé new.
$users = new users();
//on appelle la méthode grâce à $patients qui se trouve dans ma classe et qui me retourne un tableau stocké dans $patientsList
$usersList = $users->getUsersList();




?>

