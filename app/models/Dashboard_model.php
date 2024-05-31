<?php 


class Dashboard_model {
	private $db;

	public function __construct() {
		$this->db = new Database();
	}

	public function getDataUser($id) {
		$UserID = $id;

		$this->db->query('SELECT * FROM users WHERE UserID = :UserID');
		$this->db->bind('UserID',$UserID);
		$this->db->execute();
		return $this->db->single();
	}

	public function updateStatusOffline($id) {
		$this->db->query('UPDATE users SET Status = :status WHERE UserID = :UserID');
		$this->db->bind('status', 'offline');
		$this->db->bind('UserID', $id);
		$this->db->execute();
	}

	public function tampilPesan() {
		$this->db->query('SELECT * FROM pesan WHERE UserID = :idUser');
		$this->db->bind('idUser', $_SESSION['user']);
		$this->db->execute();
		return $this->db->resultSet();
	}
}