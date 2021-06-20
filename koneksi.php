<?php

$host = "localhost";
$username = "root";
$password = "";
$databasename = "db_pos";

$koneksi = mysqli_connect($host, $username, $password) or die("Kesalahan Koneksi..!!");
mysqli_select_db($koneksi,$databasename) or die("Databasenya Erorr");

?>