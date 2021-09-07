<?php
include "_header.php";
include "_menu.php";
include "../koneksi.php";

if (isset($_POST['simpan'])) {
	if (isset($_SESSION["keranjang"])) {
		$kd_transaksi 	= $_POST['kd_transaksi'];
		$nama_pelanggan = $_POST['nama_pelanggan'];
		$tgl_transaksi 	= $_POST['tgl_transaksi'];
		$kasir			= $_POST['kasir'];
		$total_bayar 	= $_POST['total_bayar'];
		$bayar 			= $_POST['bayar'];
		$kembalian 		= $_POST['kembalian'];

		// 1. simpan ke tabel transaksi
		$query_simpan = $koneksi->query("INSERT INTO tbl_transaksi (kd_transaksi, tgl_transaksi, kasir, nama_pelanggan, total_bayar, bayar, kembalian) VALUES ('$kd_transaksi',NOW(),'$kasir','$nama_pelanggan','$total_bayar','$bayar','$kembalian')");

		if ($query_simpan) {
			// 2. simpan ke detail transaksi
			foreach ($_SESSION["keranjang"] as $id_barang => $jumlah) {

				//mendapatkan data barang berdasarkan id_barang
				$ambil = $koneksi->query("SELECT * FROM tbl_barang WHERE id_barang ='$id_barang'");
				$perbarang = $ambil->fetch_assoc();

				$harga = $perbarang['harga_jual'];
				$total_harga = $perbarang['harga_jual'] * $jumlah;

				$koneksi->query("INSERT INTO tbl_transaksi_detail (kd_transaksi, id_barang, harga, qty, total_harga)
			VALUES ('$kd_transaksi','$id_barang','$harga','$jumlah','$total_harga')");

				//syntax update stok barang
				$koneksi->query("UPDATE tbl_barang SET stok = stok - $jumlah WHERE id_barang='$id_barang'");
			}

			//mengkosongkan keranjang belanja
			unset($_SESSION["keranjang"]);

			// tampilkan pesan jika berhasil
			echo "<script>alert('Tansaksi berhasil disimpan !')</script>";
			echo "<script>location='transaksi.php'</script>";
		} else {
			echo "<script>alert('Tansaksi gagal disimpan !')</script>";
			echo "<script>location='transaksi.php'</script>";
		}
	} else {
		echo "<script>alert('Tansaksi tidak bisa di proses, karena barang masih kosong !')</script>";
		echo "<script>location='transaksi.php'</script>";
	}
}
?>

<style>
	.select2-container .select2-selection--single {
		height: 34px !important;
		width: 700px !important;
	}

	.select2-container--default .select2-selection--single {
		border: 1px solid #ccc !important;
		border-radius: 0px !important;
	}
</style>

<div class="page-wrapper">
	<div class="col-12">
		<form method="POST" class="card">
			<div class="card-body">
				<h4 class="card-title mt-2">Form Transaksi</h4>
				<hr color="blue">
				<br>
				<!--  <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#myModal">Tambah Transaksi</button> -->

				<div class="row">
					<div class="col-6">
						<div class="form-group row">
							<label class="col-sm-4 col-form-label text-dark">Kode Transaksi</label>
							<div class="col-sm-8">
								<input type="text" name="kd_transaksi" class="form-control" value="TRX<?= date("dmyHi") ?>" readonly>
							</div>
						</div>

						<div class="form-group row">
							<label class="col-sm-4 col-form-label text-dark">Nama Pelanggan</label>
							<div class="col-sm-8">
								<input type="text" name="nama_pelanggan" placeholder="Input nama pelanggan" class="form-control border-success" required>
							</div>
						</div>
					</div>

					<div class="col-6">
						<div class="form-group row">
							<label class="col-sm-4 col-form-label text-dark">Tanggal Transaksi</label>
							<div class="col-sm-8">
								<input type="text" name="tgl_transaksi" value="<?= date('d-m-Y') ?>" class="form-control" readonly>
							</div>
						</div>

						<div class="form-group row">
							<label class="col-sm-4 col-form-label text-dark">Kasir</label>
							<div class="col-sm-8">
								<input type="text" name="kasir" value="<?= $_SESSION['akun']['nama'] ?>" class="form-control" readonly>
							</div>
						</div>
					</div>

					<div class="input-group mt-4 col-md-12">
						<select id="pencarian_barang" type="text" class="form-control">
							<option value=""></option>
							<?php $q = $koneksi->query("select * from tbl_barang where stok > '0'");
							while ($barang = $q->fetch_assoc()) { ?>
								<option data-id="<?= $barang['id_barang'] ?>" data-nama_barang="<?= $barang['nama_barang'] ?>" data-harga_beli="<?= $barang['harga_beli'] ?>" data-harga_jual="<?= $barang['harga_jual'] ?>" data-stok="<?= $barang['stok'] ?>" value="<?= $barang['id_barang'] ?>"><?= $barang['nama_barang'] ?></option>
							<?php } ?>
						</select>
						<div id="button_add" class="input-group-prepend"> </div>
					</div>

				</div>
				<br>
				<div class="row">
					<div class="col-md-3">
						<div class="form-group">
							<label class="text-dark">Nama Barang</label>
							<input id="nama_barang" type="text" class="form-control" readonly>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label class="text-dark">Harga Beli</label>
							<input id="harga_beli" type="text" class="form-control" readonly>
						</div>
					</div>

					<div class="col-md-3">
						<div class="form-group">
							<label class="text-dark">Harga Jual</label>
							<input id="harga_jual" type="text" class="form-control" readonly>
						</div>
					</div>

					<div class="col-md-3">
						<div class="form-group">
							<label class="text-dark">Stok</label>
							<input id="stok" type="text" class="form-control" readonly>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-12 mt-4">
						<div class="card">
							<div class="text-center card-header">
								<b>Daftar barang yang dibeli</b>
							</div>
							<table class="table card-body">
								<div class="row">
									<thead class="bg-warning text-white">
										<tr>
											<th scope="col">No</th>
											<th scope="col">Kode Barang</th>
											<th scope="col">Nama Barang</th>
											<th scope="col">Harga Barang</th>
											<th scope="col">Jumlah</th>
											<th scope="col">Total Harga</th>
											<th>Aksi</th>
										</tr>
									</thead>
									<tbody>
										<?php $nomor = 1;
										$total_harga = 0;
										if (isset($_SESSION["keranjang"])) {
											foreach ($_SESSION["keranjang"] as $id_barang => $jumlah) : ?>
												<!-- menampilkan barang berdasarkan id_barang-->
												<?php $ambil = $koneksi->query("SELECT * FROM tbl_barang WHERE id_barang = '$id_barang'");
												$pecah = $ambil->fetch_assoc();
												$total = $pecah["harga_jual"] * $jumlah;
												$total_harga += $total; ?>
												<tr>
													<td><?php echo $nomor; ?></td>
													<td><?php echo $pecah["kd_barang"]; ?></td>
													<td><?php echo $pecah["nama_barang"]; ?></td>
													<td>Rp. <?php echo number_format($pecah["harga_jual"]); ?></td>
													<td><?php echo $jumlah; ?></td>
													<td>Rp. <?php echo number_format($total); ?></td>
													<td><a href="transaksi_hapus.php?id=<?= $id_barang ?>" class="btn waves-effect waves-light btn-outline-danger"><i class="far fa-trash-alt"></i></a></td>
												</tr>
										<?php
												$nomor++;
											endforeach;
										} else {
											echo '<tr><td colspan="6"><center>Tidak ada data, Silahkan belanja dulu !</center></td></tr>';
										} ?>
									</tbody>
								</div>
							</table>
						</div>
						<!-- Card -->
					</div>
				</div>

				<hr>

				<div class="row">
					<div class="col-6">
						<button type="submit" class="btn btn-lg btn-block btn-success mt-4" name="simpan">Simpan</button>
						<a href="transaksi_batal.php" class="btn btn-block btn-lg btn-danger">Batal</a></button>

					</div>
					<div class="col-6">
						<div class="form-group row">
							<label class="col-sm-4 col-form-label text-dark">Total Bayar</label>
							<div class="col-sm-8">
								<input type="number" id="total_bayar" name="total_bayar" class="form-control" value="<?= $total_harga ?>">
							</div>
						</div>

						<div class="form-group row">
							<label class="col-sm-4 col-form-label text-dark">Bayar</label>
							<div class="col-sm-8">
								<input type="number" id="bayar" name="bayar" class="form-control" required>
							</div>
						</div>

						<div class="form-group row">
							<label class="col-sm-4 col-form-label text-dark">Kembalian</label>
							<div class="col-sm-8">
								<input type="number" id="kembalian" name="kembalian" class="form-control" required>
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function() {
		$("#pencarian_barang").on("change", function() {
			id = $(this).find(':selected').data('id');
			namabarang = $(this).find(':selected').data('nama_barang');
			harga_beli = $(this).find(':selected').data('harga_beli');
			harga_jual = $(this).find(':selected').data('harga_jual');
			stok = $(this).find(':selected').data('stok');

			$("#nama_barang").val(namabarang);
			$("#harga_beli").val(harga_beli);
			$("#harga_jual").val(harga_jual);
			$("#stok").val(stok);
			$("#button_add").html('<a href="tambah_barang.php?id=' + id + '" id="button_add" class="input-group-text btn btn-primary border-primary"><i class="fas fa-cart-plus"></i> </a>');
			// alert(namabarang);
		});

		$("#bayar").on("keyup", function() {
			var total_bayar = $("#total_bayar").val();
			var bayar = $("#bayar").val();

			var kembalian = parseInt(bayar) - parseInt(total_bayar);
			$("#kembalian").val(kembalian);
		});

		$('#pencarian_barang').select2({
			placeholder: "Cari barang..."
		});
	});
</script>

<?php
include "_footer.php";
?>