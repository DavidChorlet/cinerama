<?php

class pictures {

    public $id = 0;
    public $url = '';
    public $id_cine_posts = 0;
    private $db;

    public function __construct() {
        try {
            $this->db = new PDO('mysql:host=cinerama;dbname=cinedavid;charset=utf8', 'chorlet', 'dddd');
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
    //méthode permettant d'ajouter une image dans la base de données.
    public function addPictures() {
        $query = 'INSERT INTO `cine_pictures` (`url`,`id_cine_posts`) '
                . 'VALUES (:url, :id_cine_posts)';
        $queryResult = $this->db->prepare($query);
        $queryResult->bindValue(':url', $this->url, PDO::PARAM_STR);
        $queryResult->bindValue(':id_cine_posts', $this->id_cine_posts, PDO::PARAM_INT);
        return $queryResult->execute();
    }
    
    //méthode permettant de récuperer la liste des images.
    public function getPicturesList() {
        $result = array();
        $query = 'SELECT * FROM `cine_pictures`';
        $queryResult = $this->db->query($query);
        if (is_object($queryResult)) {
            $result = $queryResult->fetchAll(PDO::FETCH_OBJ);
        }
        return $result;
    }
    
    //méthode permettant de récuperer une image d'après son id.
    public function profilePicture() {
        $return = FALSE;
        $isOk = FALSE;
        $query = 'SELECT `url`, `id_cine_posts` FROM `cine_pictures` WHERE `id`= :id';
        $queryResult = $this->db->prepare($query);
        $queryResult->bindValue(':id', $this->id, PDO::PARAM_INT);
        //si la requête est bien executé, on rempli $return (array) avec un objet
        if ($queryResult->execute()) {
            $return = $queryResult->fetch(PDO::FETCH_OBJ);
        }
        //si $return est un objet alors on hydrate
        if (is_object($return)) {
            $this->url = $return->url;
            $this->id_cine_posts = $return->id_cine_posts;
            $isOk = TRUE;
        }
        return $isOk;
    }
    
    //méthode permettant de modifier une image.
    public function pictureUpdate() {
        $query = 'UPDATE `cine_pictures` SET `url`= :url, `id_cine_posts`= :id_cine_posts WHERE `cine_pictures`.`id`= :id';
        $queryResult = $this->db->prepare($query);
        $queryResult->bindValue(':url', $this->url, PDO::PARAM_STR);
        $queryResult->bindValue(':id_cine_posts', $this->id_cine_posts, PDO::PARAM_INT);
        return $queryResult->execute();
    }
    
     /**
     * Méthode qui permet à l'utilisateur de supprimer son image.
     */
    public function deletePicture() {
        $query = 'DELETE FROM `cine_pictures` WHERE `id` = :id';
        $deletePicture = $this->db->prepare($query);
        $deletePicture->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $deletePicture->execute();
      
}
}

