<?php 


class Search extends Controller{

	public function index() {
		$data['user'] = $this->model('Dashboard_model')->getDataUser($_SESSION['user']);
		$data['users'] = $this->model('Search_model')->getDataUserAll();
		$data['akses'] = Akses::aksesDashboard();
		$data['judul'] = 'Search';
		$data['pesan'] = $this->model('Dashboard_model')->tampilPesan();
		
		$this->view('templates/header', $data);
		$this->view('search/index',$data);
		$this->view('templates/footer');
	}

	public function hapusMember($userId, $token) {
		if ($token != '010606') {
			Flasher::setFlash('error','token salah');
			header('location:'.Constant::DIRNAME.'search');
			die;
		} else {
			if ($this->model('Search_model')->hapusUser($userId) > 0) {
				if ($userId == $_SESSION['user']) {
					unset($_SESSION['user']);
					setcookie('id','',time() - 60 * 60 * 24 * 30);
					setcookie('UserID','',time() - 60 * 60 * 24 * 30);
				}
				Flasher::setFlash('success','user berhasil dihapus');
				header('location:'.Constant::DIRNAME.'search');
				die;
			} else {
				Flasher::setFlash('error','user gagal dihapus');
				header('location:'.Constant::DIRNAME.'search');
				die;
			}
		}
	}
}