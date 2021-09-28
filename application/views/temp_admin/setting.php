<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Edit Website</h1>
	</div>

	<?php if ($this->session->flashdata('success')): ?>
		<div class="alert alert-success alert-dismissible fade show" role="alert">
			<?= $this->session->flashdata('success'); ?>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		</div>
	<?php elseif ($this->session->flashdata('error')): ?>
		<div class="alert alert-danger alert-dismissible fade show" role="alert">
			<?= $this->session->flashdata('error'); ?>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		</div>
	<?php endif ?>

	<!-- Content Row -->
	<div class="row">
		<div class="col-12">
			<div class="card shadow">
				<div class="card-header">
					<h6 class="m-0 font-weight-bold text-primary">Edit Website</h6>
				</div>
				<div class="card-body">
					<form action="<?= base_url('adminarea/proses_setting')?>" method="POST" enctype="multipart/form-data">
						<div class="form-group">
							<input type="hidden" name="id_setting" value="<?= $id_setting ?>">
							<label>Judul Section Layanan</label>
							<input type="text" name="judulsection_layanan" class="form-control" required value="<?= $judulsection_layanan ?>">
						</div>
						<div class="form-group">
							<label>Deskripsi Layanan</label>
							<textarea class="form-control" name="desk_layanan" id="desk_layanan" required><?= $desk_layanan ?></textarea>
						</div>
						<div class="form-group">
							<label>Judul Section Testimonial</label>
							<input type="text" name="judulsection_testimonial" class="form-control" required value="<?= $judulsection_testimonial ?>">
						</div>
						<div class="form-group">
							<label>Deskripsi Testimonial</label>
							<textarea class="form-control" name="desk_testimoni" id="desk_testimoni" required><?= $desk_testimoni ?></textarea>
						</div>
						<div class="form-group">
							<label>Gambar Profile (Kosongkan Jika Tidak Akan di Ubah)</label>
							<input type="file" name="gambar_profile" class="form-control">
							<input type="hidden" name="gambar_profile_lama" value="<?= $gambar_profile ?>">
						</div>
						<div class="form-group">
							<label>Deskripsi Profile</label>
							<textarea class="form-control" name="desk_profile" id="desk_profile" required><?= $desk_profile ?></textarea>
						</div>
						<div class="form-group">
							<label>Visi</label>
							<textarea class="form-control" name="visi" id="visi" required><?= $visi ?></textarea>
						</div>
						<div class="form-group">
							<label>Misi</label>
							<textarea class="form-control" name="misi" id="misi" required><?= $misi ?></textarea>
						</div>
						<div class="form-group">
							<label>Judul Section Laporan Keuangan</label>
							<input type="text" name="judulsection_laporankeuangan" class="form-control" required value="<?= $judulsection_laporankeuangan ?>">
						</div>
						<div class="form-group">
							<label>Deskripsi Laporan Keuangan</label>
							<textarea class="form-control" name="desk_laporankeuangan" id="desk_laporankeuangan" required><?= $desk_laporankeuangan ?></textarea>
						</div>
						<div class="form-group">
							<label>Judul Section Karir</label>
							<input type="text" name="judulsection_karir" class="form-control" required value="<?= $judulsection_karir ?>">
						</div>
						<div class="form-group">
							<label>Deskripsi Karir</label>
							<textarea class="form-control" name="desk_karir" id="desk_karir" required><?= $desk_karir ?></textarea>
						</div>
						<div class="form-group">
							<label>Judul Section Artikel</label>
							<input type="text" name="judulsection_artikel" class="form-control" required value="<?= $judulsection_artikel ?>">
						</div>
						<div class="form-group">
							<label>Deskripsi Artikel</label>
							<textarea class="form-control" name="desk_artikel" id="desk_artikel" required><?= $desk_artikel ?></textarea>
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-sm btn-primary">Simpan</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>