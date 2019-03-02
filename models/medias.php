<?php

class medias {

    public $id = 0;
    public $title = '';
    public $director = '';
    public $content = '';
    private $db;

    public function __construct() {
        try {
            $this->db = new PDO('mysql:host=cinerama;dbname=cinedavid;charset=utf8', 'chorlet', 'dddd');
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    //méthode permettant d'ajouter un film dans la base de données.
    public function addMedias() {
        $query = 'INSERT INTO `cine_medias` (`title`,`director`, `content`) '
                . 'VALUES (:title, :director, :content)';
        $queryResult = $this->db->prepare($query);
        $queryResult->bindValue(':title', $this->title, PDO::PARAM_STR);
        $queryResult->bindValue(':director', $this->director, PDO::PARAM_STR);
        $queryResult->bindValue(':content', $this->content, PDO::PARAM_STR);
        return $queryResult->execute();
    }

    //méthode permettant de récuperer la liste des films.
    public function getmediasList() {
        $result = array();
        $query = 'SELECT * FROM `cine_medias`';
        $queryResult = $this->db->query($query);
        if (is_object($queryResult)) {
            $result = $queryResult->fetchAll(PDO::FETCH_OBJ);
        }
        return $result;
    }
    
    //méthode permettant de récuperer un film d'après son id.
    public function profileMedia() {
        $return = FALSE;
        $isOk = FALSE;
        $query = 'SELECT `title`, `director`, `content` FROM `cine_medias` WHERE `id`= :id';
        $queryResult = $this->db->prepare($query);
        $queryResult->bindValue(':id', $this->id, PDO::PARAM_INT);
        //si la requête est bien executé, on rempli $return (array) avec un objet
        if ($queryResult->execute()) {
            $return = $queryResult->fetch(PDO::FETCH_OBJ);
        }
        //si $return est un objet alors on hydrate
        if (is_object($return)) {
            $this->title = $return->title;
            $this->director = $return->director;
            $this->content = $return->content;
            $isOk = TRUE;
        }
        return $isOk;
    }
    

    //méthode permettant de modifier la fiche d'un film.
    public function mediaUpdate() {
        $query = 'UPDATE `cine_medias` SET `title`= :title, `director`= :director, `content`= :content WHERE `cine_medias`.`id`= :id';
        $queryResult = $this->db->prepare($query);
        $queryResult->bindValue(':title', $this->title, PDO::PARAM_STR);
        $queryResult->bindValue(':director', $this->director, PDO::PARAM_STR);
        $queryResult->bindValue(':content', $this->content, PDO::PARAM_STR);
        $queryResult->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $queryResult->execute();
    }
    
    /**
     * Méthode qui permet à l'utilisateur de supprimer une fiche
     */
    public function deleteMedia() {
        $query = 'DELETE FROM `cine_medias` WHERE `cine_medias`.`id` = :id';
        $deletemedia = $this->db->prepare($query);
        $deletemedia->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $deletemedia->execute();
      }
    
}
