<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Staff</h1>
	</div>

	<?php if ($this->session->flashdata('success')){ ?>
		<div class="alert alert-success alert-dismissible fade show" role="alert">
			<?= $this->session->flashdata('success'); ?>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		</div>
	<?php } elseif ($this->session->flashdata('error')) { ?>
		<div class="alert alert-danger alert-dismissible fade show" role="alert">
			<?= $this->session->flashdata('error'); ?>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		</div>
	<?php } ?>

	<!-- Content Row -->
	<div class="row">
		<div class="col-12">
			<div class="card shadow">
				<div class="card-header">
					<h6 class="m-0 font-weight-bold text-primary">Customer</h6>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
							<thead>
								<tr>
									<th>NO</th>
									<th>NAMA LENGKAP</th>
									<th>EMAIL</th>
									<th>PHONE</th>
									<th>ACTION</th>
								</tr>
							</thead>
							<tbody>
								<?php $no=1; ?>
								<?php foreach ($staff as $data) { ?>
									<tr>
										<td><?= $no++ ?></td>
										<td><?= $data->nama_depan.' '.$data->nama_belakang; ?></td>
										<td><?= $data->email;  ?></td>
										<td><?= $data->phone; ?></td>
										<td>
											<a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#ModalDetail-Customer<?=$data->id_user?>" ><i class="fa fa-book"></i></a>
											<a href="<?= base_url('adminarea/delete_customer/'.$data->id_user) ?>" onclick="return confirm('Anda yakin untuk menghapus data ?')"  class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
										</td>
									</tr>

									<!-- MODAL DETAIL -->
									<div class="modal fade" id="ModalCustomer-Staff<?= $data->id_user?>" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
										<div class="modal-dialog modal-md">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title">Data Staff</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">
													<div class="row">
														<div class="col-sm-12">
															<div class="row">
																<div class="col-sm-6">
																	<div class="form-group">
																		<label><b>Username</b></label><br>
																		<?=$data->username?>
																	</div>
																	<div class="form-group">
																		<label><b>Email</b></label><br>
																		<?=$data->email?>
																	</div>
																	<div class="form-group">
																		<label><b>No. HP</b></label><br>
																		<?=$data->phone?>
																	</div>
																	<div class="form-group">
																		<label><b>Nama Lengkap</b></label><br>
																		<?=$data->nama_depan.' '.$data->nama_belakang?>
																	</div>
																	<div class="form-group">
																		<label><b>Alamat</b></label><br>
																		<?=$data->alamat?>
																	</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<label><b>Posisi/Jabatan</b></label><br>
																		<?=$data->jurusan?>
																	</div>
																	<div class="form-group">
																		<label><b>NIP</b></label><br>
																		<?=$data->npm_nim?>
																	</div>
																	<div class="form-group">
																		<label><b>Tanggal Lahir</b></label><br>
																		<?= date('d F Y', strtotime($data->tanggal_lahir))?>
																	</div>
																	<div class="form-group">
																		<label><b>KTP</b></label><br>
																		<img src="<?= base_url($data->ktp) ?>" width="50%">
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>