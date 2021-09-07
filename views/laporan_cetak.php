<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Laporan Karyawan Asrama Putri</title>
</head>

<body>
    <center>
        <img src="../src/logos.png" width="180px" alt=""><br>
        <font size="5"><b>Laporan Penjualan</b></font><br>
        <br>
        <table border="1">
            <thead class="thead-light">
                <tr>

                    <th scope="col">No</th>
                    <th scope="col">Kode Transaksi</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Nama Pelanggan</th>
                    <th scope="col">Total Bayar</th>
                    <th scope="col">Bayar</th>
                    <th scope="col">Kembalian</th>
                    <th scope="col">Kasir</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include "../koneksi.php";
                $no = 1;
                $awal = $_GET['awal'];
                $akhir = $_GET['akhir'];
                $query = $koneksi->query("select * from tbl_transaksi where tgl_transaksi between '$awal' and '$akhir'");

                while ($data = $query->fetch_assoc()) { ?>

                    <tr>
                        <th scope="row"><?php echo $no ?></th>
                        <td><?php echo $data['kd_transaksi'] ?></td>
                        <td><?php echo $data['tgl_transaksi'] ?></td>
                        <td><?php echo $data['nama_pelanggan'] ?></td>
                        <td>Rp. <?php echo number_format($data['total_bayar']) ?></td>
                        <td>Rp. <?php echo number_format($data['bayar']) ?></td>
                        <td>Rp. <?php echo number_format($data['kembalian']) ?></td>
                        <td><?php echo $data['kasir'] ?></td>
                    </tr>
                <?php $no++;
                }
                ?>
            </tbody>
        </table>
    </center>
    <script>
        window.print();
    </script>
</body>

</html>