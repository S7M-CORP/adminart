<?php 
include "_header.php";
include "_menu.php";
include "../koneksi.php";

$id = $_GET['id'];
$query = $koneksi->query("SELECT * FROM tbl_supplier WHERE id_supplier = '$id'");
$data = $query->fetch_assoc();

if(isset($_POST['simpan'])){
    $nama_supplier = $_POST['nama_supplier'];
    $no_telp = $_POST['no_telp'];
    $alamat = $_POST['alamat'];
    $deskripsi = $_POST['deskripsi'];

    $tambah = mysqli_query($koneksi,"update tbl_supplier set nama_supplier='$nama_supplier', no_telp='$no_telp', alamat='$alamat', deskripsi='$deskripsi' WHERE id_supplier='$id'" );

        echo "<script>alert('Data berhasil di edit')</script>";
        echo "<script>location='supplier.php'</script>";


}
?>

    <div class="page-wrapper">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                <h4 class="card-title">Edit Data Supplier</h4>

                    <form method="post">
                        <div class="modal-body">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="text-dark" for="nama_supplier">Nama Supplier</label>
                                    <input class="form-control" id="nama_supplier" type="text" name="nama_supplier"value="<?php echo $data['nama_supplier'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label class="text-dark" for="no_telp">No.Telp</label>
                                    <input class="form-control" id="no_telp" type="text" name="no_telp" value="<?php echo $data['no_telp'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label class="text-dark" for="alamat">Alamat</label>
                                    <input class="form-control" id="alamat" type="text" name="alamat" value="<?php echo $data['alamat'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label class="text-dark" for="deskripsi">Deskripsi</label>
                                    <input class="form-control" id="deskripsi" type="text" name="deskripsi" value="<?php echo $data['deskripsi'] ?>" required>
                                </div> 
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-light"><a href="supplier.php">Batal</a></button>
                            <button type="submit" class="btn btn-primary" name="simpan" value="simpan">Update</button>
                        </div>
                        </div><!-- /.modal-content -->
                    </form>
                </div>
            </div>
        </div> 
    </div> 


<?php 
include "_footer.php";
?>