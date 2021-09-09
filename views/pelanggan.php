<?php
include "_header.php";
include "_menu.php";
include "../koneksi.php";

if (isset($_GET['id'])) {
    // mendapatkan id yang di kirim dari url
    $id = $_GET['id'];

    // query hapus data dari tbl_barang berdasarkan id-barang
    $sql = $koneksi->query("DELETE FROM tbl_pelanggan WHERE id_pelanggan = '$id'");

    // kalo sudah dihapus redirect ke halaman barang
    echo "<script>location='pelanggan.php'</script>";
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
            <div class="card-header bg-white">
                <div class="row mt-2">
                    <div class="col-md-6">
                        <h4 class="card-title">Data Pelanggan</h4>
                    </div>
                    <div class="col-md-6 text-right">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Tambah pelanggan</button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <!-- sample modal content -->
                <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel">Tambah Data Pelanggan</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            </div>
                            <div class="modal-body">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="text-dark" for="kd_barang">Nama Pelanggan</label>
                                        <input class="form-control" id="kd_barang" type="text" name="kd_barang" placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-dark" for="kd_barang">Alamat</label>
                                        <input class="form-control" id="kd_barang" type="text" name="kd_barang" placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-dark" for="kd_barang">No.Telp</label>
                                        <input class="form-control" id="kd_barang" type="text" name="kd_barang" placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light" data-dismiss="modal">Batal</button>
                                <button type="button" class="btn btn-primary">Simpan</button>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
                <div class="table-responsive">
                    <table id="zero_config" class="table">
                        <thead class="thead-light">
                            <tr>

                                <th scope="col">No</th>
                                <th scope="col">Nama Pelanggan</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">No.Telp</th>
                                <th scope="col">Aksi</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            $query = $koneksi->query("select * from tbl_pelanggan");

                            while ($data = $query->fetch_assoc()) {


                                // echo "<pre>";
                                // print_r($data);
                                // echo "<pre>";
                            ?>

                                <tr>
                                    <th scope="row"><?php echo $no ?></th>
                                    <td><?php echo $data['nama_pelanggan'] ?></td>
                                    <td><?php echo $data['alamat'] ?></td>
                                    <td><?php echo $data['no_telp'] ?></td>

                                    <td>
                                        <div class="dropdown sub-dropdown">
                                            <button class="btn btn-link text-muted dropdown-toggle" type="button" id="dd1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i data-feather="more-vertical"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dd1">
                                                <a class="dropdown-item" data-toggle="modal" data-target="#myModal">Edit</a>
                                                <a class="dropdown-item" href="pelanggan.php?id=<?= $data['id_pelanggan'] ?>">Hapus</a>
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