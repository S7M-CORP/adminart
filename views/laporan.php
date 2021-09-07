<?php
include "_header.php";
include "_menu.php";
include "../koneksi.php";
?>
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <?php if (isset($_GET['id'])) { ?>
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Detail Transaksi : <?= $_GET['id'] ?></h4>
                    <br>
                    <a href="laporan.php" class="btn btn-success">Kembali</a>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead class="thead-light">
                            <tr>

                                <th scope="col">No</th>
                                <th scope="col">Nama Barang</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Jumlah</th>
                                <th scope="col">Total Harga</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            $total_bayar = 0;
                            $query = $koneksi->query("select * from tbl_transaksi_detail a join tbl_barang b on a.id_barang=b.id_barang where a.kd_transaksi = '" . $_GET['id'] . "'");

                            while ($data = $query->fetch_assoc()) {
                                $total_bayar += $data["total_harga"];
                            ?>

                                <tr>
                                    <th scope="row"><?php echo $no ?></th>
                                    <td><?php echo $data['nama_barang'] ?></td>
                                    <td>Rp. <?php echo number_format($data['harga']) ?></td>
                                    <td><?php echo $data['qty'] ?></td>
                                    <td>Rp. <?php echo number_format($data['total_harga']) ?></td>
                                </tr>
                            <?php $no++;
                            }
                            ?>
                            <tr>
                                <td colspan="4"><b>Total Bayar</b></td>
                                <td><b>Rp. <?= number_format($total_bayar) ?></b></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    <?php } else { ?>
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Laporan Penjualan</h4><br>
                    <form class="row" action="laporan_cetak.php" method="GET">
                        <div class="col-12">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-dark">Tanggal Awal</label>
                                <div class="col-sm-10">
                                    <input type="date" name="awal" class="form-control">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-dark">Tanggal Akhir</label>
                                <div class="col-sm-10">
                                    <input type="date" name="akhir" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <center><button type="submit" class="btn btn-success">Cetak Laporan</button></center>
                        </div>
                    </form>
                </div>
                <div class="table-responsive">
                    <table class="table">
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
                                <th scope="col">Aksi</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            $query = $koneksi->query("select * from tbl_transaksi order by kd_transaksi desc");

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

                                    <td>
                                        <a href="laporan.php?id=<?= $data['kd_transaksi'] ?>" class="btn btn-primary">Lihat</a>
                                    </td>
                                </tr>
                            <?php $no++;
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    <?php } ?>


    <?php
    include "_footer.php";
    ?>