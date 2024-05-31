	<?php foreach ($data['upload'] as $upload): ?>
	<div class="card shadow-md rounded-3 border-0 mb-3" style="width: 100%;">
		<div class="card-header d-flex justify-content-between align-items-center">
			<?php if ($upload['Role'] == 'admin'): ?>
				<h5><?=$upload['Username']?> <sup class="bg-primary text-white px-1 rounded-2" style="font-size: 12px;">admin</sup></h5>	
			<?php else: ?>
				<h5><?=$upload['Username']?></h5>	
			<?php endif; ?>
			<?php if ($upload['UserID'] == $_SESSION['user']): ?>
			<div class="">
				<i class='bx bx-pencil btn btn-warning btn-edit' data-bs-toggle='modal' data-bs-target='#exampleModal' data-gambar="<?=$upload['Gambar']?>" data-caption="<?=$upload['Text']?>" data-upload-id="<?=$upload['UploadID']?>"></i>
				<a href='<?=Constant::DIRNAME?>uploads/hapusData/<?=$upload['UploadID']?>' class='btn btn-danger btn-sm'><i class='bx bx-trash'></i></a>
			</div>
			<?php elseif(isset($_SESSION['admin'])): ?>
			<div class="">
				<i class='bx bx-pencil btn btn-warning btn-edit' data-bs-toggle='modal' data-bs-target='#exampleModal' data-gambar="<?=$upload['Gambar']?>" data-caption="<?=$upload['Text']?>" data-upload-id="<?=$upload['UploadID']?>"></i>
				<?php if ($_SESSION['user'] == $upload['UserID']): ?>
					<a href='<?=Constant::DIRNAME?>uploads/hapusData/<?=$upload['UploadID']?>' class='btn btn-danger btn-sm'><i class='bx bx-trash'></i></a>
				<?php else: ?>
					<a href='<?=Constant::DIRNAME?>hapus/index/<?=$upload['UploadID']?>/<?=$upload['UserID']?>' class='btn btn-danger btn-sm'><i class='bx bx-trash'></i></a>
				<?php endif; ?>
			</div>
			<?php endif; ?>
		</div>
		<div class="card-body p-2 row">
			<?php if ($upload['Gambar'] != 'Null'): ?>
			<div class="col-5 col-lg-3">
				<img src="<?=Constant::DIRNAME?>img/<?=$upload['Gambar']?>" alt="" style="width: 100%; height: 190px;">
			</div>	
			<div class="col-7 col-lg-9">
				<h2 class="text-secondary" style="font-size: 14px;"><?=$upload['Text']?></h2>
			</div>
			<?php else : ?>
			<div class="col-12">
				<h2 class="text-secondary" style="font-size: 14px;"><?=$upload['Text']?></h2>
			</div>
			<?php endif ; ?>
		</div>
	</div>
	<?php endforeach ?>


	<!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-lg">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
	        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	      </div>
	      <div class="modal-body">
	        <form class="row" action="<?=Constant::DIRNAME.'uploads/editData'?>" method="post" enctype='multipart/form-data'>
	        	<input type="hidden" name="gambarLama" value="">
	        	<input type="hidden" name="idUpload" value="">

				<div class="col-6 col-lg-3">
					<img id="plate" src="" alt="" class="shadow-md border-0 rounded-2 " style="width: 100%; height: 190px;">
					<button class="w-100 overflow-hidden mt-2 btn btn-primary position-relative">
						<input type="file" name="gambar" style="opacity: 0; position: relative; z-index: 999; top: 0; left: 0; right: 0; bottom: 0;">
						<i class="bx bx-upload position-absolute top-50 start-50 translate-middle fs-4"></i>
					</button>
				</div>
				<div class="">
					<div class="form-group position-relative">
						<label for="">Caption</label>
						<textarea name="qoutes" id="" cols="30" rows="6" class="form-control" maxlength="45" placeholder="Masukkan caption anda..." style="resize: none;" required></textarea>
						<p class="length-caption position-absolute text-secondary" style="right: 5px; bottom: -10px;">0/45</p>
					</div>
				</div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-primary">Kirim</button>
	      </div>
	      </form>
	    </div>
	  </div>
	</div>
	




	<!-- FOOTER UPLOAD -->
	<div class="position-fixed bottom-0 border text-center rounded-3 px-2 py-1 z-3 bg-white" style="left: 50%;">
		<a class="btn btn-primary rounded-2" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="top" data-bs-content="<a href='<?=Constant::DIRNAME?>qoutes' class='btn btn-primary btn-sm'>Qoutes</a>
						<a href='<?=Constant::DIRNAME?>foto' class='btn btn-primary btn-sm'>Foto</a>" data-bs-html="true"><i class='bx bx-upload fs-4'></i></a>
		
	</div>


	<script>
		const file = document.querySelector('input[type="file"]');
		const textarea = document.querySelector('textarea[name="qoutes"]');
		const plate = document.getElementById('plate');

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
			console.log(myFile);
			reader.onload = function(e) {
				if (reader.readyState == 2) {
					let plate = document.getElementById('plate');
					plate.src = e.target.result;
					
				}
			}
			reader.readAsDataURL(myFile);
		});

		section.addEventListener('click', function(e) {
			if (e.target.classList.contains('bx-pencil')) {
				let gambar = e.target.dataset.gambar;
				let caption = e.target.dataset.caption;
				let uploadId = e.target.dataset.uploadId;

				textarea.parentElement.parentElement.classList.value = '';
				textarea.value = caption;
				plate.src = `img/${gambar}`;
				document.querySelector('input[name="gambarLama"]').value = gambar;
				document.querySelector('input[name="idUpload"]').value = uploadId;


				if (gambar == 'Null') {
					plate.parentElement.style.display = 'none';
					textarea.parentElement.parentElement.classList.add('col-12');
					textarea.parentElement.parentElement.classList.add('col-lg-12');
				} else {
					plate.parentElement.style.display = 'block';
					textarea.parentElement.parentElement.classList.add('col-6');
					textarea.parentElement.parentElement.classList.add('col-lg-9');
				}

			}

			if (e.target.classList.contains('btn-danger') || e.target.classList.contains('bx-trash')) {
				e.preventDefault();
				let link = '';
				if (e.target.classList.contains('bx-trash')) {
					link = e.target.parentElement.href;
				} else {
					link = e.target.href;
				}
				Swal.fire({
				  title: "Apakah kamu yakin?",
				  text: "ingin menghapus data ini!",
				  icon: "warning",
				  showCancelButton: true,
				  confirmButtonColor: "#3085d6",
				  cancelButtonColor: "#d33",
				  confirmButtonText: "Hapus"
				}).then((result) => {
				  if (result.isConfirmed) {
				   window.location.href = link;
				  }
				});

			}
			
			
		});
	</script>