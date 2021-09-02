<!-- Begin Page Content -->
<div class="container-fluid" style="min-height: 80vh">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Edit Produk</h1>
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
				<form action="<?= base_url('adminarea/proses_edit__produk/')?>" method="post" enctype="multipart/form-data">
					<div class="card-header">
						<h6 class="m-0 font-weight-bold text-primary">Edit Produk</h6>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-md-8">
								<div class="form-group">
									<label>Nama Produk</label>
									<input type="text" name="nama_produk" id="nama_produk" class="form-control" required value="<?= $nama_produk ?>">
								</div>
								<div class="form-group">
									<label>Isi Konten</label>
									<textarea name="deskripsi_produk" id="ckeditor" class="form-control" required><?= $deskripsi_produk ?></textarea>
								</div>
								<div class="form-group">
									<label>Harga</label>
									<input type="text" name="harga" class="form-control" required placeholder="contoh: 1000000 (hanya angka)" value="<?= $harga ?>">
								</div>
								<div class="form-group">
									<label>Gambar Produk</label>
									<input type="file" name="image_cover" id="image_cover" class="form-control">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>Gambar Sebelumnya</label><br>
									<img src="<?= base_url($image_cover); ?>" width="100%" style="padding:10px;border: solid 1px #eaeaea;">
									<input type="hidden" name="id_produk" value="<?= $id_produk ?>">
									<input type="hidden" name="gambar_produk_old" value="<?= $image_cover ?>">
								</div>
							</div>
						</div>
					</div>
					<div class="card-footer">
						<button type="submit" class="btn btn-sm btn-primary" onclick="return confirm('Anda yakin data sudah benar ?')" >Update</button>
						<a href="<?= base_url('adminarea/slider')?>" class="btn btn-sm btn-warning" onclick="return confirm('Anda yakin ingin kembali ?')" >Batal</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>