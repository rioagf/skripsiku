<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Pembayaran Masuk</h1>
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
					<h6 class="m-0 font-weight-bold text-primary">Daftar Konfirmasi Pesanan</h6>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
							<thead>
								<tr>
									<th>NO</th>
									<th>BUKTI PEMBAYARAN</th>
									<th>PERIHAL</th>
									<th>NAMA PEMESAN</th>
									<th>JUMLAH BAYAR</th>
									<th>TANGGAL KONFIRMASI</th>
									<th>ACTION</th>
								</tr>
							</thead>
							<tbody>
								<?php $no=1; ?>
								<?php foreach ($pembayaran as $data) { ?>
									<tr>
										<td><?= $no++ ?></td>
										<td><img src="<?= $data->bukti_transfer ?>"></td>
										<td><?= $data->perihal ?></td>
										<td><?= $data->nama_lengkap ?></td>
										<td>Rp. <?= number_format($data->jumlah_transfer,0,',','.') ?></td>
										<td><?= date('d F Y', strtotime($data->date_created)) ?></td>
										<td>
											<a href="<?= base_url($data->bukti_transfer) ?>" class="btn btn-sm btn-primary" download="<?= str_replace('/upload/file/', '',$data->bukti_transfer) ?>"><i class="fa fa-download"></i> Download</a>
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