<?php 


class Register extends Controller{

	public function index() {
		$data['akses'] = Akses::aksesUser();
		$data['judul'] = 'Register';
		$this->view('templates/header', $data);
		$this->view('register/index');
		$this->view('templates/footer');
	}

	public function daftar() {
		if ($this->model('Register_model')->register($_POST) > 0) {
			Flasher::setFlash('success','data telah ditambahkan');
			header('location:'.Constant::DIRNAME.'login');
			die;
		} else {
			Flasher::setFlash('error','data gagal ditambahkan');
			header('location:'.Constant::DIRNAME.'login');
			die;
		
		}
	}
}