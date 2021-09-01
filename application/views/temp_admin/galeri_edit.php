<!-- Begin Page Content -->
<div class="container-fluid" style="min-height: 80vh">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Edit Galeri</h1>
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
				<form action="<?= base_url('adminarea/proses_edit__gallery/')?>" method="post" enctype="multipart/form-data">
					<div class="card-header">
						<h6 class="m-0 font-weight-bold text-primary">Edit Galeri</h6>
						<input type="hidden" name="id" value="<?= $id ?>">
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>Nama Galeri</label>
									<input type="text" name="nama_galeri" id="nama_galeri" class="form-control" required placeholder="Contoh: Galeri Bersama Client" value="<?= $nama_galeri ?>">
								</div>
								<div class="form-group">
									<label>File Gambar Galeri</label>
									<input type="file" name="images_galeri" id="images_galeri" class="form-control" accept="image/png, image/gif, image/jpeg">
								</div>
								<div class="form-group">
									<label>Ditampilkan Di:</label>
									<select class="form-control" name="lokasi_galeri" id="lokasi_galeri" required="">
										<option value="home" <?php if ($lokasi_galeri == 'home'): echo 'selected'; endif ?>>Home</option>
									</select>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Gambar Sebelumnya</label><br>
									<img src="<?= base_url($file); ?>" width="50%" style="border: solid 1px #eaeaea;">
									<input type="hidden" name="file_lama" value="<?= $file ?>">
								</div>
							</div>
						</div>
					</div>
					<div class="card-footer">
						<button type="submit" class="btn btn-sm btn-primary" onclick="return confirm('Anda yakin data sudah benar ?')" >Update</button>
						<a href="<?= base_url('adminarea/gallery')?>" class="btn btn-sm btn-warning" onclick="return confirm('Anda yakin ingin kembali ?')" >Batal</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>