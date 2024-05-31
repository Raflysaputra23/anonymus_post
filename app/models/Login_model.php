<?php 


class Login_model {
	private $db;

	public function __construct() {
		$this->db = new Database();
	}

	public function login($data) {
		$username = htmlspecialchars($data['username']);
		$password = htmlspecialchars($data['password']);
		$cookie = (isset($data['cookie'])) ? true : false ;		

		$dataUser = $this->getDataById($username);
		if ($dataUser == false) {
			Flasher::setFlash('error','username/password salah');
			header('location:'.Constant::DIRNAME.'login');
			die;
		}

		if (!password_verify($password, $dataUser['Password'])) {
			Flasher::setFlash('error','username/password salah');
			header('location:'.Constant::DIRNAME.'login');
			die;
		} 

		if ($dataUser['Role'] == 'admin') {
			 $_SESSION['admin'] = '010606';
		}
		if ($cookie == true) {
			Flasher::setFlash('success','login berhasil');
			$this->updateStatusOnline($dataUser['UserID']);
			$_SESSION['user'] = $dataUser['UserID'];
			setcookie('id',password_hash($password, PASSWORD_DEFAULT), time() + 60, '/');
			setcookie('UserID',$dataUser['UserID'], time() + 60, '/');
			header('location:'.Constant::DIRNAME.'dashboard');
			die;
		} else {
			Flasher::setFlash('success','login berhasil');
			$this->updateStatusOnline($dataUser['UserID']);
			$_SESSION['user'] = $dataUser['UserID'];
			header('location:'.Constant::DIRNAME.'dashboard');
			die;
		}
		

	}

	public function getDataById($id) {
		$this->db->query('SELECT * FROM users WHERE Username = :Username');
		$this->db->bind('Username', $id);
		$this->db->execute();
		return $this->db->single();
	}

	public function updateStatusOnline($id) {
		$this->db->query('UPDATE users SET Status = :status WHERE UserID = :UserID');
		$this->db->bind('status', 'online');
		$this->db->bind('UserID', $id);
		$this->db->execute();
	}

}