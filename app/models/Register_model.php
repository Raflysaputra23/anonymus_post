<?php 


class Register_model {
	private $db;

	public function __construct() {
		$this->db = new Database();
	}

	public function register($data) {
		$username = htmlspecialchars($data['username']);
		$username2 = htmlspecialchars($data['username2']);
		$noTelp = htmlspecialchars($data['noTelp']);
		$password = htmlspecialchars($data['password']);
		$password2 = htmlspecialchars($data['password2']);

		if (isset($data['admin'])) {
		 	if ($data['admin'] == '010606') {
		 		$role = 'admin';
		 	} else {
		 		Flasher::setFlash('error','kode admin salah');
				header('location:'.Constant::DIRNAME.'admin');
				die;
		 	}
		 } else {
		 	$role = 'user';
		 }

		if ($this->getDataById($username) > 0) {
			Flasher::setFlash('error','username sudah digunakan');
			header('location:'.Constant::DIRNAME.'register');
			die;
		}

		if ($password != $password2) {
			Flasher::setFlash('error','password disikan dengan benar');
			header('location:'.Constant::DIRNAME.'register');
			die;
		}

		$password = password_hash($password, PASSWORD_DEFAULT);

		$this->db->query('INSERT INTO users(Username, NamaLengkap, NoTelp, Password, Role) VALUES (:username, :namalengkap, :notelp, :password, :role)');
		$this->db->bind('username', $username);
		$this->db->bind('namalengkap', $username2);
		$this->db->bind('notelp', $noTelp);
		$this->db->bind('password', $password);
		$this->db->bind('role', $role);
		$this->db->execute();
		return $this->db->rowCount();

	}

	public function getDataById($id) {
		$this->db->query('SELECT * FROM users WHERE Username = :Username');
		$this->db->bind('Username', $id);
		$this->db->execute();
		return $this->db->rowCount();
	}
}