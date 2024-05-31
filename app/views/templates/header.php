<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= $data['judul']?></title>

	<!-- BOOTSTRAP CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

	<!-- FONTAWESOME CSS -->
	<link rel="stylesheet" href="tools/fontawesome/css/font-awesome.min.css">

	<!-- FONTS GOOGLE -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Oswald&family=Poppins:wght@300&family=Tillana&display=swap" rel="stylesheet">

	<!-- BOX ICONS -->
	<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

	<!-- SWETALERT -->
	<link rel="stylesheet" href="tools/swetalert/sweetalert2.min.css">
	<script src="tools/swetalert/sweetalert2.all.min.js"></script>

	<!-- MY CSS -->
	<style>
		<?= require_once "css/style.css"; ?>
	</style>

</head>
<body class="overflow-hidden">

	<!-- FLASHER -->
	<?= Flasher::getFlash() ?>

	<!-- NAVBAR -->
	<nav id="navbar" class="navbar bg-body-tertiary mx-auto" style="max-height: 10vh; height: 10vh; max-width:990px;">
	  <div class="container d-flex align-items-center position-relative">
	    <a class="navbar-brand" href="#">
	      <h4 class="tilana d-flex align-items-center"><i class='bx bxs-hot text-danger me-1 fs-1'></i>Anonymus</h4>
	    </a>
	    <!-- MESSAGE -->
	    <?php if ($data['judul'] != 'Home' && $data['judul'] != 'Login' && $data['judul'] != 'Register' && $data['judul'] != 'Admin'): ?>
	    <i class="bx bx-message-dots fs-3 text-black position-relative">
	    <?php endif; ?>
	    	<?php if (isset($data['pesan'])): ?>
	    		<?php if (count($data['pesan']) > 0): ?>
	    			<span class="position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light rounded-circle">
					    <span class="visually-hidden">New alerts</span>
					</span>
	    		<?php endif ?>
	    	<?php endif ?>
	    </i>
	    <div class="bg-blur shadow-md rounded-3 position-absolute end-0 arrow p-3 d-none overflow-y-auto" style="z-index: 9999;top: 85px; width: 22rem; height: 25rem; max-height: 25rem;">
	    <?php if (isset($data['pesan'])): ?>
	    	<?php if (count($data['pesan']) > 0): ?>
	  			<?php foreach ($data['pesan'] as $pesan): ?>
	    	
	    	<div class="alert alert-danger mb-2">
	    		<i class="fa fa-exclamation fs-4 position-absolute text-danger" style="top: -10px; left: -5px; rotate: -15deg;"></i>
	    		<p class="m-0 fw-bold">Dari admin:</p>
	    		<small><?=$pesan['Pesan']?></small>
	    	</div>
	    	    	
	 			<?php endforeach; ?>
	 		<?php else: ?>
	 		<h4 class="text-center mt-5">Not Message!</h4>
	 		<?php endif; ?>
	 	<?php endif; ?>
	 	</div>
	  </div>
	</nav>
	<!-- END NAVBAR -->

	<!-- MAIN -->
	<main class="container">
		<div class="row">
			<?php if ($data['judul'] != 'Home' && $data['judul'] != 'Login' && $data['judul'] != 'Register' && $data['judul'] != 'Admin'): ?>
			<!-- ASIDE -->
			<aside id="aside" class="col-2 py-3 px-2 bg-body-tertiary position-relative" style="max-height: 90vh; height: 90vh;">

				<!-- ASIDE HEADER -->
				<div class="row justify-content-center gx-0">
					<div class="col-8 col-lg-8 text-center">
						<img id="profil" src="<?=Constant::DIRNAME?>img/profil.jpg" alt="" class="rounded-circle shadow-sm text-center w-100">	
					</div>
					<div class="col-11 col-lg-8 text-center">
						<h5 class="mt-3 fs-6"><?=$data['user']['Username']?></h5>
						<p class="text-white px-2 bg-success rounded-2 text-center fs-6 d-inline"><small>Aktif</small></p>
					</div>
				</div>
				<!-- ASIDE HEADER END -->

				<!-- ASIDE MENU -->
				<div class="row mt-5 justify-content-center">
					<div class="col-12 text-center menu">
						<a href="<?=Constant::DIRNAME?>dashboard" class="my-1 btn btn-primary w-100 d-flex justify-content-start align-items-center gap-2 <?=($data['judul'] == 'Dashboard') ? 'active' : '';?>">
							<i class='bx bxs-home fs-4'></i>
							<small>Dashboard</small>
						</a>
						<a href="<?=Constant::DIRNAME?>search" class="my-1 btn btn-primary w-100 d-flex justify-content-start align-items-center gap-2 <?=($data['judul'] == 'Search') ? 'active' : '';?>">
							<i class='bx bx-user fs-4'></i>
							<small>Member</small>
						</a>
						<a href="<?=Constant::DIRNAME?>uploads" class="my-1 btn btn-primary w-100 d-flex justify-content-start align-items-center gap-2 <?=($data['judul'] == 'Upload') ? 'active' : '';?>">
							<i class='bx bx-upload fs-4'></i>
							<small>Upload</small>
						</a>
						<a href="<?=Constant::DIRNAME?>dashboard/logout" class="btn btn-danger position-absolute bottom-0 mb-2 end-0 start-0 mx-2 d-flex justify-content-start align-items-center gap-2">
							<i class='bx bx-log-out fs-4'></i>
							<small>Log out</small>
						</a>
					</div>
				</div>
				<!-- ASIDE MENU END -->

				<!-- TOOGLE ASIDE -->
				<i id="toogle-aside" class="btn btn-secondary btn-sm rounded-circle fs-5 bx bx-chevron-right position-absolute" style="right: -15px; top: 60%;"></i>
				<!-- TOOGLE ASIDE END -->

			</aside>
			<?php endif ?>

			<!-- SECTION -->
			<section id="section" class="col-10 px-4 py-3 mx-auto overflow-y-auto position-relative" style="max-height: 90vh; height: 90vh;">

				
	

	
