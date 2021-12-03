<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Daftar Pesanan</h1>
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
					<h6 class="m-0 font-weight-bold text-primary">Daftar Pesanan</h6>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
							<thead>
								<tr>
									<th>NO</th>
									<th>JENIS PESANAN</th>
									<th>NAMA PEMESAN</th>
									<th>NPM</th>
									<th>TANGGAL PESANAN</th>
									<th>ACTION</th>
								</tr>
							</thead>
							<tbody>
								<?php $no=1; ?>
								<?php foreach ($pesanan as $data) { ?>
									<tr>
										<td><?= $no++ ?></td>
										<td><?= $data->nama_produk ?></td>
										<td><?= $data->nama_lengkap ?></td>
										<td><?= $data->npm ?></td>
										<td><?= date('d F Y', strtotime($data->date_created)) ?></td>
										<td>
											<a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#ModalDetail-<?= $data->id_pemesanan ?>"><i class="fa fa-book"></i></a>
											<a href="<?= base_url('adminarea/delete_pemesanan/'.$data->id_pemesanan) ?>" onclick="return confirm('Anda yakin untuk menghapus pesanan ?')"  class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
											<a href="#" class="btn btn-sm btn-secondary" data-toggle="modal" data-target="#ModalProgress-<?= $data->id_pemesanan ?>">Progress</a>
										</td>
									</tr>
									<!-- Modal Detail -->
									<div class="modal fade" id="ModalDetail-<?= $data->id_pemesanan ?>" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel ?>" aria-hidden="true">
										<div class="modal-dialog modal-lg">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title">Detail Pesanan</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">
													<div class="row">
														<div class="col-sm-6">
															<div class="form-group">
																<label>Nama Lengkap</label>
																<input type="text" value="<?= $data->nama_lengkap ?>" readonly class="form-control">
															</div>
															<div class="form-group">
																<label>NPM</label>
																<input type="text" value="<?= $data->npm ?>" readonly class="form-control">
															</div>
															<div class="form-group">
																<label>Universitas</label>
																<input type="text" value="<?= $data->universitas ?>" readonly class="form-control">
															</div>
															<div class="form-group">
																<label>Fakultas</label>
																<input type="text" value="<?= $data->fakultas ?>" readonly class="form-control">
															</div>
															<div class="form-group">
																<label>Jurusan</label>
																<input type="text" value="<?= $data->jurusan ?>" readonly class="form-control">
															</div>
														</div>
														<div class="col-sm-6">
															<div class="form-group">
																<label>Judul Proposal</label>
																<input type="text" value="<?= $data->judul_proposal ?>" readonly class="form-control">
															</div>
															<div class="form-group">
																<label>Penurunan Plagiarisme</label>
																<input type="text" value="<?= $data->penurunan_plagiarisme ?>" readonly class="form-control">
															</div>
															<div class="form-group">
																<label>Nama Produk</label>
																<input type="text" value="<?= $data->nama_produk ?>" readonly class="form-control">
															</div>
															<div class="form-group">
																<label>Tanggal Pesanan Masuk</label>
																<input type="text" value="<?= $data->date_created ?>" readonly class="form-control">
															</div>
														</div>
														<div class="col-sm-12">
															<div class="form-group">
																<label>Pesan</label>
																<textarea readonly class="form-control"><?= $data->pesan ?></textarea>
															</div>
															<?php if ($data->file_pedomanskripsi != "" || $data->file_pedomanskripsi != null): ?>
																<div class="form-group">
																	<label>File Pedoman Skripsi: </label>
																	<a href="<?= base_url($data->file_pedomanskripsi) ?>"><?= str_replace("/upload/file/", "", $data->file_pedomanskripsi) ?></a>
																</div>
															<?php endif ?>
															<?php if ($data->file_datapenelitian != "" || $data->file_datapenelitian != null): ?>
																<div class="form-group">
																	<label>Data Penelitian: </label>
																	<a href="<?= base_url($data->file_datapenelitian) ?>"><?= str_replace("/upload/file/", "", $data->file_datapenelitian) ?></a>
																</div>
															<?php endif ?>
															<?php if ($data->file_skripsiacc != "" || $data->file_skripsiacc != null): ?>
																<div class="form-group">
																	<label>File Skripsi: </label>
																	<a href="<?= base_url($data->file_skripsiacc) ?>"><?= str_replace("/upload/file/", "", $data->file_skripsiacc) ?></a>
																</div>
															<?php endif ?>
															<?php if ($data->file_proposalskripsi != "" || $data->file_proposalskripsi != null): ?>
																<div class="form-group">
																	<label>File Proposal Skripsi: </label>
																	<a href="<?= base_url($data->file_proposalskripsi) ?>"><?= str_replace("/upload/file/", "", $data->file_proposalskripsi) ?></a>
																</div>
															<?php endif ?>
															<?php if ($data->file_pharaphase != "" || $data->file_pharaphase != null): ?>
																<div class="form-group">
																	<label>File Pharaphase: </label>
																	<a href="<?= base_url($data->file_pharaphase) ?>"><?= str_replace("/upload/file/", "", $data->file_pharaphase) ?></a>
																</div>
															<?php endif ?>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="modal fade" id="ModalProgress-<?= $data->id_pemesanan ?>" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel ?>" aria-hidden="true">
										<div class="modal-dialog modal-md">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title">Detail Progress</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">
													<div class="row">
														<div class="col-12 mb-3">
															<h5>Persentase Pengerjaan</h5>
														</div>
														<div class="col-sm-12">
															<form action="<?= base_url('adminarea/update_progress/'.$data->id_pemesanan)?>" method="post">
																<div class="form-group">
																	<label>Sudah Berapa Persen Pengerjaan?</label>
																	<input type="number" value="<?= $data->progress ?>" name="progress" class="form-control">
																	<span class="form-text">Hanya inputkan angka</span>
																	<input type="hidden" name="id_pemesanan" value="<?= $data->id_pemesanan ?>">
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
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>