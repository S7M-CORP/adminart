<?php 
include "_header.php";
include "_menu.php";
include "../koneksi.php";

$id = $_GET['id'];
$query = $koneksi->query("SELECT * FROM tbl_user WHERE id_user = '$id'");
$data = $query->fetch_assoc();

if(isset($_POST['simpan'])){
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $tambah = mysqli_query($koneksi,"update tbl_user set nama='$nama', email='$email', password='$password' WHERE id_user='$id'" );

        echo "<script>alert('Data berhasil di edit')</script>";
        echo "<script>location='daftaruser.php'</script>";


}
?>

    <div class="page-wrapper">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                <h4 class="card-title">Edit Data User</h4>

                    <form method="post">
                        <div class="modal-body">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="text-dark" for="nama">Nama</label>
                                    <input class="form-control" id="nama" type="text" name="nama" value="<?php echo $data['nama'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label class="text-dark" for="email">Email</label>
                                    <input class="form-control" id="email" type="text" name="email" value="<?php echo $data['email'] ?>"required>
                                </div>
                                <div class="form-group">
                                    <label class="text-dark" for="password">Password</label>
                                    <input class="form-control" id="password" type="text" name="password" value="<?php echo $data['password'] ?>" required>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                           <button type="submit" class="btn btn-light"><a href="daftaruser.php">Batal</a></button>
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