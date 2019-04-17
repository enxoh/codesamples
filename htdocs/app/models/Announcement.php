<?php

class Announcement extends Model{

	public $announcement_name;
	public $announcement_message;
	public $announcement_image;

    public function getAnnouncement($announcement_id){
        $stmt = $this->_connection->prepare("SELECT * FROM announcement WHERE announcement_id = :announcement_id");
        $stmt->execute(['announcement_id' => $announcement_id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, "Announcement");
        return $stmt->fetch();
    }

    public function selectAll(){
    	$stmt = $this->_connection->prepare("SELECT * FROM announcement ORDER BY announcement_id ASC");
    	$stmt->execute();
    	return $results = $stmt->fetchAll();
    }

	public function insertAnnouncement(){
		$stmt = $this->_connection->prepare("INSERT INTO announcement(announcement_name, announcement_message, announcement_image) VALUES (:announcement_name, :announcement_message, :announcement_image)");
		$stmt->execute(['announcement_name' => $this->announcement_name, 'announcement_message' => $this->announcement_message, 'announcement_image' => $this->announcement_image]);		
		return $stmt->rowCount();

		/* WITH DATE
		$stmt = $this->_connection->prepare("INSERT INTO announcement(announcement_name, announcement_message, announcement_image, announcement_date) VALUES (:announcement_name, :announcement_message, :announcement_image, announcement_date)");
		$stmt->execute(['announcement_name' => $this->announcement_name, 'announcement_message' => $this->announcement_message, 'announcement_image' => $this->announcement_image,
			'announcement_date' => $this->announcement_date]);		
		return $stmt->rowCount();
		*/
    }

    public function deleteAnnouncement($announcement_id){
    	$stmt = $this->_connection->prepare("DELETE FROM announcement WHERE announcement_id = :announcement_id");
    	$stmt->execute(['announcement_id' => $announcement_id]);
    	$stmt->setFetchMode(PDO::FETCH_CLASS, "Announcement");
    	return $stmt->rowCount();
    }
}
?>