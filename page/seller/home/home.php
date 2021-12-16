<div class="page-heading">
    <h3>Dashboard Seller</h3>
    <i> Hi <?php echo $_SESSION['email'] ?>, Selamat datang di GEPO!</i>
</div>
<?php  
$kategori=mysqli_query($koneksi,"SELECT * FROM kategori WHERE user_id='$_SESSION[id]' LIMIT 4");
$data=mysqli_query($koneksi,"SELECT * FROM produk INNER JOIN kategori ON produk.kategori_id=kategori.id_kategori WHERE produk.user_id='$_SESSION[id]' LIMIT 3");
?>
<div class="page-content">
    <section class="row">
        <div class="col-12 col-lg-9">
            <div class="row">
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon purple">
                                        <i class="dripicons dripicons-suitcase"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Data Barang</h6>
                                    <h6 class="font-extrabold mb-0"></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon blue">
                                        <i class="dripicons dripicons-store"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Data Pembelian</h6>
                                    <h6 class="font-extrabold mb-0"></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon green">
                                        <i class="dripicons dripicons-shopping-bag"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Data Penjualan</h6>
                                    <h6 class="font-extrabold mb-0"></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon red">
                                        <i class="iconly-boldBookmark"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Laporan</h6>
                                    <!-- <h6 class="font-extrabold mb-0">112</h6> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Form Produk</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-lg">
                                    <thead>
                                        <tr>
                                            <th>Nama Produk</th>
                                            <th>Kategori</th>
                                            <th>Keterangan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($data as $dt): ?>                                            
                                            <tr>
                                                <td class="col-3">
                                                    <div class="d-flex align-items-center">
                                                        <div class="avatar avatar-md">
                                                            <span class="badge rounded-pill bg-light-primary"><i class="dripicons dripicons-store"></i></span>
                                                        </div>
                                                        <p class="font-bold ms-3 mb-0"><?php echo $dt['nama_produk'] ?></p>
                                                    </div>
                                                </td>
                                                <td class="col-auto">
                                                    <p class=" mb-0">
                                                        <?php if ($dt['varian']=="Y"): ?>
                                                            Ada Varian
                                                        <?php endif ?>
                                                        -
                                                        <?php if ($dt['varian']!=="Y"): ?>
                                                            Tanpa Ada Varian
                                                        <?php endif ?>
                                                    </p>
                                                    <p class=" mb-0"><?php echo $dt['nama_kategori'] ?></p>
                                                </td>
                                                <td class="col-auto">
                                                    <p class=" mb-0">Promo : <br>
                                                        <b> <?php echo $dt['keterangan'] ?></b>
                                                    </p>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-12 col-lg-3">
            <div class="card">
                <div class="card-body py-4 px-5">
                    <div class="d-flex align-items-center">
                        <div class="avatar avatar-xl">
                            <img src="../assets/images/faces/2.jpg" alt="Face 1">
                        </div>
                        <div class="ms-3 name">
                         <?php  
                         $name=mysqli_query($koneksi,"SELECT * FROM users INNER JOIN biodata ON users.id=biodata.user_id WHERE users.id='$_SESSION[id]'");
                         ?>
                         <h5 class="font-bold">
                            <?php foreach ($name as $nm): ?>
                                <?php echo $nm['nama_lengkap'] ?>
                            <?php endforeach ?>
                        </h5>
                        <h6 class="text-muted mb-0"><?php echo $_SESSION['role'] ?></h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h4>Data Kategori</h4>
            </div>
            <div class="card-content pb-4">

                <div class="recent-message d-flex" align="center">
                    <?php foreach ($kategori as $ktg): ?>                        
                        <div class="name ms-4" align="center">
                            <h5><?php echo $ktg['nama_kategori'] ?></h5>
                        </div>
                    <?php endforeach ?>
                </div>
                
                <div class="px-4" align="center">
                    <a href="index.php?halaman=kategori-produk" class='btn btn-xl btn-light-primary font-bold mt-3'>ALL KATEGORI</a>
                </div>
            </div>
        </div>
    </div>
</section>
</div>