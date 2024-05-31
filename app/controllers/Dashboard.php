<?php 


class Dashboard extends Controller{

	public function index() {
		$data['user'] = $this->model('Dashboard_model')->getDataUser($_SESSION['user']);
		$data['pesan'] = $this->model('Dashboard_model')->tampilPesan();
		$data['akses'] = Akses::aksesDashboard();
		$data['judul'] = 'Dashboard';
		$this->view('templates/header', $data);
		$this->view('dashboard/index', $data);
		$this->view('templates/footer');
	}

	public function logout() {
		session_start();
		$this->model('Dashboard_model')->updateStatusOffline($_SESSION['user']);
		session_destroy();
		session_unset();
		setcookie('id','',time() * 60 * 60 * 24 * 30);
		setcookie('UserID','',time() * 60 * 60 * 24 * 30);
		header('location:'.Constant::DIRNAME.'home');
		die;
	}
}