	<div class="card p-3 rounded-3 shadow-md border-0" style="width: 100%;">
		<form class="row justify-content-center" action="<?=Constant::DIRNAME.'foto/uploadFoto'?>" method="post" enctype='multipart/form-data'>
			<div class="col-6 col-md-5 col-lg-3">
				<img id="plate" src="<?=Constant::DIRNAME?>img/profil.jpg" alt="" class="shadow-md border-0 rounded-2 " style="width: 100%; height: 190px;">
				<button class="w-100 overflow-hidden mt-2 btn btn-primary position-relative">
					<input type="file" name="gambar" style="opacity: 0; position: relative; z-index: 999; top: 0; left: 0; right: 0; bottom: 0;">
					<i class="bx bx-upload position-absolute top-50 start-50 translate-middle fs-4"></i>
				</button>
			</div>
			<div class="col-12 col-lg-9">
				<div class="form-group position-relative">
					<label for="">Caption</label>
					<textarea name="qoutes" id="" cols="30" rows="6" class="form-control" maxlength="45" placeholder="Masukkan caption anda..." style="resize: none;" required></textarea>
					<p class="length-caption position-absolute text-secondary" style="right: 5px; bottom: 40px;">0/45</p>
					<button type="submit" class="btn btn-primary mt-3">Kirim</button>
				</div>
			</div>
		</form>
	</div>


	<script>
		const file = document.querySelector('input[type="file"]');
		const textarea = document.querySelector('textarea[name="qoutes"]');
		textarea.addEventListener('keyup', function() {
			if (this.value.length == 30) {
				document.querySelector('.length-caption').innerHTML = `${this.value.length}/45`;
			} else {
				document.querySelector('.length-caption').innerHTML = `${this.value.length}/45`;
			}
		});
		file.addEventListener('change', function(event) {
			let myFile = event.target.files[0];
			let reader = new FileReader();
			reader.onload = function(e) {
				if (reader.readyState == 2) {
					let plate = document.getElementById('plate');
					plate.src = e.target.result;
					
				}
			}
			reader.readAsDataURL(myFile);
		});
	</script>
