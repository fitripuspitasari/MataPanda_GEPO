<div class="page-heading">
    <h3>Dashboard Admin</h3>
    <i> Hi <?php echo $_SESSION['email'] ?>, Selamat datang!</i>
</div>
<?php  
$kategori=mysqli_query($koneksi,"SELECT * FROM kategori WHERE user_id='$_SESSION[id]' LIMIT 4");
$data=mysqli_query($koneksi,"SELECT * FROM produk INNER JOIN kategori ON produk.kategori_id=kategori.id_kategori WHERE produk.user_id='$_SESSION[id]' LIMIT 3");
?>
<div class="page-content">
    <section class="row">
        <div class="col-12 col-lg-9">
            <div class="row">
                <div class="col-6 col-lg-4 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon purple">
                                        <i class="dripicons dripicons-user-group"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Data User</h6>
                                    <h6 class="font-extrabold mb-0"></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-4 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon blue">
                                        <i class="dripicons dripicons-wallet"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Data Pembayaran</h6>
                                    <h6 class="font-extrabold mb-0"></h6>
                                </div>
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

    </div>
</section>
</div>