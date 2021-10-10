<?php
include "_header.php";
include "_menu.php";
include "../koneksi.php";

$id = $_GET['id'];
$query = $koneksi->query("SELECT * FROM tbl_barang WHERE id_barang = '$id'");
$data = $query->fetch_assoc();

if (isset($_POST['simpan'])) {
    $kd_barang = $_POST['kd_barang'];
    $nama_barang = $_POST['nama_barang'];
    $id_supplier = $_POST['id_supplier'];
    $satuan = $_POST['satuan'];
    $harga_beli = $_POST['harga_beli'];
    $harga_jual = $_POST['harga_jual'];
    $stok = $_POST['stok'];

    $tambah = mysqli_query($koneksi, "update tbl_barang set kd_barang='$kd_barang', nama_barang='$nama_barang', id_supplier='$id_supplier', satuan='$satuan', harga_beli='$harga_beli', harga_jual='$harga_jual', stok='$stok' WHERE id_barang='$id'");

    echo '<script>alert("Data Berhasil Di Edit!")</script>';
    echo "<script>location='barang.php'</script>";
}
?>

<div class="page-wrapper">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit Data Barang</h4>

                <form method="post">
                    <div class="modal-body">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="text-dark" for="kd_barang">Kode Barang</label>
                                <input class="form-control" id="kd_barang" type="text" name="kd_barang" value="<?php echo $data['kd_barang'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label class="text-dark" for="nama_barang">Nama Barang</label>
                                <input class="form-control" id="nama_barang" type="text" name="nama_barang" value="<?php echo $data['nama_barang'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label class="text-dark" for="id_supplier">Supplier</label>
                                <select class="form-control" id="id_supplier" type="text" name="id_supplier" required>
                                    <option value="">-- Pilih --</option>
                                    <?php $sql = $koneksi->query("select * from tbl_supplier");
                                    while ($supp = $sql->fetch_assoc()) {
                                        if ($data['id_supplier'] == $supp['id_supplier']) {
                                            $seleced = "selected";
                                        }
                                        echo '<option value="' . $supp['id_supplier'] . '"' . $seleced . '>' . $supp['nama_supplier'] . " | " . $supp['deskripsi'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="text-dark" for="satuan">Satuan</label>
                                <input class="form-control" id="satuan" type="text" name="satuan" value="<?php echo $data['satuan'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label class="text-dark" for="harga_beli">Harga Beli</label>
                                <input class="form-control" id="harga_beli" type="text" name="harga_beli" value="<?php echo $data['harga_beli'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label class="text-dark" for="harga_jual">Harga Jual</label>
                                <input class="form-control" id="harga_jual" type="text" name="harga_jual" value="<?php echo $data['harga_jual'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label class="text-dark" for="stok">Stok</label>
                                <input class="form-control" id="stok" type="text" name="stok" value="<?php echo $data['stok'] ?>" required>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-light"><a href="barang.php">Batal</a></button>
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