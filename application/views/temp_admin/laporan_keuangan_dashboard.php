<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Keuangan</h1>
		<a href="#" data-toggle="modal" data-target="#ModalAddKeuangan" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="far fa-file-pdf fa-sm text-white-50"></i> Tambah Keuangan</a>
	</div>
	<div class="modal fade" id="ModalAddKeuangan" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-md">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Tambah Data Keuangan</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-12 mb-3">
							<h5>Data Keuangan</h5>
						</div>
						<div class="col-sm-12">
							<form action="<?= base_url('adminarea/add_keuangan')?>" method="post" enctype="multipart/form-data">
								<div class="row">
									<div class="col-sm-12">
										<div class="form-group">
											<label>Nama Data</label>
											<input type="text" name="judul_laporankeuangan" class="form-control" required required>
										</div>
										<div class="form-group">
											<label>Keterangan</label>
											<textarea class="form-control" name="keterangan_laporankeuangan" required></textarea>
										</div>
										<div class="form-group">
											<label>File</label>
											<input type="file" name="file_laporankeuangan" class="form-control">
										</div>
										<div class="form-group">
											<label>Image Cover (Kosongkan jika tidak diubah)</label>
											<input type="file" name="image_laporankeuangan" class="form-control">
										</div>
									</div>
								</div>
								<div class="form-group">
									<button type="submit" class="btn btn-sm btn-primary">Submit</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
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
					<h6 class="m-0 font-weight-bold text-primary">Laporan Keuangan</h6>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
							<thead>
								<tr>
									<th>NO</th>
									<th>JUDUL</th>
									<th>KETERANGAN</th>
									<th>FILE</th>
									<th>IMAGE COVER</th>
									<th>ACTION</th>
								</tr>
							</thead>
							<tbody>
								<?php $no=1; ?>
								<?php foreach ($keuangan as $data) { ?>
									<tr>
										<td><?= $no++ ?></td>
										<td><?= $data->judul_laporankeuangan; ?></td>
										<td><?= $data->keterangan_laporankeuangan;  ?></td>
										<td><a href="<?= base_url($data->file_laporankeuangan); ?>"><i class="far fa-file-pdf"></i> Lihat File</a></td>
										<td><img src="<?= base_url($data->image_laporankeuangan) ?>" width="150px"></td>
										<td>
											<a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#ModalDetail-Keuangan<?=$data->id_laporankeuangan?>" ><i class="fa fa-book"></i></a>
											<a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#ModalEdit-Keuangan<?=$data->id_laporankeuangan?>" ><i class="fa fa-pen"></i></a>
											<a href="<?= base_url('adminarea/delete_keuangan/'.$data->id_laporankeuangan) ?>" onclick="return confirm('Anda yakin untuk menghapus data ?')"  class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
										</td>
									</tr>
									<!-- MODAL EDIT -->
									<div class="modal fade" id="ModalEdit-Keuangan<?= $data->id_laporankeuangan?>" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
										<div class="modal-dialog modal-md">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title">Edit <?= $data->judul_laporankeuangan; ?></h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">
													<div class="row">
														<div class="col-12 mb-3">
															<h5>Data Keuangan</h5>
														</div>
														<div class="col-sm-12">
															<form action="<?= base_url('adminarea/update_keuangan')?>" method="post" enctype="multipart/form-data">
																<div class="row">
																	<div class="col-sm-12">
																		<div class="form-group">
																			<label>Nama Data</label>
																			<input type="text" name="judul_laporankeuangan" class="form-control" required value="<?=$data->judul_laporankeuangan?>" required>
																			<input type="hidden" name="id_laporankeuangan" value="<?= $data->id_laporankeuangan ?>">
																		</div>
																		<div class="form-group">
																			<label>Keterangan</label>
																			<textarea class="form-control" name="keterangan_laporankeuangan" required><?= $data->keterangan_laporankeuangan; ?></textarea>
																		</div>
																		<div class="form-group">
																			<label>File (Kosongkan jika tidak diubah)</label>
																			<input type="file" name="file_laporankeuangan" class="form-control">
																			<input type="hidden" name="file_laporankeuangan_old" value="<?= $data->file_laporankeuangan ?>">
																		</div>
																		<div class="form-group">
																			<label>Image Cover (Kosongkan jika tidak diubah)</label>
																			<input type="file" name="image_laporankeuangan" class="form-control">
																			<input type="hidden" name="image_laporankeuangan_old" class="form-control" value="<?= $data->image_laporankeuangan ?>">
																		</div>
																	</div>
																</div>
																<div class="form-group">
																	<button type="submit" class="btn btn-sm btn-primary">Submit</button>
																</div>
															</form>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>

									<!-- MODAL DETAIL -->
									<div class="modal fade" id="ModalDetail-Keuangan<?= $data->id_laporankeuangan?>" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
										<div class="modal-dialog modal-md">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title"><?= $data->judul_laporankeuangan ?></h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">
													<div class="row">
														<div class="col-sm-12">
															<div class="row">
																<div class="col-sm-12">
																	<label style="font-weight: 600;">Nama Data</label>
																	<div><?= $data->judul_laporankeuangan ?></div>
																	<hr>

																	<label style="font-weight: 600;">Keterangan</label>
																	<div><?= $data->keterangan_laporankeuangan; ?></div>
																	<hr>

																	<label style="font-weight: 600;">File</label>
																	<div><a href="<?= base_url($data->file_laporankeuangan); ?>"><i class="far fa-file-pdf"></i> Lihat File</a></div>
																	<hr>

																	<label style="font-weight: 600;">Image Cover</label>
																	<div><img src="<?= base_url($data->image_laporankeuangan) ?>" width="100%"></div>
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