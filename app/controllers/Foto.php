<?php 


class Foto extends Controller{

	public function index() {
		$data['user'] = $this->model('Dashboard_model')->getDataUser($_SESSION['user']);
		$data['akses'] = Akses::aksesDashboard();
		$data['judul'] = 'Upload';
		$this->view('templates/header', $data);
		$this->view('foto/index');
		$this->view('templates/footer');
	}

	public function uploadFoto() {
		if ($this->model('Upload_model')->uploadData($_POST) > 0) {
			Flasher::setFlash('success', 'foto berhasil diupload');
			header('location:'.Constant::DIRNAME.'uploads');
			die;
		} else {
			Flasher::setFlash('error', 'foto gagal diupload');
			header('location:'.Constant::DIRNAME.'uploads');
			die;
		}
	}

}