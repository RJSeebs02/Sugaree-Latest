<?php
class Event{
	private $DB_SERVER='localhost';
	private $DB_USERNAME='root';
	private $DB_PASSWORD='';
	private $DB_DATABASE='db_sugaree';
	private $conn;
	public function __construct(){
		$this->conn = new PDO("mysql:host=".$this->DB_SERVER.";dbname=".$this->DB_DATABASE,$this->DB_USERNAME,$this->DB_PASSWORD);
	}

    public function new_event($event_title, $event_description, $event_date, $event_time){
		
		$data = [
			[$event_title,$event_description,$event_date,$event_time],
		];
		/*Stores parameters passed from the creation page inside the database */
		$stmt = $this->conn->prepare("INSERT INTO tbl_events(event_title, event_description, event_date, event_time) VALUES (?,?,?,?)");
		try {
			$this->conn->beginTransaction();
			foreach ($data as $row)
			{
				$stmt->execute($row);
			}
			$this->conn->commit();
		}catch (Exception $e){
			$this->conn->rollback();
			throw $e;
		}

		return true;
    }

    public function update_events($event_id, $event_title, $event_description, $event_date, $event_time) {
		$sql = "UPDATE tbl_events SET event_title=:event_title, event_description=:event_description, event_date=:event_date, event_time=:event_time WHERE event_id=:event_id";
	
		$q = $this->conn->prepare($sql);
		$q->execute(array(
			':event_id' => $event_id,
			':event_title' => $event_title,
			':event_description' => $event_description,
            ':event_date' => $event_date,
            ':event_time' => $event_time,
		));
		return true;
	}

	public function delete_event($event_id){
		$sql = "DELETE FROM tbl_events WHERE event_id = :event_id";
		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(':event_id', $event_id);
		if ($stmt->execute()) {
			return true;
		} else {
			return false;
		}
	}

    function get_event_id($event_title){
		$sql="SELECT event_id FROM tbl_events WHERE event_title = :event_title";	
		$q = $this->conn->prepare($sql);
		$q->execute(['event_title' => $event_title]);
		$event_id = $q->fetchColumn();
		return $event_id;
	}
    public function get_event_title($event_id){
        $sql = "SELECT * FROM tbl_news WHERE event_id = :event_id";
        $q = $this->conn->prepare($sql);
        $q->execute(['event_id' => $event_id]);
        return $q->fetch(PDO::FETCH_ASSOC);
    }
}
?>