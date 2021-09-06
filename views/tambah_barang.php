<?php
session_start();
$id_barang = $_GET['id'];

if (isset($_SESSION['keranjang'][$id_barang])) {
    $_SESSION['keranjang'][$id_barang] += 1;
} else {
    $_SESSION['keranjang'][$id_barang] = 1;
}

echo "<script>alert('Barang berhasil ditambahkan !);</script>";
echo "<script>location='transaksi.php'</script>";
