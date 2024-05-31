<?php 


class Uploads extends Controller{

	public function index() {
		$data['user'] = $this->model('Dashboard_model')->getDataUser($_SESSION['user']);
		$data['upload'] = $this->model('Upload_model')->getDataUpload();
		$data['akses'] = Akses::aksesDashboard();
		$data['judul'] = 'Upload';
		$data['pesan'] = $this->model('Dashboard_model')->tampilPesan();
		
		$this->view('templates/header', $data);
		$this->view('uploads/index', $data);
		$this->view('templates/footer');
	}

	public function editData() {
		if ($this->model('Upload_model')->edit($_POST) > 0) {
			Flasher::setFlash('success','data berhasil diedit');
			header('location:'.Constant::DIRNAME.'uploads');
			die;
		} else {
			Flasher::setFlash('error','data gagal diedit');
			header('location:'.Constant::DIRNAME.'uploads');
			die;
		}
	}

	public function hapusData($idUpload) {
		if ($this->model('Upload_model')->hapus($idUpload) > 0) {
			Flasher::setFlash('success','data berhasil dihapus');
			header('location:'.Constant::DIRNAME.'uploads');
			die;
		} else {
			Flasher::setFlash('error','data gagal dihapus');
			header('location:'.Constant::DIRNAME.'uploads');
			die;
		}
	}



}
