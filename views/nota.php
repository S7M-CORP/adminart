<?php
include '../koneksi.php';

$trx = $_GET['trx'];
$sql = $koneksi->query("select * from tbl_transaksi where kd_transaksi = '$trx'");
$data = $sql->fetch_assoc();
// print_r($data);
$tgl = $data['tgl_transaksi'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Nota Transaksi <?= $trx ?></title>
</head>

<body><br><br>
    <center>
        <p>TOKO INSAN<br>
            Kp. Tegalwaru Rt 010/004 Desa. Tegalwaru Kec. Tegalwaru, <br> Kabupaten Purwakarta, Jawa Barat 41165</p>
        -------------------------------------------------------------------------------------------- <br>
        <?= date('d.m.Y - H:i', strtotime($tgl)) ?> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Kasir : <?= $data['kasir'] ?><br>
        -------------------------------------------------------------------------------------------- <br>
        <table>
            <?php
            $query = $koneksi->query("select * from tbl_transaksi_detail a join tbl_barang b on a.id_barang=b.id_barang where kd_transaksi='$trx'");
            $total = 0;
            while ($brg = $query->fetch_assoc()) {
                $subharga = $brg['harga'] * $brg['qty'];
                $total += $subharga;
                echo "<tr>
                        <td width='300px'>" . strtoupper($brg['nama_barang']) . "</td>
                        <td width='30px'>" . $brg['qty'] . "</td>
                        <td width='50px'>" . $brg['harga_jual'] . "</td>
                        <td align='right' width='90px'>" . number_format($subharga) . "</td>
                    </tr>";
            }
            ?>
            <tr>
                <td colspan="4" align="right">-----------------------------------------</td>
            </tr>
            <tr>
                <td colspan="3" align="right"> TOTAL :</td>
                <td align="right"> <?= number_format($total) ?> </td>
            </tr>
            <tr>
                <td colspan="3" align="right"> TUNAI :</td>
                <td align="right"> <?= number_format($data['bayar']) ?> </td>
            </tr>
            <tr>
                <td colspan="3" align="right"> KEMBALIAN :</td>
                <td align="right"> <?= number_format($data['kembalian']) ?> </td>
            </tr>
            <tr>
                <td colspan="4" align="right">-----------------------------------------</td>
            </tr>
        </table><br><br><br>

        <p>Terimaksih telah belanja di Toko Insan :) <br> Datang lagi di lain waktu ya ...</p>

    </center>
</body>

</html>