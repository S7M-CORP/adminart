<?php
include "_header.php";
include "_menu.php";
include "../koneksi.php";

if (isset($_POST['tambahbrg'])) {
    $kd_barang = $_POST['kd_barang'];
    $nama_barang = $_POST['nama_barang'];
    $id_supplier = $_POST['id_supplier'];
    $satuan = $_POST['satuan'];
    $harga_beli = $_POST['harga_beli'];
    $harga_jual = $_POST['harga_jual'];
    $stok = $_POST['stok'];

    $tambah = mysqli_query($koneksi, "insert into tbl_barang (kd_barang, nama_barang, id_supplier, satuan, harga_beli, harga_jual, stok) values('$kd_barang','$nama_barang','$id_supplier','$satuan','$harga_beli','$harga_jual','$stok')");

    echo "<script>alert('Data berhasil di simpan')</script>";
}

?>
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h4 class="card-title">Data Barang</h4>
                    </div>
                    <div class="col-md-6 text-right">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Tambah Barang</button>
                    </div>
                </div>



                <!-- sample modal content -->
                <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel">Tambah Data Barang</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            </div>

                            <form method="post" id="formbrg">
                                <div class="modal-body">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="text-dark" for="kd_barang">Kode Barang</label>
                                            <input class="form-control" id="kd_barang" type="text" name="kd_barang" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="text-dark" for="nama_barang">Nama Barang</label>
                                            <input class="form-control" id="nama_barang" type="text" name="nama_barang" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="text-dark" for="id_supplier">Supplier</label>
                                            <select class="form-control" id="id_supplier" type="text" name="id_supplier" required>
                                                <option value="">-- Pilih --</option>
                                                <?php $sql = $koneksi->query("select * from tbl_supplier");
                                                while ($supp = $sql->fetch_assoc()) {
                                                    echo '<option value="' . $supp['id_supplier'] . '">' . $supp['nama_supplier'] . " | " . $supp['deskripsi'] . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="text-dark" for="satuan">Satuan</label>
                                            <input class="form-control" id="satuan" type="text" name="satuan" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="text-dark" for="harga_beli">Harga Beli</label>
                                            <input class="form-control" id="harga_beli" type="text" name="harga_beli" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="text-dark" for="harga_jual">Harga Jual</label>
                                            <input class="form-control" id="harga_jual" type="text" name="harga_jual" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="text-dark" for="stok">Stok</label>
                                            <input class="form-control" id="stok" type="text" name="stok" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="reset" class="btn btn-light">Reset</button>
                                    <button type="submit" class="btn btn-primary" name="tambahbrg" value="simpan">Simpan</button>
                                </div>
                        </div><!-- /.modal-content -->
                        </form>
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->

                <div class="table-responsive mt-4">
                    <table id="zero_config" class="table">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Kode Barang</th>
                                <th scope="col">Nama Barang</th>
                                <th scope="col">Supplier</th>
                                <th scope="col">Satuan</th>
                                <th scope="col">Harga Beli</th>
                                <th scope="col">Harga Jual</th>
                                <th scope="col">Stok</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            $query = $koneksi->query("select * from tbl_barang a join tbl_supplier b on a.id_supplier=b.id_supplier");

                            while ($data = $query->fetch_assoc()) {
                                $id_barang = $data['id_barang'];
                                if ($data['stok'] <= 0) {
                                    $color = 'class="bg-danger text-white"';
                                } else if ($data['stok'] <= 5) {
                                    $color = 'class="bg-warning text-white"';
                                } else if ($data['stok'] >= 5) {
                                    $color = '';
                                }
                            ?>

                                <tr <?= $color ?>>
                                    <th scope="row"><?php echo $no ?></th>
                                    <td><?php echo $data['kd_barang'] ?></td>
                                    <td><?php echo $data['nama_barang'] ?></td>
                                    <td><?php echo $data['nama_supplier'] ?></td>
                                    <td><?php echo $data['satuan'] ?></td>
                                    <td>Rp. <?php echo number_format($data['harga_beli']) ?></td>
                                    <td>Rp. <?php echo number_format($data['harga_jual']) ?></td>
                                    <td><?php echo $data['stok'] ?></td>
                                    <td>
                                        <div class="dropdown sub-dropdown">
                                            <button class="btn btn-link text-muted dropdown-toggle" type="button" id="dd1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i data-feather="more-vertical"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dd1">
                                                <a class="dropdown-item" href="edit_barang.php?id=<?= $id_barang ?>">Edit</a>
                                                <a class="dropdown-item" onclick="return confirm('yakin akan menghapus data ini ?')" href="hapus_barang.php?id=<?= $id_barang ?>">Hapus</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php $no++;
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <!-- *************************************************************** -->
                <!-- End Top Leader Table -->
                <!-- *************************************************************** -->
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->


        <?php
        include "_footer.php";
        ?>