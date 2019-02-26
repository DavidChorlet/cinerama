<?php

class posts {

    public $id = 0;
    public $title = '';
    public $content = '';
    public $id_cine_users = 0;
    public $id_cine_movies = 0;
    private $db;

    public function __construct() {
        try {
            $this->db = new PDO('mysql:host=cinerama;dbname=cinedavid;charset=utf8', 'chorlet', 'dddd');
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
    
    //méthode permettant d'ajouter un article dans la base de données.
    public function addPosts() {
        $query = 'INSERT INTO `cine_posts` (`title`,`content`,`id_cine_users`, `id_cine_movies`) '
                . 'VALUES (:title, :content, :id_cine_users, :id_cine_movies)';
        $queryResult = $this->db->prepare($query);
        $queryResult->bindValue(':title', $this->title, PDO::PARAM_STR);
        $queryResult->bindValue(':content', $this->content, PDO::PARAM_STR);
        $queryResult->bindValue(':id_cine_users', $this->id_cine_users, PDO::PARAM_INT);
        $queryResult->bindValue(':id_cine_movies', $this->id_cine_movies, PDO::PARAM_INT);
        return $queryResult->execute();
    }
    
    //méthode permettant de récuperer la liste des articles.
    public function getPostsList() {
        $result = array();
        $query = 'SELECT * FROM `cine_posts`';
        $queryResult = $this->db->query($query);
        if (is_object($queryResult)) {
            $result = $queryResult->fetchAll(PDO::FETCH_OBJ);
        }
        return $result;
    }
    
//    //méthode permettant de modifier un article.
//    public function postUpdate() {
//        $query = 'UPDATE `cine_posts` SET ``= :, ``= :, ``= : WHERE `cine_posts`.`id`= :id';
//        $queryResult = $this->db->prepare($query);
//        $queryResult->bindValue(':', $this->, PDO::PARAM_STR);
//        $queryResult->bindValue(':', $this->, PDO::PARAM_STR);
//        $queryResult->bindValue(':', $this->, PDO::PARAM_STR);
//        $queryResult->bindValue(':', $this->, PDO::PARAM_INT);
//        return $queryResult->execute();
//    }
    
//     /**
//     * Méthode qui permet à l'utilisateur de supprimer son article.
//     */
//    public function deletePost() {
//        $query = 'DELETE FROM `cine_posts` WHERE `id` = :id';
//        $deletePost = $this->db->prepare($query);
//        $deletePost->bindValue(':id', $this->id, PDO::PARAM_INT);
//        return $deletePost->execute();
//      }
                          
}
