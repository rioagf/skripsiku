<?php
	// Jumlah
	$this->db->select("COUNT(*) as jumlah_pesanan");
	if ($this->session->userdata("role") != "admin") {
		$this->db->where("id_produk", $this->session->userdata("bidang_kerja"));
	}
	$jumlah_pesanan = $this->db->get('pemesanan');

	// Jumlah Berkas Masuk
	$this->db->select("COUNT(*) as jumlah_berkas_masuk");
	$this->db->join('pemesanan', 'pemesanan.id_pemesanan = berkas_keluar.id_pemesanan');
	$this->db->join('produk', 'produk.id_produk = pemesanan.id_produk');
	$this->db->join('users', 'users.id_user = berkas_keluar.id_user');
	$this->db->join('profile', 'berkas_keluar.id_user = profile.id_users');
	if ($this->session->userdata("role") != "admin") {
		$this->db->where(array('status_dokumen' => 'Dokumen Keluar Pemesan', 'produk.id_produk' => $this->session->userdata("bidang_kerja")));
	} else {
		$this->db->where(array('status_dokumen' => 'Dokumen Keluar Pemesan'));
	}
	$jumlah_berkas_masuk = $this->db->get('berkas_keluar');

	// Jumlah Berkas Keluar
	$this->db->select("COUNT(*) as jumlah_berkas_keluar");
	$this->db->join('pemesanan', 'pemesanan.id_pemesanan = berkas_keluar.id_pemesanan');
	$this->db->join('produk', 'produk.id_produk = pemesanan.id_produk');
	$this->db->join('users', 'users.id_user = berkas_keluar.id_user');
	$this->db->join('profile', 'berkas_keluar.id_user = profile.id_users');
	if ($this->session->userdata("role") != "admin") {
		$this->db->where(array('status_dokumen' => 'Dokumen Masuk Pemesan', 'produk.id_produk' => $this->session->userdata("bidang_kerja")));
	} else {
		$this->db->where(array('status_dokumen' => 'Dokumen Masuk Pemesan'));
	}
	$jumlah_berkas_keluar = $this->db->get('berkas_keluar');

	// Jumlah Belum 100 Persen
	if ($this->session->userdata("role") != "admin") {
		$belum_seratus_persen = $this->db->query("SELECT COUNT(*) as belum_seratus_persen FROM `pemesanan` WHERE `progress` < 100 AND `id_produk` = ".$this->session->userdata('bidang_kerja')." OR `progress` = null AND `id_produk` = 6");
	} else {
		$this->db->select("COUNT(*) as belum_seratus_persen");
		$this->db->where(array("progress <" => 100));
		$this->db->or_where(array("progress" => null));
		$belum_seratus_persen = $this->db->get('pemesanan');
	}

	//Get Berkas Masuk
	if ($this->session->userdata('role') == 'admin') {
		$this->db->select('pemesanan.id_pemesanan, pemesanan.nama_lengkap, pemesanan.id_pemesanan, pemesanan.npm, pemesanan.id_produk, produk.nama_produk, berkas_keluar.*');
		$this->db->join('pemesanan', 'pemesanan.id_pemesanan = berkas_keluar.id_pemesanan');
		$this->db->join('produk', 'produk.id_produk = pemesanan.id_produk');
		$this->db->join('users', 'users.id_user = berkas_keluar.id_user');
		$this->db->join('profile', 'berkas_keluar.id_user = profile.id_users');
		$this->db->where(array('status_dokumen' => 'Dokumen Keluar Pemesan'));
		$this->db->order_by("date_created", "desc");
		$this->db->limit(10);
		$data_berkas_masuk = $this->db->get('berkas_keluar')->result();
	} else if ($this->session->userdata('role') == 'staff') {
		$this->db->select('pemesanan.id_pemesanan, pemesanan.nama_lengkap, pemesanan.id_pemesanan, pemesanan.npm, pemesanan.id_produk, produk.nama_produk, berkas_keluar.*');
		$this->db->join('pemesanan', 'pemesanan.id_pemesanan = berkas_keluar.id_pemesanan');
		$this->db->join('produk', 'produk.id_produk = pemesanan.id_produk');
		$this->db->join('users', 'users.id_user = berkas_keluar.id_user');
		$this->db->join('profile', 'berkas_keluar.id_user = profile.id_users');
		$this->db->where(array('status_dokumen' => 'Dokumen Keluar Pemesan', 'produk.id_produk' => $this->session->userdata("bidang_kerja")));
		$this->db->order_by("date_created", "desc");
		$this->db->limit(10);
		$data_berkas_masuk = $this->db->get('berkas_keluar')->result();
	}

	// List Pesanan Masuk
	if ($this->session->userdata('role') == 'admin') {
		$this->db->select('nama_produk, pemesanan.*');
		$this->db->join('produk', 'produk.id_produk = pemesanan.id_produk');
		$this->db->order_by("date_created", "desc");
		$this->db->limit(10);
		$data_pesanan = $this->db->get('pemesanan')->result();
	}else if ($this->session->userdata('role') == 'staff') {
		$this->db->select('nama_produk, pemesanan.*');
		$this->db->join('produk', 'produk.id_produk = pemesanan.id_produk');
		$this->db->order_by("date_created", "desc");
		$this->db->limit(10);
		$this->db->where('produk.id_produk', $this->session->userdata("bidang_kerja"));
		$data_pesanan = $this->db->get('pemesanan')->result();
	}
?>

<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
	</div>

	<!-- Content Row -->
	<div class="row">

		<!-- Earnings (Monthly) Card Example -->
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-primary shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-primary text-uppercase mb-1"> Jumlah Pesanan</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800">
								<?php
									$data = $jumlah_pesanan->row();
									echo $data->jumlah_pesanan;
								?>
							</div>
						</div>
						<div class="col-auto">
							<i class="fas fa-book fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Earnings (Monthly) Card Example -->
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-success shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-success text-uppercase mb-1"> Jumlah Berkas Masuk</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800">
								<?php
									$data = $jumlah_berkas_masuk->row();
									echo $data->jumlah_berkas_masuk;
								?>
							</div>
						</div>
						<div class="col-auto">
							<i class="fas fa-file fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Earnings (Monthly) Card Example -->
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-info shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-info text-uppercase mb-1"> Jumlah Berkas Keluar</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800">
								<?php
									$data = $jumlah_berkas_keluar->row();
									echo $data->jumlah_berkas_keluar;
								?>
							</div>
						</div>
						<div class="col-auto">
							<i class="fas fa-file fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Pending Requests Card Example -->
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-warning shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-warning text-uppercase mb-1"> Pesanan Belum 100%</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800">
								<?php
									$data = $belum_seratus_persen->row();
									echo $data->belum_seratus_persen;
								?>
							</div>
						</div>
						<div class="col-auto">
							<i class="fas fa-comments fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Content Row -->

	<div class="row">

		<!-- Area Chart -->
		<div class="col-xl-6 col-lg-6">
			<div class="card shadow mb-4">
				<!-- Card Header - Dropdown -->
				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
					<h6 class="m-0 font-weight-bold text-primary">Pesanan Terbaru</h6>
					<div class="dropdown no-arrow">
						<a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
						</a>
					</div>
				</div>
				<!-- Card Body -->
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-bordered" width="100%" cellspacing="0">
							<thead>
								<tr>
									<th>NO</th>
									<th>JENIS PESANAN</th>
									<th>NAMA PEMESAN</th>
								</tr>
							</thead>
							<tbody>
								<?php $no=1; ?>
								<?php foreach ($data_pesanan as $data) { ?>
									<tr>
										<td><?= $no++ ?></td>
										<td><?= $data->nama_produk ?></td>
										<td><?= $data->nama_lengkap ?></td>
									</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>

		<!-- Pie Chart -->
		<div class="col-xl-6 col-lg-6">
			<div class="card shadow mb-4">
				<!-- Card Header - Dropdown -->
				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
					<h6 class="m-0 font-weight-bold text-primary">Berkas Masuk Terbaru</h6>
					<div class="dropdown no-arrow">
						<a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
						</a>
					</div>
				</div>
				<!-- Card Body -->
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-bordered" width="100%" cellspacing="0">
							<thead>
								<tr>
									<th>NO</th>
									<th>NAMA BERKAS</th>
									<th>NAMA PEMESAN</th>
								</tr>
							</thead>
							<tbody>
								<?php $no=1; ?>
								<?php foreach ($data_berkas_masuk as $data) { ?>
									<tr>
										<td><?= $no++ ?></td>
										<td><?= str_replace('/upload/file/', '',$data->dokumen) ?></td>
										<td><?= $data->nama_lengkap ?></td>
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