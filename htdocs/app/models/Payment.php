<?php

class Payment extends Model{
	public $card_type;
	public $card_name;
	public $card_number;
	public $exp_date;

	public function getPaymentInfo($user_id){
		$stmt = $this->_connection->prepare("SELECT * FROM PAYMENT_OPTION WHERE user_id LIKE :user_id");
		$stmt->execute(['user_id' => $user_id]);
        return $results = $stmt->fetchAll();
	}

	public function addPayment(){
        $stmt = $this->_connection->prepare("INSERT INTO PAYMENT_OPTION(user_id, card_type, card_name, card_number, exp_date) VALUES (:user_id, :card_type, :card_name, :card_number,:exp_date)");
        $stmt->execute(['user_id' => $_SESSION['user_id'], 'card_type' => $this->card_type, 'card_name' => $this->card_name, 'card_number' => $this->card_number, 'exp_date' => $this->exp_date]);
        return $stmt->rowCount();
    }

    public function removePayment($pay_option_id){
    	$stmt = $this->_connection->prepare("DELETE FROM PAYMENT_OPTION WHERE pay_option_id = :pay_option_id");
    	$stmt->execute(['pay_option_id' => $pay_option_id]);
    	$stmt->setFetchMode(PDO::FETCH_CLASS, "Payment");
    	return $stmt->rowCount();
    }

}