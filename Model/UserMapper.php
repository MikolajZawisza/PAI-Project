<?php

require_once 'User.php';
require_once __DIR__.'/../Database.php';

class UserMapper
{
    private $database;

    public function __construct()
    {
        $this->database = new Database();
    }

    public function getUser(string $email):User {
        try {
            $stmt = $this->database->connect()->prepare('SELECT * FROM Base_users WHERE email = :email;');
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->execute();

            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            return new User($user['id'],$user['name'], $user['surname'], $user['email'], $user['password'], $user['role']);
        }
        catch(PDOException $e) {
            return 'Error: ' . $e->getMessage();
        }
    }


    public function getExpedition(string $userID):array {
        try {
            $stmt = $this->database->connect()->prepare('select * from Base_products where id = :userID ');
            $stmt->bindParam(':userID', $userID, PDO::PARAM_STR);
            $stmt->execute();

            $exp = $stmt->fetch(PDO::FETCH_ASSOC);

            if($exp == false){
                $arr = [];
                return $arr;
            }
            return $exp;
        }
        catch(PDOException $e) {
            return 'Error: ' . $e->getMessage();
        }
    }

    public function get3Expedition(string $userID):array {
        try {
            $stmt = $this->database->connect()->prepare('select * from Base_products where id_user = :userID order by date desc limit 3;');
            $stmt->bindParam(':userID', $userID, PDO::PARAM_STR);
            $stmt->execute();

            $exp = $stmt->fetchAll();
            return $exp;
        }
        catch(PDOException $e) {
            return 'Error: ' . $e->getMessage();
        }
    }

    public function getAllExpedition(string $userID):array {
        try {
            $stmt = $this->database->connect()->prepare('select * from Base_products where id_user = :userID order by date desc;');
            $stmt->bindParam(':userID', $userID, PDO::PARAM_STR);
            $stmt->execute();

            $exp = $stmt->fetchAll();

            if($exp == false){
                $arr = [];
                return $arr;
            }
            return $exp;
        }
        catch(PDOException $e) {
            return 'Error: ' . $e->getMessage();
        }
    }


    public function addUser($name, $surname, $email, $password):void {
        try {
            $stmt = $this->database->connect()->prepare('INSERT INTO Base_users VALUES (null, :name, :surname, :email, :password, "user" )');

            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
            $stmt->bindParam(':surname', $surname, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':password', $password, PDO::PARAM_STR);

            $stmt->execute();
        }
        catch(PDOException $e) {
           echo 'Error: ' . $e->getMessage();
        }
    }

    public function addExpedition($id, $date, $pleace, $comment = ''):void {
        try {
            $stmt = $this->database->connect()->prepare('INSERT INTO Base_products VALUES (null, :id, :date, :pleace, :comment )');

            $stmt->bindParam(':id', $id, PDO::PARAM_STR);
            $stmt->bindParam(':pleace', $pleace, PDO::PARAM_STR);
            $stmt->bindParam(':date', $date, PDO::PARAM_STR);
            $stmt->bindParam(':comment', $comment, PDO::PARAM_STR);

            $stmt->execute();
        }
        catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }


    public function getAll():array {
        try {
            $stmt = $this->database->connect()->prepare('SELECT * FROM Base_users ');
            $stmt->execute();
            $user = $stmt->fetchAll();
            return $user;
        }
        catch(PDOException $e) {
            return 'Error: ' . $e->getMessage();
        }
    }

    public function deleteExpedition($id_expedition):void {
        $fishes = self::getTrophy($id_expedition);
        foreach ($fishes as $fish){
            $fish = $fish['id'];
            self::deleteTrophy($fish);
        }

        try {
            $stmt = $this->database->connect()->prepare('DELETE FROM Base_products WHERE id = :id_expedition;');
            $stmt->bindParam(':id_expedition', $id_expedition, PDO::PARAM_STR);

            $stmt->execute();
        }
        catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

}