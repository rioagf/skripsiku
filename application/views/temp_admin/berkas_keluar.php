<?php
$this->db->select('pemesanan.*, produk.id_produk, produk.nama_produk, berkas_keluar.*');
$this->db->join('berkas_keluar', 'berkas_keluar.id_pemesanan = pemesanan.id_pemesanan');
$this->db->join('produk', 'produk.id_produk = pemesanan.id_produk');
$this->db->group_by('pemesanan.id_pemesanan');
$data_pesanan = $this->db->get('pemesanan')->result();
?>

<?php
$this->db->join('profile', 'profile.id_users = users.id_user');
$this->db->where('users.user_role', 'user');
$id_user = $this->db->get('users')->result();
?>
<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Berkas Keluar</h1>
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

		<div class="row">
			<div class="col-12">
				<div class="card shadow">
					<div class="card-body">
						<form style="max-width: none;" action="<?= base_url('adminarea/proses_berkas_keluar') ?>" enctype="multipart/form-data" method="post">
							<div class="form-group">
								<label>Perihal</label>
								<select class="form-control" name="perihal">
									<optgroup label="Pilih Salah Satu">
										<option value="Revisi" selected="">Revisi</option>
										<option value="Pengiriman Berkas">Pengiriman Berkas</option>
									</optgroup>
								</select>
							</div>
							<div class="form-group">
								<label>Untuk Pesanan</label>
								<select class="form-control" name="id_pemesanan">
									<optgroup label="Pilih Salah Satu">
										<?php foreach ($data_pesanan as $pesanan): ?>
											<option value="<?= $pesanan->id_pemesanan ?>" selected=""><?= $pesanan->nama_lengkap.' - '.$pesanan->nama_produk.' - '.date("d F Y", strtotime($pesanan->date_created)) ?></option>
										<?php endforeach ?>
									</optgroup>
								</select>
							</div>
							<div class="form-group">
								<label>Atas Nama</label>
								<select class="form-control" name="id_user">
									<?php foreach ($id_user as $user): ?>
										<option value="<?= $user->id_user ?>" selected=""><?= $user->nama_depan.' '.$user->nama_belakang ?></option>
									<?php endforeach ?>
								</select>
							</div>
							<div class="form-group">
								<label>Upload File</label>
								<input class="form-control-file" type="file" name="dokumen" style="border-radius: 2px;border: 1px solid rgb(210,210,210);box-shadow: 0px 0px 0px 0px;padding: 3px 10px;">
							</div>
							<div class="form-group">
								<label>Progress Pengerjaan / Catatan</label>
								<textarea class="form-control" id="ckeditor" name="catatan" placeholder="Tulis progress anda disini"></textarea>
							</div>
							<div class="form-group">
								<button class="btn btn-primary" type="submit">Kirim</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- Content Row -->
		<div class="row">
			<div class="col-12">
				<div class="card shadow">
					<div class="card-header">
						<h6 class="m-0 font-weight-bold text-primary">Daftar Berkas Keluar</h6>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>NO</th>
										<th>BERKAS</th>
										<th>ID PEMESANAN</th>
										<th>JENIS PESANAN</th>
										<th>NAMA PEMESAN</th>
										<th>NPM</th>
										<th>TANGGAL KELUAR BERKAS</th>
										<th>ACTION</th>
									</tr>
								</thead>
								<tbody>
									<?php $no=1; ?>
									<?php foreach ($berkas_keluar as $data) { ?>
										<tr>
											<td><?= $no++ ?></td>
											<td><?= str_replace('/upload/file/', '',$data->dokumen) ?></td>
											<td><?= $data->id_pemesanan ?></td>
											<td><?= $data->nama_produk ?></td>
											<td><?= $data->nama_lengkap ?></td>
											<td><?= $data->npm ?></td>
											<td><?= date('d F Y', strtotime($data->date_created)) ?></td>
											<td>
												<a href="<?= base_url($data->dokumen) ?>" class="btn btn-sm btn-primary" download="<?= str_replace('/upload/file/', '',$data->dokumen) ?>"><i class="fa fa-download"></i> Download</a>
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