<?php

//Instanciation de l'objet medias. 
//$medias devient une instance de la classe medias.
//La méthode magique construct est appelée automatiquement grâce au mot clé new.
$medias = new medias();
//On appelle la méthode grâce à $medias qui se trouve dans ma classe et qui me retourne un tableau stocké dans $mediasList.
$mediasList = $medias->getmediasList();

?>