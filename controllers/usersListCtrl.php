<?php

//Instanciation de l'objet patients. 
//$patients devient une instance de la classe patients.
//La méthode magique construct est appelée automatiquement grâce au mot clé new.
$users = new users();
//on appelle la méthode grâce à $patients qui se trouve dans ma classe et qui me retourne un tableau stocké dans $patientsList
$usersList = $users->getUsersList();


if (isset($_GET['id'])) {
    $deleteUser = NEW users();
    $deleteUser->id = $_GET['id'];
    $deleteUser = $deleteUser->deleteUser();
    header('location:usersList.php');
}

if (!empty($_POST['search'])) {

    $resultList = $users->searchUser(htmlspecialchars($_POST['search']));

    if (count($resultList) == 0) {
        $noMatch = true;
        $noMatchMessage = 'Nous ne trouvons aucune correspondance pour : ' . $_POST['search'];
    }
}
?>

