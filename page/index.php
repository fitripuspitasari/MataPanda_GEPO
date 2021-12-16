<?php  
session_start();
if (!isset($_SESSION['id'])) {
    header("location:../auth-login.php");
}
require '../config/koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $_GET['halaman'] ?></title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <link rel="stylesheet" href="../assets/vendors/iconly/bold.css">
    <link rel="stylesheet" href="../assets/vendors/simple-datatables/style.css">
    <!-- <link rel="stylesheet" href="../assets/vendors/simple-datatables/style.css"> -->
    <link rel="stylesheet" href="../assets/vendors/dripicons/webfont.css">
    <link rel="stylesheet" href="../assets/css/pages/dripicons.css">
    <link rel="stylesheet" href="../assets/vendors/toastify/toastify.css">
    <link rel="stylesheet" href="../assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="../assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/css/app.css">
    <link rel="shortcut icon" href="../assets/images/favicon.svg" type="image/x-icon">
</head>

<body>
    <div id="app">
        <?php include 'layout/sidebar.php'; ?>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>
            <?php if (isset($_SESSION['role'])): ?>
                <?php if ($_SESSION['role']=="Seller"): ?>
                    <?php if ($_GET['halaman']=="dashboard-seller"): ?>
                        <?php include 'seller/home/home.php'; ?>
                    <?php endif ?>
                    <?php if ($_GET['halaman']=="profil-seller"): ?>
                        <?php include 'seller/profil/profil.php'; ?>
                    <?php endif ?>
                    <?php if ($_GET['halaman']=="pembayaran"): ?>
                        <?php include 'seller/pembayaran/pembayaran.php'; ?>
                    <?php endif ?>
                    <?php if ($_GET['halaman']=="kategori-produk"): ?>
                        <?php include 'seller/kategori/kategori.php'; ?>
                    <?php endif ?>
                    <?php if ($_GET['halaman']=="produk"): ?>
                        <?php include 'seller/produk/produk.php'; ?>
                    <?php endif ?>
                    <?php if ($_GET['halaman']=="penambahan-image"): ?>
                        <?php include 'seller/produk/image.php'; ?>
                    <?php endif ?>
                    <?php if ($_GET['halaman']=="varian-produk"): ?>
                        <?php include 'seller/produk/varian.php'; ?>
                    <?php endif ?>
                    <?php if ($_GET['halaman']=="image-gallery"): ?>
                        <?php include 'seller/galery/image.php'; ?>
                    <?php endif ?>
                <?php endif ?>
                <?php if ($_SESSION['role']=="Admin"): ?>
                    <?php if ($_GET['halaman']=="dashboard-admin"): ?>
                        <?php include 'admin/home/home.php'; ?>
                    <?php endif ?>
                    <?php if ($_GET['halaman']=="data-user"): ?>
                        <?php include 'admin/user/user.php'; ?>
                    <?php endif ?>
                    <?php if ($_GET['halaman']=="pembayaran-registrasi"): ?>
                        <?php include 'admin/pembayaran/pembayaran.php'; ?>
                    <?php endif ?>
                    <?php if ($_GET['halaman']=="cek-pembayaran"): ?>
                        <?php include 'admin/pembayaran/cek.php'; ?>
                    <?php endif ?>
                <?php endif ?>
            <?php endif ?>
            <!-- @yield('content') -->
        </div>
    </div>
    <!-- <?php include 'layout/footer.php'; ?> -->
    <script src="../assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/vendors/simple-datatables/simple-datatables.js"></script>
    <script>
        // Simple Datatable
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);
    </script>
    <script src="../assets/vendors/apexcharts/apexcharts.js"></script>
    <script src="../assets/js/pages/dashboard.js"></script>
    <script src="../assets/js/main.js"></script>
    <script src="../assets/js/extensions/sweetalert2.js"></script>
    <script src="../assets/vendors/sweetalert2/sweetalert2.all.min.js"></script>
    <script src="../assets/vendors/toastify/toastify.js"></script>
    <script src="../assets/js/extensions/toastify.js"></script>
</body>
<?php include 'layout/notif.php'; ?>
</html>