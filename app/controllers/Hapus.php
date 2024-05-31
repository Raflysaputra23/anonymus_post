<?php 


class Hapus extends Controller {

	public function index($idUpload, $idUser) {
		$data['judul'] = 'Upload';
		$data['user'] = $this->model('Dashboard_model')->getDataUser($_SESSION['user']);
		$data['idUpload'] = $idUpload;
		$data['idUser'] = $idUser;
		$this->view('templates/header',$data);
		$this->view('hapus/index',$data);
		$this->view('templates/footer');
	}

	public function hapusDataUser($idUpload, $idUser) {
		$id = ['idUpload' => $idUpload, 'idUser' => $idUser];
		if ($this->model('Hapus_model')->hapusData($id, $_POST) > 0) {
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