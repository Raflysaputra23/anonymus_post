	<div class="row member">
	<?php foreach ($data['users'] as $user): ?>
		<div class="col-12 col-lg-6">
			<div class="card shadow-md border-0 d-flex rounded-2 p-2 mb-3" style="width: 100%;">
				<div class="row gx-0">
					<?php if (isset($_SESSION['admin'])): ?>
					<div class="col-9 d-flex gap-2 align-items-center px-2">
						<img src="<?=Constant::DIRNAME?>img/profil.jpg" alt="" width="40px" height="40px" class="rounded-circle shadow-sm">
						<div class="">
							<?php if ($user['Role'] == 'admin'): ?>
								<h6 class="m-0"><?=$user['Username']?> <sup class="bg-primary text-white px-1 rounded-2" style="font-size: 12px;">admin</sup></h6>
							<?php else: ?>
								<h6 class="m-0"><?=$user['Username']?></h6>
							<?php endif; ?>							
							<small class="text-white px-2 rounded-1 <?=($user['Status'] == 'online') ? 'bg-success' : 'bg-danger'?>" style="font-size: 12px;"><?= $user['Status']?></small>
						</div>
					</div>
					<div class="col-3 d-flex justify-content-end align-items-center">
						<a href="<?=Constant::DIRNAME?>search/hapusMember/<?=$user['UserID']?>/" class="btn btn-danger">
							<i class="fa fa-trash"></i>
						</a>
					</div>
					<?php else: ?>
					<div class="col-12 d-flex gap-2 align-items-center px-2">
						<img src="<?=Constant::DIRNAME?>img/profil.jpg" alt="" width="40px" height="40px" class="rounded-circle shadow-sm">
						<div class="">
							<?php if ($user['Role'] == 'admin'): ?>
								<h6 class="m-0"><?=$user['Username']?> <sup class="bg-primary text-white px-1 rounded-2" style="font-size: 12px;">admin</sup></h6>
							<?php else: ?>
								<h6 class="m-0"><?=$user['Username']?></h6>
							<?php endif; ?>			
							<small class="text-white px-2 rounded-1 <?=($user['Status'] == 'online') ? 'bg-success' : 'bg-danger'?>" style="font-size: 12px;"><?= $user['Status']?></small>
						</div>
					</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	<?php endforeach ?>
	</div>

	<script>
		const member = document.querySelector('.member');
		member.addEventListener('click', async function(e) {
			if (e.target.classList.contains('fa-trash') || e.target.classList.contains('btn-danger')) {
				e.preventDefault();
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
				   	 inputToken(e);
				  }
				});
				
			}
		});

		async function inputToken(e) {
			const { value: password } = await Swal.fire({
					  title: "Masukkan token kamu",
					  input: "password",
					  inputLabel: "Token",
					  inputPlaceholder: "Masukkan token kamu",
					  inputAttributes: {
					    maxlength: "10",
					    autocapitalize: "off",
					    autocorrect: "off"
					  }
					});
					if (password) {
						if (e.target.classList.contains('fa-trash')) {
							window.location.href = e.target.parentElement.href+password;
						} else {
							window.location.href = e.target.href+password;
						}
					}
		}
	</script>

