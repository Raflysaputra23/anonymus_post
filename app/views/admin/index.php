	<div class="container mx-auto border mt-5 rounded-3 p-3" style="max-width: 350px;">
		<h2 class="text-center">Admin</h2>
		<form action="<?=Constant::DIRNAME?>register/daftar" method="post">

			<div class="form-group mt-4 position-relative">
				<input type="text" id="username" name="username" class="form-control control-form px-2" style="padding: 10px 0px;" required>
				<label for="username" class="position-absolute" style="bottom: 10px; left: 10px; font-size: 18px;">Username</label>
				<i class="fa fa-user position-absolute fs-4" style="right: 12px; bottom: 12px;"></i>
			</div>

			<div class="form-group mt-4 position-relative">
				<input type="text" id="username2" name="username2" class="form-control control-form px-2" style="padding: 10px 0px;" required minlength="4">
				<label for="username2" class="position-absolute" style="bottom: 10px; left: 10px; font-size: 18px;">Nama Lengkap</label>
				<i class="fa fa-user position-absolute fs-4" style="right: 12px; bottom: 12px;"></i>
				<p class="tillana text-danger" style="font-size: 12px; position: absolute; bottom: -35px; right: 0;"></p>
			</div>

			<div class="form-group mt-4 position-relative">
				<input type="password" id="password" name="password" class="form-control control-form px-2" style="padding: 10px 0px;" required>
				<label for="password2" class="position-absolute" style="bottom: 10px; left: 10px; font-size: 18px;">Password</label>
				<i class="password fa fa-eye-slash position-absolute fs-4" style="right: 10px; bottom: 12px;"></i>
			</div>

			<div class="form-group mt-4 position-relative">
				<input type="password" id="password2" name="password2" class="form-control control-form px-2" style="padding: 10px 0px;" required minlength="4">
				<label for="password2" class="position-absolute" style="bottom: 10px; left: 10px; font-size: 18px;">Confirm Password</label>
				<i class="password fa fa-eye-slash position-absolute fs-4" style="right: 10px; bottom: 12px;"></i>
				<p class="tillana text-danger" style="font-size: 12px; position: absolute; bottom: -35px; right: 0;"></p>
			</div>

			<div class="form-group mt-4 position-relative">
				<input type="password" id="admin" name="admin" class="form-control control-form px-2" style="padding: 10px 0px;" required>
				<label for="admin" class="position-absolute" style="bottom: 10px; left: 10px; font-size: 18px;">Kode Admin</label>
				<i class="password fa fa-eye-slash position-absolute fs-4" style="right: 10px; bottom: 12px;"></i>
			</div>

			<button type="submit" class="btn btn-danger w-100 mt-3">Register</button>
			<div class="d-flex align-items-center justify-content-between my-2">
				<hr style="width: 35%;"><span>OR</span><hr  style="width: 35%;">
			</div>
			<a href="<?=Constant::DIRNAME?>register" class="btn btn-primary w-100">Login</a>

		</form>
	</div>

	<script>
		const form = document.querySelector('form');
		form.addEventListener('click', (e) => {
			if (e.target.classList.contains('password')) {
				if (e.target.previousElementSibling.previousElementSibling.type == 'password') {
					e.target.previousElementSibling.previousElementSibling.type = 'text';
					e.target.classList.replace('fa-eye-slash','fa-eye');
				} else {
					e.target.previousElementSibling.previousElementSibling.type = 'password';
					e.target.classList.replace('fa-eye','fa-eye-slash');
				}
			}
		});
	</script>