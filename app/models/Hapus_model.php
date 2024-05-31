<?php 


class Hapus_model {
	private $db;

	public function __construct() {
		$this->db = new Database();
	}

	public function hapusData($id, $pesan) {
		$idUser = $id['idUser'];
		$idUpload = $id['idUpload'];
		$pesanText = $pesan['report'];
		
		$this->db->query('DELETE FROM upload WHERE UploadID = :idUpload');
		$this->db->bind('idUpload', $idUpload);
		$this->db->execute();
		if ($this->pesanReport($idUser, $pesanText) > 0) {
			return $this->db->rowCount();
		} else {
			return $this->db->rowCount();
		}
	}

	public function pesanReport($id, $pesan) {
		$this->db->query('INSERT INTO pesan (UserID, Pesan) VALUES (:idUser, :pesan)');
		$this->db->bind('idUser', $id);
		$this->db->bind('pesan', $pesan);
		$this->db->execute();
		return $this->db->rowCount();

	}
}