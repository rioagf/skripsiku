<!-- Begin Page Content -->
<div class="container-fluid" style="min-height: 80vh">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Tambah Slider</h1>
	</div>
	<?php if ($this->session->flashdata('error')): ?>
		<div class="alert alert-danger" role="alert">
			<?= $this->session->flashdata('error'); ?>
		</div>
	<?php endif ?>
	<!-- Content Row -->
	<div class="row">
		<div class="col-12 col-md-12">
			<div class="card shadow">
				<form action="<?= base_url('adminarea/proses_tambah__slider')?>" method="post" enctype="multipart/form-data">
					<div class="card-header">
						<h6 class="m-0 font-weight-bold text-primary">Tambah Slider</h6>
					</div>
					<div class="card-body">
						<div class="form-group">
							<label>File Gambar Slider</label>
							<input type="file" name="images_slider" id="images_slider" class="form-control" accept="image/png, image/gif, image/jpeg" required>
						</div>
						<div class="form-group">
							<label>Ditampilkan Di:</label>
							<select class="form-control" name="lokasi" id="lokasi" required="">
								<option value="home">Home</option>
							</select>
						</div>
					</div>
					<div class="card-footer">
						<button type="submit" class="btn btn-sm btn-primary" onclick="return confirm('Anda yakin data sudah benar ?')" >Simpan</button>
						<a href="<?= base_url('adminarea/slider')?>" class="btn btn-sm btn-warning" onclick="return confirm('Anda yakin ingin kembali ?')" >Batal</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>