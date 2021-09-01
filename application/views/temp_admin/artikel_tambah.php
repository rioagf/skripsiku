<!-- Begin Page Content -->
<div class="container-fluid" style="min-height: 80vh">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Tambah Artikel</h1>
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
				<form action="<?= base_url('adminarea/proses_tambah__artikel')?>" method="POST">
					<div class="card-header">
						<h6 class="m-0 font-weight-bold text-primary">Tambah Artikel</h6>
					</div>
					<div class="card-body">
						<div class="form-group">
							<label>Judul Artikel</label>
							<input type="text" name="judul_artikel" id="judul_artikel" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Isi Konten</label>
							<textarea name="isi_konten" id="ckeditor" class="form-control" required></textarea>
						</div>
						<div class="form-group">
							<label>Gambar Artikel</label>
							<input type="file" name="gambar_artikel" id="gambar_artikel" class="form-control">
						</div>
					</div>
					<div class="card-footer">
						<button class="btn btn-sm btn-primary" onclick="return confirm('Anda yakin data sudah benar ?')" >Tambah Data</button>
						<a href="<?= base_url('adminarea/artikel')?>" class="btn btn-sm btn-warning" onclick="return confirm('Anda yakin ingin kembali ?')" >Batal</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>