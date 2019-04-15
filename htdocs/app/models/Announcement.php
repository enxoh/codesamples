<?php

class Announcement extends Model{

	public $announcement_name;
	public $announcement_message;
	public $announcement_image;

    public function getAnnouncement(){

    }

	public function insertAnnouncement(){
		$stmt = $this->_connection->prepare("INSERT INTO announcement(announcement_name, announcement_message, announcement_image) VALUES (:announcement_name, :announcement_message, :announcement_image)");
		$stmt->execute(['announcement_name' => $this->announcement_name, 'announcement_message' => $this->announcement_message, 'announcement_image' => $this->announcement_image]);		
		return $stmt->rowCount();
    }

    public function deleteAnnouncement($announcement_name){
    	$stmt = $this->_connection->prepare("DELETE FROM announcement WHERE announcement_name = :announcement_name");
    	$stmt->execute();
    }
}
?>