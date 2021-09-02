<!-- Begin Page Content -->
<div class="container-fluid" style="min-height: 80vh">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800"><?= $nama_produk; ?></h1>
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
				<div class="card-body">
					<table class="table">
						<thead>
							<tr>
								<td colspan="2" style="text-align: center;">
									<img src="<?= base_url($image_cover) ?>" width="100%" style="border: solid 1px #eaeaea;padding: 10px;">
								</td>
							</tr>
							<tr>
								<th>Judul Produk</th>
								<th>: <?= $nama_produk; ?></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>Isi Konten</td>
								<td>: <?= $deskripsi_produk; ?></td>
							</tr>
							<tr>
								<td>Slug</td>
								<td>: <a href="<?= base_url('layanan/detail/'.$slug); ?>" target="_BLANK"><?= base_url('layanan/detail/'.$slug); ?></a></td>
							</tr>
							<tr>
								<td>Harga</td>
								<td>: <?= $harga; ?></td>
							</tr>
							<tr>
								<td>Tanggal Publish</td>
								<td>: <?= date('d F Y', strtotime($date_created)) ?></td>
							</tr>
							<tr>
								<td></td>
								<td>
									<a href="<?= base_url('adminarea/edit_produk/'.$slug) ?>" class="btn btn-sm btn-primary" onclick="return confirm('Anda yakin ingin mengubah Produk ?')" >Edit</a>
									<a href="<?= base_url('adminarea/produk')?>" class="btn btn-sm btn-warning" onclick="return confirm('Anda yakin ingin kembali ?')" >Kembali</a>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>