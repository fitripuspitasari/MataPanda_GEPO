<?php  
if (isset($_POST['adminubah'])) {
    $email=$_POST['email'];
    $password=$_POST['password'];
    $passwordLama=$_POST['passwordLama'];
    if ($password=="") {
        $password=$passwordLama;
    }else{
        $password=$password;
    }
    $query=mysqli_query($koneksi,"UPDATE users SET email='$email', password='$password' WHERE id='$_POST[id]'");
    if ($query) {
        $adminubah=true;
    }else{
        $adminubah=true;
    }
}
$ad=mysqli_query($koneksi,"SELECT * FROM users WHERE role='Admin' AND id='$_SESSION[id]'");
$addata=mysqli_fetch_assoc($ad);
?>  
<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <?php  
        $name=mysqli_query($koneksi,"SELECT * FROM users INNER JOIN biodata ON users.id=biodata.user_id WHERE users.id='$_SESSION[id]'");
        ?>
        <div class="card-body">
            <div class="d-flex align-items-center">
                <?php if ($_SESSION['role']=="Seller"): ?>
                    <?php foreach ($name as $nm): ?>
                        <div class="avatar avatar-xl">
                            <a href="index.php?halaman=profil-seller">
                                <?php if ($nm['logo']==''): ?>
                                    <img src="../assets/images/faces/1.jpg" alt="Face 1">
                                <?php endif ?>
                                <?php if ($nm['logo']!==''): ?>
                                    <img src="logo/<?php echo $nm['logo'] ?>" alt="Logo Toko">
                                <?php endif ?>
                            </a>
                        </div>
                        <div class="ms-3 name">
                            <h5 class="font-bold">
                                <?php if ($nm['username']==NULL): ?>
                                    Entry Your Name
                                <?php endif ?>
                                <?php if ($nm['username']!==NULL): ?>
                                    <?php echo $nm['username'] ?>
                                <?php endif ?>
                            </h5>
                            <h6 class="text-muted mb-0">
                                <?php echo $_SESSION['role'] ?>
                            </h6>
                        </div>
                    <?php endforeach ?>
                <?php endif ?>
                <?php if ($_SESSION['role']=="Admin"): ?>
                    <div class="avatar avatar-xl">
                        <a href="" data-bs-toggle="modal" data-bs-target="#adminprofil">
                            <img src="../assets/images/faces/1.jpg" alt="Face 1">
                        </a>
                    </div>
                    <div class="ms-3 name">
                        <h5 class="font-bold">
                            <?php echo $addata['email'] ?>
                        </h5>
                        <h6 class="text-muted mb-0">
                            <?php echo $_SESSION['role'] ?>
                        </h6>
                    </div>
                <?php endif ?>

            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu</li>

                <?php if ($_SESSION['role']=="Seller"): ?>
                    <li class="sidebar-item active ">
                        <a href="index.php?halaman=dashboard-seller" class='sidebar-link'>
                            <i class="bi bi-grid-fill"></i>
                            <span>Beranda</span>
                        </a>
                    </li>

                    <li class="sidebar-item  has-sub">
                        <a href="#" class='sidebar-link'>
                            <i class="dripicons dripicons-user"></i>
                            <span>Profil</span>
                        </a>
                        <ul class="submenu ">
                            <li class="submenu-item ">
                                <a href="index.php?halaman=profil-seller">Data Profil</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-item  has-sub">
                        <a href="#" class='sidebar-link'>
                            <i class="dripicons dripicons-store"></i>
                            <span>Data Produk</span>
                        </a>
                        <ul class="submenu ">
                            <li class="submenu-item ">
                                <a href="index.php?halaman=produk">Produk</a>
                            </li>
                            <li class="submenu-item ">
                                <a href="index.php?halaman=kategori-produk">Kategori</a>
                            </li>
                        </ul>
                    </li>

                    <li class="sidebar-item  has-sub">
                        <a href="#" class='sidebar-link'>
                            <i class="dripicons dripicons-wallet"></i>
                            <span>Data Pembayaran</span>
                        </a>
                        <ul class="submenu ">
                            <li class="submenu-item ">
                                <a href="index.php?halaman=pembayaran">Pembayaran</a>
                            </li>
                        </ul>
                    </li>
<!-- 
                            <li class="sidebar-item  has-sub">
                                <a href="#" class='sidebar-link'>
                                    <i class="dripicons dripicons-store"></i>
                                    <span>Pembelian</span>
                                </a>
                                <ul class="submenu ">
                                    <li class="submenu-item ">
                                        <a href="">Data Pembelian</a>
                                    </li>
                                    <li class="submenu-item ">
                                        <a href="">Kategori</a>
                                    </li>
                                </ul>
                            </li> -->

                       <!--  <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="dripicons dripicons-weight"></i>
                                <span>Penjualan</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="">Data Penjualan</a>
                                </li>
                            </ul>
                        </li>
                    -->
                    <li class="sidebar-title">Gallery &amp; Image</li>

                    <li class="sidebar-item  has-sub">
                        <a href="" class='sidebar-link'>
                            <i class="dripicons dripicons-photo-group"></i>
                            <span>Image</span>
                        </a>
                        <ul class="submenu ">
                            <li class="submenu-item ">
                                <a href="index.php?halaman=image-gallery">Gallery</a>
                            </li>
                        </ul>
                    </li>
                <?php endif ?>
                <?php if ($_SESSION['role']=="Admin"): ?>
                    <li class="sidebar-item active ">
                        <a href="index.php?halaman=dashboard-admin" class='sidebar-link'>
                            <i class="bi bi-grid-fill"></i>
                            <span>Beranda</span>
                        </a>
                    </li>
                    <li class="sidebar-item  has-sub">
                        <a href="#" class='sidebar-link'>
                            <i class="dripicons dripicons-user-group"></i>
                            <span>Data User</span>
                        </a>
                        <ul class="submenu ">
                            <li class="submenu-item ">
                                <a href="index.php?halaman=data-user">User</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-item  has-sub">
                        <a href="#" class='sidebar-link'>
                            <i class="dripicons dripicons-wallet"></i>
                            <span>Data Pembayaran</span>
                        </a>
                        <ul class="submenu ">
                            <li class="submenu-item ">
                                <a href="index.php?halaman=pembayaran-registrasi">Pembayaran</a>
                            </li>
                        </ul>
                    </li>
                <?php endif ?>

                <li class="sidebar-title">Sign &amp; Out</li>

                <li class="sidebar-item">
                    <a href="logout.php" class='sidebar-link'>
                        <i class="dripicons dripicons-exit"></i>
                        <span>Logout</span>
                    </a>
                </li>

            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>

<div class="modal fade text-left" id="adminprofil" tabindex="-1" role="dialog"
aria-labelledby="myModalLabel1" aria-hidden="true">
<div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="myModalLabel1">Update Profil</h5>
            <button type="button" class="close rounded-pill"
            data-bs-dismiss="modal" aria-label="Close">
            <i data-feather="x"></i>
        </button>
    </div>
    <form method="post" action="">
        <div class="modal-body">
            <div class="form-group">
                <label>Email</label>
                <input type="text" class="form-control" value="<?php echo $_SESSION['email'] ?>" name="email">
                <input type="text" class="form-control" hidden value="<?php echo $_SESSION['id'] ?>" name="id">
                <input type="text" class="form-control" hidden value="<?php echo $addata['password'] ?>" name="passwordLama">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="text" class="form-control" name="password">
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn" data-bs-dismiss="modal">
                <i class="bx bx-x d-block d-sm-none"></i>
                <span class="d-none d-sm-block">Close</span>
            </button>
            <button name="adminubah" class="btn btn-primary ml-1">
                <i class="bx bx-check d-block d-sm-none"></i>
                <span class="d-none d-sm-block">Accept</span>
            </button>
        </div>
    </form>
</div>
</div>
</div>