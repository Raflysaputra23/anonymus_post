<?php 


class Home extends Controller{

	public function index() {
		$data['akses'] = Akses::aksesUser();
		$data['judul'] = 'Home';
		$this->view('templates/header', $data);
		$this->view('home/index');
		$this->view('templates/footer');
	}
}