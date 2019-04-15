<?php

class User extends Model
{
    public $username;
    public $password_hash;
    public $first_name;
    public $last_name;
    public $email;
    public $newsletter_status;

    public function getUser($username){
        $stmt = $this->_connection->prepare("SELECT * FROM User WHERE username LIKE :username");
        $stmt->execute(['username' => $username]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, "User");
        return $stmt->fetch();
    }

    public function getUserId($user_id){
        $stmt = $this->_connection->prepare("SELECT * FROM User WHERE user_id LIKE :user_id");
        $stmt->execute(['user_id' => $user_id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, "User");
        return $stmt->fetch();
    }

    public function insert(){
        $stmt = $this->_connection->prepare("INSERT INTO User(username, password_hash, first_name, last_name, email, newsletter_status) VALUES (:username, :password_hash, :first_name, :last_name, :email, :newsletter_status)");
        $stmt->execute(['username' => $this->username, 'password_hash' => $this->password_hash, 'first_name' => $this->first_name, 'last_name' => $this->last_name, 'email' => $this->email, 'newsletter_status' => $this->newsletter_status]);
        return $stmt->rowCount();
    }

    public function update(){

        
        $stmt = $this->_connection->prepare("UPDATE User SET password_hash= :password_hash, first_name= :first_name, last_name=:last_name, email= :email, newsletter_status= :newsletter_status WHERE user_id = :user_id");
        $stmt->bindParam(':user_id', $_SESSION['user_id']);
        $stmt->bindParam(':password_hash', password_hash($_POST['Password'], PASSWORD_DEFAULT));
        $stmt->bindParam(':email', $_POST['Email']);
        $stmt->bindParam(':first_name', $_POST['First_name']);
        $stmt->bindParam(':last_name', $_POST['Last_name']);
        $stmt->bindParam(':newsletter_status', $_POST['Newsletter_status']);

        $stmt->execute();
        return $stmt->rowCount();       
    }
}