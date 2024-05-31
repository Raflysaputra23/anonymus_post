	<div class="card p-3 rounded-3 shadow-md border-0" style="width: 100%;">
		<form action="<?=Constant::DIRNAME.'qoutes/uploadQoutes'?>" method="post">
			<textarea class="form-control mb-2" name="qoutes" id="" placeholder="Masukkan qoutes anda..." autofocus  cols="30" rows="5" style="resize: none;" required></textarea>
			<button type="submit" class="btn btn-primary"><i class="bx bx-upload fs-4"></i></button>
			<button type="reset" class="btn btn-warning"><i class="bx bx-history fs-4 text-white"></i></button>
		</form>
	</div>