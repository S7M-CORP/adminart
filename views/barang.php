<?php 
include "_header.php";
include "_menu.php";
include "../koneksi.php";

if(isset($_POST['tambahbrg'])){
    $kd_barang = $_POST['kd_barang'];
    $nama_barang = $_POST['nama_barang'];
    $id_supplier = $_POST['id_supplier'];
    $id_satuan = $_POST['id_satuan'];
    $harga_beli = $_POST['harga_beli'];
    $harga_jual = $_POST['harga_jual'];
    $stok = $_POST['stok'];

    $tambah = mysqli_query($koneksi,"insert into tbl_barang (kd_barang, nama_barang, id_supplier, id_satuan, harga_beli, harga_jual, stok) values('$kd_barang','$nama_barang','$id_supplier','$id_satuan','$harga_beli','$harga_jual','$stok')");

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
                                <h4 class="card-title">Data Barang</h4>
                                <br>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Tambah Barang</button>

                                <!-- sample modal content -->
                                <div id="myModal" class="modal fade" tabindex="-1" role="dialog"
                                    aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel">Tambah Data Barang</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-hidden="true">×</button>
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
                                                        <input class="form-control" id="id_supplier" type="text" name="id_supplier" required>
                                                    </div>
                                                     <div class="form-group">
                                                        <label class="text-dark" for="id_satuan">Satuan</label>
                                                        <input class="form-control" id="id_satuan" type="text" name="id_satuan" required>
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
                            </div>

                            <div class="table-responsive">
                                <table class="table">
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
                                        <?php $no=1;
                                            $query = $koneksi->query("select * from tbl_barang");

                                            while ($data = $query->fetch_assoc()) {

                                                $id_barang = $data['id_barang'];
                                                

                                                // echo "<pre>";
                                            // print_r($data);
                                            // echo "<pre>";
                                        ?>

                                        <tr>
                                            <th scope="row"><?php echo $no ?></th>
                                            <td><?php echo $data['kd_barang'] ?></td>
                                            <td><?php echo $data['nama_barang'] ?></td>
                                            <td><?php echo $data['id_supplier'] ?></td>
                                            <td><?php echo $data['id_satuan'] ?></td>
                                            <td><?php echo $data['harga_beli'] ?></td>
                                            <td><?php echo $data['harga_jual'] ?></td>
                                            <td><?php echo $data['stok'] ?></td>
                                            <td>
                                                <div class="dropdown sub-dropdown">
                                            <button class="btn btn-link text-muted dropdown-toggle" type="button"
                                                id="dd1" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
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
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->


<?php 
include "_footer.php";
?>