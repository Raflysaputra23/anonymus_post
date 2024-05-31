<?php 


class Search_model {
	private $db;

	public function __construct() {
		$this->db = new Database();
	}

	public function getDataUserAll() {
		$this->db->query('SELECT * FROM users');
		$this->db->execute();
		return $this->db->resultSet();
	}

	public function hapusUser($id) {
		try {
			$this->db->beginTransaction();

			$this->db->query('DELETE FROM upload WHERE UserID = :idUser');
			$this->db->bind('idUser', $id);
			$this->db->execute();

			$this->db->query('DELETE FROM users WHERE UserID = :idUser');
			$this->db->bind('idUser',$id);
			$this->db->execute();
			
			$this->db->commit();
			return $this->db->rowCount();

		} catch (Exception $e) {
			$this->db->rollBack();
			return false;
		}
		
	}
}