<?php 


class Login extends Controller{

	public function index() {
		$data['akses'] = Akses::aksesUser();
		$data['judul'] = 'Login';
		$this->view('templates/header', $data);
		$this->view('login/index');
		$this->view('templates/footer');
	}

	public function masuk() {
		if ($this->model('Login_model')->login($_POST) <= 0) {
			Flasher::setFlash('error','username/password salah');
			header('location:'.Constant::DIRNAME.'login');
			die;
		}
			
		
	}
}