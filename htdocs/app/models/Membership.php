<?php

class Membership extends Model{
    public $mem_status;
    public $expire_date;
    public $begin_date;
    public $pay_option_id;


    public function getMembership($user_id){
        $stmt = $this->_connection->prepare("SELECT * FROM Membership WHERE user_id LIKE :user_id");
        $stmt->execute(['user_id' => $user_id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, "Membership");
        return $stmt->fetch();
    }

    public function insert(){
        $stmt = $this->_connection->prepare("INSERT INTO Membership(user_id, mem_status, expire_date, begin_date,pay_option_id) VALUES (:user_id, :mem_status, :expire_date, :begin_date, :pay_option_id)");
        $stmt->execute(['user_id' => $_SESSION['user_id'], 'mem_status' => $this->mem_status, 'expire_date' => $this->expire_date, 'begin_date' => $this->begin_date, 'pay_option_id' => $this->pay_option_id]);
        return $stmt->rowCount();
    }
}