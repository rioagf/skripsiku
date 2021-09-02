<!-- Begin Page Content -->
<div class="container-fluid">

	<?php if ($this->session->flashdata('error')): ?>
		<div class="alert alert-danger" role="alert">
			<?= $this->session->flashdata('error'); ?>
		</div>
	<?php elseif ($this->session->flashdata('success')): ?>
		<div class="alert alert-success" role="success">
			<?= $this->session->flashdata('success'); ?>
		</div>
	<?php endif ?>
	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Data Produk</h1>
		<a href="<?=base_url('adminarea/tambah_produk') ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Tambah Produk</a>
	</div>

	<!-- Content Row -->
	<div class="row">
		<div class="col-12">
			<div class="card shadow">
				<div class="card-header">
					<h6 class="m-0 font-weight-bold text-primary">Data Produk</h6>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
							<thead>
								<tr>
									<th>NO</th>
									<th>NAMA LAYANAN</th>
									<th>DESKRIPSI</th>
									<th>HARGA</th>
									<th>ACTION</th>
								</tr>
							</thead>
							<tbody>
								<?php $no=1; ?>
								<?php foreach ($produk as $data) { ?>
									<tr>
										<td><?= $no++ ?></td>
										<td><?= $data->nama_produk ?></td>
										<td><?= character_limiter($data->deskripsi_produk, 200);  ?></td>
										<td><?= 'Rp. '.number_format($data->harga, 2,",","."); ?></td>
										<td>
											<a href="<?= base_url('adminarea/detail_produk/'.$data->slug) ?>" class="btn btn-sm btn-success"><i class="fa fa-book"></i></a>
											<a href="<?= base_url('adminarea/edit_produk/'.$data->slug) ?>" class="btn btn-sm btn-primary"><i class="fa fa-pen"></i></a>
											<a href="<?= base_url('adminarea/delete_produk/'.$data->slug) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Anda yakin ingin menghapus Produk?')"><i class="fa fa-trash"></i></a>
										</td>
									</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>