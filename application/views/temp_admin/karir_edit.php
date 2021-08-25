<!-- Begin Page Content -->
<div class="container-fluid" style="min-height: 80vh">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Tambah Data Karir</h1>
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
				<form action="<?= base_url('adminarea/proses_edit__karir')?>" method="POST">
					<div class="card-header">
						<h6 class="m-0 font-weight-bold text-primary">Tambah Data</h6>
					</div>
					<div class="card-body">
						<div class="form-group">
							<label>Judul Karir</label>
							<input type="text" name="judul_karir" id="judul_karir" class="form-control" value="<?= $judul_karir; ?>" required>
						</div>
						<div class="form-group">
							<label>Deskripsi Karir</label>
							<textarea name="deskripsi_karir" id="deskripsi_karir" class="form-control" required><?= $deskripsi_karir; ?></textarea>
						</div>
					</div>
					<div class="card-footer">
						<input type="hidden" name="id_karir" value="<?= $id_karir; ?>">
						<button class="btn btn-sm btn-primary" onclick="return confirm('Anda yakin data sudah benar ?')" >Update Data</button>
						<a href="<?= base_url('adminarea/karir')?>" class="btn btn-sm btn-warning" onclick="return confirm('Anda yakin ingin kembali ?')" >Batal</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>