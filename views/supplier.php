<?php 
include "_header.php";
include "_menu.php";
include "../koneksi.php";

if(isset($_POST['tambahsupplier'])){
    $nama_supplier = $_POST['nama_supplier'];
    $no_telp = $_POST['no_telp'];
    $alamat = $_POST['alamat'];
    $deskripsi = $_POST['deskripsi'];

    $tambah = mysqli_query($koneksi,"insert into tbl_supplier (nama_supplier, no_telp, alamat, deskripsi) values('$nama_supplier','$no_telp','$alamat','$deskripsi')");

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
                                <h4 class="card-title">Data Supplier</h4>
                                <br>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Tambah Supplier</button>

                                <!-- sample modal content -->
                                <div id="myModal" class="modal fade" tabindex="-1" role="dialog"
                                    aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel">Tambah Data Supplier</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-hidden="true">×</button>
                                            </div>
                                            <form method="post">
                                            <div class="modal-body">
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label class="text-dark" for="nama_supplier">Nama Supplier</label>
                                                        <input class="form-control" id="nama_supplier" type="text" name="nama_supplier" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="text-dark" for="no_telp">No.Telp</label>
                                                        <input class="form-control" id="no_telp" type="text" name="no_telp" required>
                                                    </div>
                                                     <div class="form-group">
                                                        <label class="text-dark" for="alamat">Alamat</label>
                                                        <input class="form-control" id="alamat" type="text" name="alamat" required>
                                                    </div>
                                                     <div class="form-group">
                                                        <label class="text-dark" for="deskripsi">Deskripsi</label>
                                                        <input class="form-control" id="deskripsi" type="text" name="deskripsi" required>
                                                    </div> 
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="reset" class="btn btn-light">Reset</button>
                                                <button type="submit" class="btn btn-primary" name="tambahsupplier">Simpan</button>
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
                                            <th scope="col">Nama Supplier</th>
                                            <th scope="col">No.Telp</th>
                                            <th scope="col">Alamat</th>
                                            <th scope="col">Deskripsi</th>
                                            <th scope="col">Aksi</th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no=1;
                                            $query = $koneksi->query("select * from tbl_supplier");

                                            while ($data = $query->fetch_assoc()) {
                                                
                                                 $id_supplier = $data['id_supplier'];

                                                // echo "<pre>";
                                            // print_r($data);
                                            // echo "<pre>";
                                        ?>

                                        <tr>
                                            <th scope="row"><?php echo $no ?></th>
                                            <td><?php echo $data['nama_supplier'] ?></td>
                                            <td><?php echo $data['no_telp'] ?></td>
                                            <td><?php echo $data['alamat'] ?></td>
                                            <td><?php echo $data['deskripsi'] ?></td>

                                            
                                            <td>
                                                <div class="dropdown sub-dropdown">
                                            <button class="btn btn-link text-muted dropdown-toggle" type="button"
                                                id="dd1" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                <i data-feather="more-vertical"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dd1">
                                                <a class="dropdown-item" href="edit_supplier.php?id=<?= $id_supplier ?>">Edit</a>
                                                <a class="dropdown-item" onclick="return confirm('yakin akan menghapus data ini ?')" href="hapus_supplier.php?id=<?= $id_supplier ?>">Hapus</a>
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