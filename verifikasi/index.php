<?php  
session_start();
if (!isset($_SESSION['emailverif'])) {
    header("location:../auth-login.php");
}
require '../config/koneksi.php';

$kode=mysqli_query($koneksi,"SELECT * FROM users WHERE email='$_SESSION[emailverif]'");
$data=mysqli_fetch_assoc($kode);

if (isset($_POST['tombol'])) {
    if ($data['verifikasi_daftar']==$_POST['kode']) {
        mysqli_query($koneksi,"UPDATE users SET status_user='True' WHERE email='$data[email]'");
        session_destroy();
        $veriftrue=true;
    }else{
        $salahkode=true;
    }

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GEPO SIGN-UP</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/css/app.css">
    <link rel="stylesheet" href="../assets/vendors/sweetalert2/sweetalert2.min.css">

    <link rel="stylesheet" href="../assets/css/pages/auth.css">
    <link rel="stylesheet" href="../assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
</head>

<body>
    <div id="auth">

        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <h2 class="auth-title">Verifikasi</h2>
                    <p class="auth-subtitle mb-5">Verifikasi Akun</p>

                    <form method="post">
                        <div class="form-group position-relative has-icon-left mb-3">
                            <input type="text" class="form-control form-control-xl" id="inputPassword" name="kode">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        <button name="tombol" class="btn btn-primary btn-block btn-lg shadow-lg mt-4">Verify</button>
                    </form>
                    <div class="text-center mt-5 text-lg fs-4">
                        <p class='text-gray-600'> <a href="../page/logout.php"
                            class="font-bold">Logout</a>.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 d-none d-lg-block">
                    <div id="auth-right">

                    </div>
                </div>
            </div>

        </div>
    </body>
    <script src="../assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/main.js"></script>
    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/extensions/sweetalert2.js"></script>
    <script src="../assets/vendors/sweetalert2/sweetalert2.all.min.js"></script>
    <?php if (isset($salahkode)): ?>
        <script>
            Swal.fire({title: 'Verifikasi Gagal!',text: 'Kode Verifikasi Tidak sesuai',icon: 'error',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php';
            }})
        </script>
    <?php endif ?>
    <?php if (isset($veriftrue)): ?>
        <script>
            Swal.fire({title: 'Verifikasi Berhasil!',text: 'Kode Verifikasi Akun selesai, Silahkan Login',icon: 'success',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = '../auth-login.php';
            }})
        </script>
    <?php endif ?>
    </html>