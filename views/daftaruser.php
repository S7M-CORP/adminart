<?php 
include "_header.php";
include "_menu.php";
include "../koneksi.php";

if(isset($_POST['tambahuser'])){
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $tambah = mysqli_query($koneksi,"insert into tbl_user (nama, email, password) values('$nama','$email','$password')");

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
                                <h4 class="card-title">Data User</h4>
                                <br>
                                 <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Tambah User</button>

                                <!-- sample modal content -->
                                <div id="myModal" class="modal fade" tabindex="-1" role="dialog"
                                    aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel">Tambah Data User</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-hidden="true">×</button>
                                            </div>

                                            <form method="post">
                                            <div class="modal-body">
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label class="text-dark" for="nama">Nama</label>
                                                        <input class="form-control" id="nama" type="text" name="nama" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="text-dark" for="email">Email</label>
                                                        <input class="form-control" id="email" type="text" name="email" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="text-dark" for="password">Password</label>
                                                        <input class="form-control" id="password" type="text" name="password" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="reset" class="btn btn-light">Reset</button>
                                                <button type="submit" class="btn btn-primary" name="tambahuser" value="simpan">Simpan</button>
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
                                            <th scope="col">Nama</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Password</th>
                                            <th scope="col">Aksi</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no=1;
                                            $query = $koneksi->query("select * from tbl_user");

                                            while ($data = $query->fetch_assoc()) {
                                                
                                                 $id_user = $data['id_user'];

                                                // echo "<pre>";
                                            // print_r($data);
                                            // echo "<pre>";
                                        ?>

                                        <tr>
                                            <th scope="row"><?php echo $no ?></th>
                                            <td><?php echo $data['nama'] ?></td>
                                            <td><?php echo $data['email'] ?></td>
                                            <td><?php echo $data['password'] ?></td>

                                        <td>
                                        <div class="dropdown sub-dropdown">
                                            <button class="btn btn-link text-muted dropdown-toggle" type="button"
                                                id="dd1" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                <i data-feather="more-vertical"></i>
                                            </button>

                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dd1">
                                                <a class="dropdown-item"  href="edit_user.php?id=<?= $id_user ?>">Edit</a>
                                                <a class="dropdown-item" onclick="return confirm('yakin akan menghapus data ini ?')" href="hapus_user.php?id=<?= $id_user ?>">Hapus</a>
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