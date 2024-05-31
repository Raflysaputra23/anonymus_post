	<div class="row justify-content-center">
		<div class="col-12 col-md-10">
			<div class="card shadow-md border-0 mb-4 w-100">
			  <div class="card-body">
			    <h4 class="card-title text-semibold">Halo, <?=$data['user']['Username']?></h4>
			    <p class="card-text text-secondary" style="font-size: 15px;">Selamat datang diwebsite kami, kami menyediakan fitur untuk mengupload qoutes/foto anda.</p>
			  </div>
			</div>
		</div>
		<?php if ($data['user']['Role'] == 'admin'): ?>
		<div class="col-12 col-md-10">
			<div class="card shadow-md border-0 mb-4 w-100">
			  <div class="card-body">
			    <h4 class="card-title text-semibold">Halo, Admin</h4>
			    <p class="card-text text-secondary" style="font-size: 15px;">Anda login sebagai admin, lebih banyak fitur yang anda dapat akses</p>
			  </div>
			</div>
		</div>	
		<?php endif ?>
	</div>
	<div class="row justify-content-center">
		<div class="col-8 col-md-6 col-lg-5">
			<div class="card border-0 w-100">
			  <img src="<?=Constant::DIRNAME?>img/bearHalo.gif" alt="" width="100%">
			</div>
		</div>
	</div>	
		
		
	
	