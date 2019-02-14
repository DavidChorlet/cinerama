<?php

class users {

    public $id = 0;
    public $nickname = '';
    public $mail = '';
    public $password = '';
    private $db;

    public function __construct() {
        try {
            $this->db = new PDO('mysql:host=cinerama;dbname=cinedave;charset=utf8', 'chorlet', 'dddd');
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    //méthode permettant d'ajouter un patient dans la base de données.
    public function addUsers() {
        $query = 'INSERT INTO `cine_users` (`nickname`,`mail`, `password`) '
                . 'VALUES (:nickname, :mail, :password)';
        $queryResult = $this->db->prepare($query);
        $queryResult->bindValue(':nickname', $this->nickname, PDO::PARAM_STR);
        $queryResult->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        $queryResult->bindValue(':password', $this->password, PDO::PARAM_STR);
        return $queryResult->execute();
    }

    //méthode permettant de récuperer la liste des utilisateurs.
    public function getUsersList() {
        $result = array();
        $query = 'SELECT `id`, `nickname`,`mail` FROM `cine_users`';
        $queryResult = $this->db->query($query);
        if (is_object($queryResult)) {
            $result = $queryResult->fetchAll(PDO::FETCH_OBJ);
        }
        return $result;
    }

    //méthode permettant de récuperer le profil d'un utilisateur d'après son id.
    public function profileUser() {
        $return = FALSE;
        $isOk = FALSE;
        $query = 'SELECT `nickname`, `mail`,`password` FROM `cine_users` WHERE `id`= :id';
        $queryResult = $this->db->prepare($query);
        $queryResult->bindValue(':id', $this->id, PDO::PARAM_INT);
        //si la requête est bien executé, on rempli $return (array) avec un objet
        if ($queryResult->execute()) {
            $return = $queryResult->fetch(PDO::FETCH_OBJ);
        }
        //si $return est un objet alors on hydrate
        if (is_object($return)) {
            $this->nickname = $return->nickname;
            $this->mail = $return->mail;
            $this->password = $return->password;
            $isOk = TRUE;
        }
        return $isOk;
    }
    

    //méthode permettant de modifier le profil d'un utilisateur.
    public function profileUpdate() {
        $query = 'UPDATE `cine_users` SET `nickname`= :nickname,`mail`= :mail, `password` = :password WHERE `id`= :id';
        $queryResult = $this->db->prepare($query);
        $queryResult->bindValue(':nickname', $this->nickname, PDO::PARAM_STR);
        $queryResult->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        $queryResult->bindValue(':password', $this->password, PDO::PARAM_STR);
        $queryResult->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $queryResult->execute();
    }

    //méthode permettant de supprimer un utilisateur.
    public function deleteUser() {
        $query = 'DELETE FROM `cine_users` '
                . 'WHERE `id` = :id';
        $deleteUser = $this->db->prepare($query);
        //bindvalue = attribut la valeur
        $deleteUser->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $deleteUser->execute();
    }

}
