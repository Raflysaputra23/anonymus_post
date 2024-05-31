<?php 


class Admin extends Controller {
	public function index() {
		$data['judul'] = 'Admin';
		$this->view('templates/header', $data);
		$this->view('admin/index');
		$this->view('templates/footer');
	}
}