<?php 


class Qoutes extends Controller{

	public function index() {
		$data['user'] = $this->model('Dashboard_model')->getDataUser($_SESSION['user']);
		$data['akses'] = Akses::aksesDashboard();
		$data['judul'] = 'Upload';
		$this->view('templates/header', $data);
		$this->view('qoutes/index');
		$this->view('templates/footer');
	}

	public function uploadQoutes() {
		if ($this->model('Upload_model')->uploadData($_POST) > 0) {
			Flasher::setFlash('success', 'qoutes berhasil diupload');
			header('location:'.Constant::DIRNAME.'uploads');
			die;
		} else {
			Flasher::setFlash('error', 'qoutes gagal diupload');
			header('location:'.Constant::DIRNAME.'uploads');
			die;
		}
	}

}