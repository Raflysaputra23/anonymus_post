<?php 


class Upload_model {
	private $db;


	public function __construct() {
		$this->db = new Database();
	}

	public function uploadData($data) {
		$gambar = (isset($_FILES['gambar'])) ? $this->uploadGambar($_FILES['gambar']) : 'Null';
		$caption = htmlspecialchars($data['qoutes']);
		$idUser = htmlspecialchars($_SESSION['user']);

		$this->db->query('INSERT INTO upload (Gambar, Text, UserID) VALUES (:gambar, :text, :idUser)');
		$this->db->bind('gambar', $gambar);
		$this->db->bind('text', $caption);
		$this->db->bind('idUser', $idUser);
		$this->db->execute();
		return $this->db->rowCount();

	}

	public function uploadGambar($data) {
		$namaGambar = $data['name'];
		$sizeGambar = $data['size'];
		$pathGambar = $data['tmp_name'];
		$errorGambar = $data['error'];

		$extensiValid = ['jpg','jpeg','png','gif'];
		$extensiGambar = pathinfo($namaGambar, PATHINFO_EXTENSION);

		if (!in_array($extensiGambar, $extensiValid)) {
			Flasher::setFlash('error','extensi gambar tidak valid');
			header('location:'.Constant::DIRNAME.'foto');
			die;
		}

		if ($sizeGambar > 1000000) {
			Flasher::setFlash('error','size gambar terlalu besar');
			header('location:'.Constant::DIRNAME.'foto');
			die;
		}

		$gambar = uniqid().'.'.$extensiGambar;

		move_uploaded_file($pathGambar, 'img/'.$gambar);
		return $gambar;
	}

	public function getDataUpload() {
		$this->db->query('SELECT * FROM upload join users WHERE upload.UserID = users.UserID ORDER BY UploadID DESC');
		$this->db->execute();
		return $this->db->resultSet();
	}

	public function edit($data) {
		if ($_FILES['gambar']['error'] == 0) {
			$gambar = $this->uploadGambar($_FILES['gambar']);
		} else {
			$gambar = $data['gambarLama'];
		}
		$caption = htmlspecialchars($data['qoutes']);
		$idUpload = htmlspecialchars($data['idUpload']);

		$this->db->query('UPDATE upload SET Gambar = :gambar, Text = :text WHERE UploadID = :idUpload');
		$this->db->bind('gambar', $gambar);
		$this->db->bind('text', $caption);
		$this->db->bind('idUpload', $idUpload);
		$this->db->execute();
		return $this->db->rowCount();

	}

	public function hapus($data) {
		$this->db->query('DELETE FROM upload WHERE UploadID = :idUpload');
		$this->db->bind('idUpload', $data);
		$this->db->execute();
		return $this->db->rowCount();
	}
}