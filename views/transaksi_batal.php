<?php
session_start();
unset($_SESSION['keranjang']);
echo "<script>location='transaksi.php'</script>";
