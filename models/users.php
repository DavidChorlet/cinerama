<?php

class users {

    public $id = 0;
    public $nickname = '';
    public $mail = '';
    public $password = '';
    public $idGroup = 2; //2 est le membre
    private $db;

    public function __construct() {
        try {
            $this->db = new PDO('mysql:host=cinerama;dbname=cinedave;charset=utf8', 'chorlet', 'dddd');
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    //méthode permettant d'ajouter un utilisateur dans la base de données.
    public function addUsers() {
        $query = 'INSERT INTO `cine_users` (`nickname`,`mail`, `password`) '
                . 'VALUES (:nickname, :mail, :password)';
        $queryResult = $this->db->prepare($query);
        $queryResult->bindValue(':nickname', $this->nickname, PDO::PARAM_STR);
        $queryResult->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        $queryResult->bindValue(':password', $this->password, PDO::PARAM_STR);
        return $queryResult->execute();
    }

    /**
     * Méthode qui vérifie si une adresse mail est libre. 
     * 0 : L'adresse mail n'existe pas
     * 1 : Elle existe
     * @return type
     */
    function checkFreeMail() {
        $query = 'SELECT COUNT(*) AS `nbMail` FROM `cine_users` WHERE `mail` = :mail';
        $result = $this->db->prepare($query);
        $result->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        $result->execute();
        $checkFreeMail = $result->fetch(PDO::FETCH_OBJ);
        return $checkFreeMail->nbMail;
    }

    /**
     * Méthode qui retourne le hashage du mot de passe du compte sélectionné.
     * @return type
     */
    function getHashFromUser() {
        $query = 'SELECT `password` FROM `cine_users` WHERE `mail` = :mail';
        $result = $this->db->prepare($query);
        $result->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        $result->execute();
        return $result->fetch(PDO::FETCH_OBJ);
    }

    /**
     * Méthode qui récupère les infos utiles de l'utilisateur après sa connection
     * @return type
     */
    function getUserInfo() {
        $query = 'SELECT * FROM `cine_users` WHERE `mail` = :mail';
        $result = $this->db->prepare($query);
        $result->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        $result->execute();
        return $result->fetch(PDO::FETCH_OBJ);
    }

    //méthode permettant de récuperer la liste des utilisateurs.
    public function getUsersList() {
        $result = array();
        $query = 'SELECT `nickname` FROM `cine_users`';
        $queryResult = $this->db->query($query);
        if (is_object($queryResult)) {
            $result = $queryResult->fetchAll(PDO::FETCH_OBJ);
        }
        return $result;
    }

//méthode permettant de modifier le profil d'un utilisateur.
    public function profileUpdate() {
        $query = 'UPDATE `cine_users` SET `nickname`= :nickname, `mail`= :mail, `password`= :password WHERE `cine_users`.`id`= :id';
        $queryResult = $this->db->prepare($query);
        $queryResult->bindValue(':nickname', $this->nickname, PDO::PARAM_STR);
        $queryResult->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        $queryResult->bindValue(':password', $this->password, PDO::PARAM_STR);
        $queryResult->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $queryResult->execute();
    }

    /**
     * Méthode qui permet à l'utilisateur de supprimer son compte
     */
    public function deleteUser() {
        $query = 'DELETE FROM `cine_users` WHERE `id` = :id';
        $deleteUser = $this->db->prepare($query);
        $deleteUser->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $deleteUser->execute();
      }
      
//************************************************* 
      
 //méthode permettant d'ajouter un article dans la base de données.
    public function addPosts() {
        $query = 'INSERT INTO `cine_posts` (``,``, ``) '
                . 'VALUES (:, :, :)';
        $queryResult = $this->db->prepare($query);
        $queryResult->bindValue('', $this->nickname, PDO::PARAM_STR);
        $queryResult->bindValue( '', $this->mail, PDO::PARAM_STR);
        $queryResult->bindValue('', $this->password, PDO::PARAM_STR);
        return $queryResult->execute();
    }
      
}

 