<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Staff</h1>
		<a href="#" data-toggle="modal" data-target="#ModalAddStaff" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-users fa-sm text-white-50"></i> Tambah Staff</a>
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
					<h6 class="m-0 font-weight-bold text-primary">Artikel</h6>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
							<thead>
								<tr>
									<th>NO</th>
									<th>JUDUL ARTIKEL</th>
									<th>ISI KONTEN</th>
									<th>TANGGAL PUBLISH</th>
									<th>ACTION</th>
								</tr>
							</thead>
							<tbody>
								<?php $no=1; ?>
								<?php foreach ($artikel as $data) { ?>
									<tr>
										<td><?= $no++ ?></td>
										<td><?= $data->judul_artikel ?></td>
										<td><?= character_limiter($data->isi_konten, 120);  ?></td>
										<td><?= date('d F Y', strtotime($data->date_created)) ?></td>
										<td>
											<a href="<?= base_url('adminarea/detail_artikel/'.$data->id_artikel) ?>" class="btn btn-sm btn-success"><i class="fa fa-book"></i></a>
											<a href="<?= base_url('adminarea/edit_artikel/'.$data->id_artikel) ?>" class="btn btn-sm btn-primary"><i class="fa fa-pen"></i></a>
											<a href="<?= base_url('adminarea/delete_artikel/'.$data->id_artikel) ?>" onclick="return confirm('Anda yakin untuk menghapus data ?')"  class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
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