
<?php 
$data_product = $this->db->get('produk')->result();
// return $data_product;
?>
<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Staff</h1>
		<a href="#" data-toggle="modal" data-target="#ModalAddStaff" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-users fa-sm text-white-50"></i> Tambah Staff</a>
	</div>
	<div class="modal fade" id="ModalAddStaff" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-md">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Tambah Data Staff</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-12 mb-3">
							<h5>Data Staff</h5>
						</div>
						<div class="col-sm-12">
							<form action="<?= base_url('adminarea/add_staff')?>" method="post" enctype="multipart/form-data">
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<label>Username</label>
											<input type="text" name="username" class="form-control" required>
										</div>
										<div class="form-group">
											<label>Password</label>
											<input type="password" name="password" class="form-control" required>
										</div>
										<div class="form-group">
											<label>Email</label>
											<input type="email" name="email" class="form-control" required>
										</div>
										<div class="form-group">
											<label>No. HP</label>
											<input type="text" name="phone" class="form-control" required>
										</div>
										<div class="form-group">
											<label>Nama Depan</label>
											<input type="text" name="nama_depan" class="form-control" required>
										</div>
										<div class="form-group">
											<label>Nama Belakang</label>
											<input type="text" name="nama_belakang" class="form-control" required>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label>Alamat</label>
											<textarea name="alamat" class="form-control" required></textarea>
										</div>
										<div class="form-group">
											<label>Posisi/Jabatan</label>
											<input type="text" name="posisi" class="form-control" required>
										</div>
										<div class="form-group">
											<label>Bidang Pekerjaan</label>
											<select name="bidang_kerja" class="form-control">
												<?php foreach ($data_product as $product) { ?>
													<option value="<?=$product->id_produk?>"><?=$product->nama_produk?></option>
												<?php } ?>
											</select>
										</div>
										<div class="form-group">
											<label>NIP</label>
											<input type="text" name="nip" class="form-control" required>
										</div>
										<div class="form-group">
											<label>Tanggal Lahir</label>
											<input type="date" name="tanggal_lahir" class="form-control" required>
										</div>
										<div class="form-group">
											<label>KTP</label>
											<input type="file" name="ktp" class="form-control">
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
					<h6 class="m-0 font-weight-bold text-primary">Staff</h6>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
							<thead>
								<tr>
									<th>NO</th>
									<th>USERNAME</th>
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
										<td><?= $data->username; ?></td>
										<td><?= $data->email;  ?></td>
										<td><?= $data->phone; ?></td>
										<td>
											<a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#ModalDetail-Staff<?=$data->id_user?>" ><i class="fa fa-book"></i></a>
											<a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#ModalEdit-Staff<?=$data->id_user?>" ><i class="fa fa-pen"></i></a>
											<a href="<?= base_url('adminarea/delete_staff/'.$data->id_user) ?>" onclick="return confirm('Anda yakin untuk menghapus data ?')"  class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
										</td>
									</tr>
									<!-- MODAL EDIT -->
									<div class="modal fade" id="ModalEdit-Staff<?= $data->id_user?>" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
										<div class="modal-dialog modal-md">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title">Edit Data Staff</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">
													<div class="row">
														<div class="col-12 mb-3">
															<h5>Data Staff</h5>
														</div>
														<div class="col-sm-12">
															<form action="<?= base_url('adminarea/update_staff')?>" method="post" enctype="multipart/form-data">
																<div class="row">
																	<div class="col-sm-6">
																		<div class="form-group">
																			<label>Username</label>
																			<input type="text" name="username" class="form-control" required value="<?=$data->username?>">
																			<input type="hidden" name="id_user" value="<?= $data->id_user ?>">
																			<input type="hidden" name="id_profile" value="<?= $data->id_profile?>">
																		</div>
																		<div class="form-group">
																			<label>Password (Kosongkan jika tidak diganti)</label>
																			<input type="password" name="password" class="form-control">
																			<input type="hidden" name="password_lama" value="<?= $data->password ?>">
																		</div>
																		<div class="form-group">
																			<label>Email</label>
																			<input type="email" name="email" class="form-control" value="<?=$data->email?>">
																		</div>
																		<div class="form-group">
																			<label>No. HP</label>
																			<input type="text" name="phone" class="form-control" required value="<?=$data->phone?>">
																		</div>
																		<div class="form-group">
																			<label>Nama Depan</label>
																			<input type="text" name="nama_depan" class="form-control" required value="<?=$data->nama_depan?>">
																		</div>
																		<div class="form-group">
																			<label>Nama Belakang</label>
																			<input type="text" name="nama_belakang" class="form-control" required value="<?=$data->nama_belakang?>">
																		</div>
																	</div>
																	<div class="col-sm-6">
																		<div class="form-group">
																			<label>Alamat</label>
																			<textarea name="alamat" class="form-control" required><?=$data->alamat?></textarea>
																		</div>
																		<div class="form-group">
																			<label>Posisi/Jabatan</label>
																			<input type="text" name="posisi" class="form-control" required value="<?=$data->jurusan?>">
																		</div>
																		<div class="form-group">
																			<label>Bidang Kerja</label>
																			<select name="bidang_kerja" class="form-control">
																					<?php foreach ($data_product as $product) { ?>
																						<option value="<?=$product->id_produk; ?>"
																							<?php if ($product->id_produk == $data->bidang_kerja ) { echo "selected"; } ?>
																							><?=$product->nama_produk?></option>
																					<?php } ?>
																			</select>
																		</div>
																		<div class="form-group">
																			<label>NIP</label>
																			<input type="text" name="nip" class="form-control" required value="<?=$data->npm_nim?>">
																		</div>
																		<div class="form-group">
																			<label>Tanggal Lahir</label>
																			<input type="date" name="tanggal_lahir" class="form-control" required value="<?=$data->tanggal_lahir?>">
																		</div>
																		<div class="form-group">
																			<label>KTP (Kosongkan jika tidak diganti)</label>
																			<input type="file" name="ktp" class="form-control">
																			<input type="hidden" name="ktp_lama" value="<?= $data->ktp ?>">
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
									<div class="modal fade" id="ModalDetail-Staff<?= $data->id_user?>" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
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
																		<label><b>Bidang Kerja</b></label><br>
																		<?=$data->bidang_kerja?>
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