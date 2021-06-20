<?php 
include "_header.php";
include "_menu.php";
include "../koneksi.php";
?>

<div class="page-wrapper">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                  <h4 class="card-title mt-2">Form Transaksi</h4>
                <hr>
                <br>
                <!--  <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#myModal">Tambah Transaksi</button> -->

            
                <form method="POST">
                	<div class="row">
						<div class="col-6">
							<div class="form-group row">
					    		<label class="col-sm-4 col-form-label text-dark">Kd Transaksi</label>
					    		<div class="col-sm-8">
					      			<input type="text" name="kd_transaksi" class="form-control" disabled="">
					    		</div>
					  		</div>

					  		<div class="form-group row">
					    		<label class="col-sm-4 col-form-label text-dark">Nama Pelanggan</label>
					    		<div class="col-sm-8">
					      			<input type="text" name="kd_barang" placeholder="Input nama pelanggan" class="form-control" required="">
					    		</div>
					  		</div>
						</div>

						<div class="col-6">
					 		<div class="form-group row">
					    		<label class="col-sm-4 col-form-label text-dark">Tanggal Transaksi</label>
					    		<div class="col-sm-8">
					      			<input type="text" name="kd_transaksi" value="<?= date('d-m-Y')?>" class="form-control" disabled="">
					    		</div>
					    	</div>

					  		<div class="form-group row">
					    		<label class="col-sm-4 col-form-label text-dark">Kasir</label>
					    		<div class="col-sm-8">
					      			<input type="text" name="kasir" value="<?= $_SESSION['akun']['nama'] ?>" class="form-control" disabled="">
					    		</div>
					  		</div>
				  		</div>

				  		<div class="input-group mt-4 col-md-6">
	                    	<input type="text" class="form-control custom-shadow" placeholder="Cari apa silahkan ketik disni..."
	                        aria-label="Input group example" aria-describedby="btnGroupAddon">

	                    	<div class="input-group-prepend">
	                        	<button type="submit" name="cari" class="input-group-text btn btn-primary"><i class="fas fa-search"></i></button>
	                    	</div>
	                    
	              		</div>

				  	</div>
				</form>
				<br>
				<form method="post">
					<div class="row">
						 <div class="col-md-3">
                            <div class="form-group">
                                <label class="text-dark">Nama Barang</label>
                    			<input type="text" class="form-control" placeholder="">
                          	</div>
                        </div>
                        <div class="col-md-3">
                             <div class="form-group">
                                <label class="text-dark">Harga Beli</label>
                    			<input type="text" class="form-control" placeholder="">
                            </div>
                        </div>

                        <div class="col-md-3">
                             <div class="form-group">
                                <label class="text-dark">Harga Jual</label>
                    			<input type="text" class="form-control" placeholder="">
                            </div>
                        </div>

                        <div class="col-md-3">
                             <div class="form-group">
                                <label class="text-dark">Stok</label>
                    			<input type="text" class="form-control" placeholder="">
                            </div>
                        </div>
                    </div>
                    
                        <table class="table">
                            <div class="row">
                                <thead class="bg-warning text-white">
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama Barang</th>
                                        <th scope="col">Harga Barang</th>
                                        <th scope="col">Jumlah</th>
                                        <th scope="col">Jumlah Harga</th>
                                    </tr>
                                </thead>
                                <tbody>
                                	<tr>
                                		<td>1</td>
                                		<td>Minyak Goreng</td>
                                		<td>Rp.7000</td>
                                		<td>2</td>
                                		<td>14000</td>
                                	</tr>
                            	</tbody>
                            </div>
                        </table>


                        <div class="row">
						<div class="col-6">

					  		<div class="modal-footer">
					    		<button type="submit" name="" class="btn btn-light">Batal</a></button>
                            	<button type="submit" class="btn btn-success" name="" value="">Simpan</button>
					  		</div>

						</div>

						<div class="col-6">
							<div class="form-group row">
					    		<label class="col-sm-4 col-form-label text-dark">Total Bayar</label>
					    		<div class="col-sm-8">
					      			<input type="text" class="form-control">
					    		</div>
					    	</div>

					 		<div class="form-group row">
					    		<label class="col-sm-4 col-form-label text-dark">Bayar</label>
					    		<div class="col-sm-8">
					      			<input type="text" name="" value="" class="form-control">
					    		</div>
					    	</div>

					  		<div class="form-group row">
					    		<label class="col-sm-4 col-form-label text-dark">Kembali</label>
					    		<div class="col-sm-8">
					      			<input type="text" name="" value="" class="form-control">
					    		</div>
					  		</div>
				  		</div>

				</form>
					
				

            </div>
        </div>
    </div>
</div>

<?php 

include "_footer.php";

?>