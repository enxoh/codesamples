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

    public function getMailList(){
        $stmt = $this->_connection->prepare("SELECT * FROM User WHERE newsletter_status = 1 ORDER BY first_name ASC");        
        $stmt->execute();
        return $results = $stmt->fetchAll();
    }

    public function insert(){
        $stmt = $this->_connection->prepare("INSERT INTO User(username, password_hash, first_name, last_name, email, newsletter_status) VALUES (:username, :password_hash, :first_name, :last_name, :email, :newsletter_status)");
        $stmt->execute(['username' => $this->username, 'password_hash' => $this->password_hash, 'first_name' => $this->first_name, 'last_name' => $this->last_name, 'email' => $this->email, 'newsletter_status' => $this->newsletter_status]);
        return $stmt->rowCount();
    }

    public function update(){
        $stmt = $this->_connection->prepare("UPDATE User SET first_name= :first_name, last_name=:last_name, email= :email, newsletter_status= :newsletter_status WHERE user_id = :user_id");
        $stmt->execute(['user_id'=>$this->user_id,
            'email'=>$this->email,
            'first_name'=>$this->first_name,
            'last_name'=>$this->last_name,
            'newsletter_status'=>$this->newsletter_status]);
        return $stmt->rowCount();       
    }

    public function updatePassword(){
        $stmt = $this->_connection->prepare("UPDATE User SET password_hash= :password_hash WHERE user_id = :user_id");
        $stmt->execute(['user_id'=>$this->user_id,
            'password_hash'=>$this->password_hash]);
        return $stmt->rowCount();       
    }


/*
    public function update(){
        $stmt = $this->_connection->prepare("UPDATE User SET password_hash= :password_hash, first_name= :first_name, last_name=:last_name, email= :email, newsletter_status= :newsletter_status WHERE user_id = :user_id");
        $stmt->execute(['user_id'=>$this->user_id,
            'password_hash'=>$this->password_hash,
            'email'=>$this->email,
            'first_name'=>$this->first_name,
            'last_name'=>$this->last_name,
            'newsletter_status'=>$this->newsletter_status]);
        return $stmt->rowCount();       
    }
*/
}