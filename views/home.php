<?php
include "_header.php";
include "_menu.php";
include "../koneksi.php";
?>
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Selamat datang <?= $_SESSION['akun']['nama'] ?> !</h3>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="col-5 align-self-center">
                <div class="customize-input float-right">
                    <select class="custom-select custom-select-set form-control bg-white border-0 custom-shadow custom-radius">
                        <option selected><?= date('F y') ?></option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- *************************************************************** -->
        <!-- Start First Cards -->
        <!-- *************************************************************** -->
        <div class="card-group">
            <div class="card border-right">
                <div class="card-body">
                    <div class="d-flex d-lg-flex d-md-block align-items-center">
                        <div>
                            <div class="d-inline-flex align-items-center">
                                <h2 class="text-dark mb-1 font-weight-medium">236</h2>
                                <span class="badge bg-primary font-12 text-white font-weight-medium badge-pill ml-2 d-lg-block d-md-none">+18.33%</span>
                            </div>
                            <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">New Clients</h6>
                        </div>
                        <div class="ml-auto mt-md-3 mt-lg-0">
                            <span class="opacity-7 text-muted"><i data-feather="user-plus"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card border-right">
                <div class="card-body">
                    <div class="d-flex d-lg-flex d-md-block align-items-center">
                        <div>
                            <h2 class="text-dark mb-1 w-100 text-truncate font-weight-medium"><sup class="set-doller">Rp. </sup>180,306</h2>
                            <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Earnings of Month
                            </h6>
                        </div>
                        <div class="ml-auto mt-md-3 mt-lg-0">
                            <span class="opacity-7 text-muted"><i data-feather="dollar-sign"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card border-right">
                <div class="card-body">
                    <div class="d-flex d-lg-flex d-md-block align-items-center">
                        <div>
                            <div class="d-inline-flex align-items-center">
                                <h2 class="text-dark mb-1 font-weight-medium">1538</h2>
                                <span class="badge bg-danger font-12 text-white font-weight-medium badge-pill ml-2 d-md-none d-lg-block">-18.33%</span>
                            </div>
                            <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Supplier</h6>
                        </div>
                        <div class="ml-auto mt-md-3 mt-lg-0">
                            <span class="opacity-7 text-muted"><i data-feather="file-plus"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="d-flex d-lg-flex d-md-block align-items-center">
                        <div>
                            <h2 class="text-dark mb-1 font-weight-medium">864</h2>
                            <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Jumlah Barang</h6>
                        </div>
                        <div class="ml-auto mt-md-3 mt-lg-0">
                            <span class="opacity-7 text-muted"><i data-feather="globe"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- *************************************************************** -->
        <!-- End First Cards -->
        <!-- *************************************************************** -->
        <!-- Start Top Leader Table -->
        <!-- *************************************************************** -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <?php if (isset($_GET['id'])) { ?>
                            <div class="d-flex align-items-center mb-4">
                                <h4 class="card-title">Detail Transaksi : <?= $_GET['id'] ?></h4>
                                <div class="ml-auto">
                                    <div class="dropdown sub-dropdown">
                                        <button class="btn btn-link text-muted dropdown-toggle" type="button" id="dd1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i data-feather="more-vertical"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dd1">
                                            <a class="dropdown-item" href="transaksi.php">Tambah Transaksi</a>
                                        </div>
                                    </div>
                                </div>
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
                        <?php } else { ?>
                            <div class="d-flex align-items-center mb-4">
                                <h4 class="card-title">Penjualan Hari ini</h4>
                                <div class="ml-auto">
                                    <div class="dropdown sub-dropdown">
                                        <button class="btn btn-link text-muted dropdown-toggle" type="button" id="dd1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i data-feather="more-vertical"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dd1">
                                            <a class="dropdown-item" href="transaksi.php">Tambah Transaksi</a>
                                        </div>
                                    </div>
                                </div>
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
                                                    <a href="home.php?id=<?= $data['kd_transaksi'] ?>" class="btn btn-primary">Lihat</a>
                                                </td>
                                            </tr>
                                        <?php $no++;
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- *************************************************************** -->
        <!-- End Top Leader Table -->
        <!-- *************************************************************** -->
    </div>

    <?php
    include "_footer.php";
    ?>