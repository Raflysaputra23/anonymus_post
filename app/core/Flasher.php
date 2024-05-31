<?php 


class Flasher {

	public static function setFlash($aksi, $pesan) {
		$_SESSION['flash'] = [
			'aksi' => $aksi,
			'pesan' => $pesan
		];
	} 

	public static function getFlash() {
		if (isset($_SESSION['flash'])) {
			echo '<script>
				const Toast = Swal.mixin({
				  toast: true,
				  position: "top-end",
				  showConfirmButton: false,
				  timer: 3000,
				  timerProgressBar: true,
				  didOpen: (toast) => {
				    toast.onmouseenter = Swal.stopTimer;
				    toast.onmouseleave = Swal.resumeTimer;
				  }
				});
				Toast.fire({
				  icon: "'.$_SESSION["flash"]["aksi"].'",
				  title: "'.$_SESSION["flash"]["pesan"].'"
				});
			</script>';
		}
		unset($_SESSION['flash']);
	}
}