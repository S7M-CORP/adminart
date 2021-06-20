
<?php
include "../koneksi.php";

// mendapatkan id yang di kirim dari url
$id = $_GET['id'];

// query hapus data dari tbl_barang berdasarkan id-barang
$sql = $koneksi->query("DELETE FROM tbl_barang WHERE id_barang = '$id'");

// kalo sudah dihapus redirect ke halaman barang

	echo "<script>location='barang.php'</script>";

 ?>