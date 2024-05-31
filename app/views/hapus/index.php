<div class="row justify-content-center">
	<form class="col-12 col-md-10 col-lg-8" action="<?=Constant::DIRNAME?>hapus/hapusDataUser/<?=$data['idUpload']?>/<?=$data['idUser']?>" method="post">
		<div class="form-group mb-2">
			<label for="">Report</label>
			<input type="text" name="report" class="form-control">
		</div>
		<button type="submit" class="btn btn-primary">Kirim</button>
	</form>
</div>