<?php 



class Akses {

	public static function aksesUser() {
		if (isset($_SESSION['user'])) {
			header('location:'.Constant::DIRNAME.'dashboard');
			die;
		} else if(isset($_COOKIE['id'])) {
			if ($_COOKIE['id'] == $_COOKIE['id']) {
				$_SESSION['user'] = $_COOKIE['UserID'];
				header('location:'.Constant::DIRNAME.'dashboard');
				die;
			}
		}
	}

	public static function aksesDashboard() {
		if (empty($_SESSION['user'])) {
			header('location:'.Constant::DIRNAME.'home');
			die;
		}
	}

	public static function aksesAdmin($kode) {
		if (isset($kode)) {
			if ($kode == '010606') {
				
			}
		}
	}
}