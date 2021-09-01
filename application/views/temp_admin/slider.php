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
		<h1 class="h3 mb-0 text-gray-800">Data Slider</h1>
		<a href="<?=base_url('adminarea/add_slider') ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Tambah Slider</a>
	</div>

	<!-- Content Row -->
	<div class="row">
		<div class="col-12">
			<div class="card shadow">
				<div class="card-header">
					<h6 class="m-0 font-weight-bold text-primary">Data Slider</h6>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
							<thead>
								<tr>
									<th>NO</th>
									<th>FILE</th>
									<th>TANGGAL UPLOAD</th>
									<th>ACTION</th>
								</tr>
							</thead>
							<tbody>
								<?php $no=1; ?>
								<?php foreach ($slider as $data) { ?>
									<tr>
										<td><?= $no++ ?></td>
										<td><img src="<?= base_url($data->file); ?>" width="75"></td>
										<td><?= date('d F Y', strtotime($data->date_created)) ?></td>
										<td>
											<a href="<?= base_url('adminarea/edit_slider/'.$data->id) ?>" class="btn btn-sm btn-primary"><i class="fa fa-pen"></i></a>
											<a href="<?= base_url('adminarea/delete_slider/'.$data->id) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Anda yakin ingin menghapus slider?')"><i class="fa fa-trash"></i></a>
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