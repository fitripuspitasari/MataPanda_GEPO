<?php  
session_start();
require 'config/koneksi.php';
$karakter = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
$shuffle  = substr(str_shuffle($karakter), 0, 6);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'verifikasi/vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

if (isset($_POST['login'])) {
    $password=md5($_POST['password']);
    $query=mysqli_query($koneksi,"SELECT * FROM users WHERE email='$_POST[email]' AND password='$password'");
    $num=mysqli_num_rows($query);
    if ($num) {
        $data=mysqli_fetch_assoc($query);
        if ($data['status_user']=="False") {
            mysqli_query($koneksi,"UPDATE users SET verifikasi_daftar='$shuffle' WHERE email='$_POST[email]'");
            try {
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'emailkamu';                     //SMTP username
    $mail->Password   = 'passwordemailkamu';                               //SMTP password
    $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = 
    $mail->setFrom('emailkamu', 'GEPO PROMO');
    $mail->addAddress($_POST['email'], 'Verifikasi Akun');     //Add a recipient

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'GEPO VERIFIKASI';
    $mail->Body    = '<h3>Selamat Datang di GEPO</h3><br>JANGAN BERI kode ini ke siapa pun, TERMASUK PIHAK GEPO. WASPADA PENIPUAN! VERIFIKASI AKUN, masukkan kode verifikasi : '.$shuffle;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    $_SESSION['emailverif']=$_POST['email'];
    $statusfalse=true;

}
catch (Exception $e) {
    echo "Koneksi ke Gmail Anda Error: {$mail->ErrorInfo}";
}
}elseif ($data['status_user']=="True") {
    $_SESSION['id']=$data['id'];
    $_SESSION['role']=$data['role'];
    $_SESSION['email']=$data['email'];
    if ($data['role']=="Seller") {
        $seller=true;
    }else{
        $admin=true;
    }
}

}else{
    $salah=true;
}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GEPO SIGN-IN</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="stylesheet" href="assets/css/pages/auth.css">
    <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
</head>

<body>
    <div id="auth">

        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <h1 class="auth-title">Log in.</h1>
                    <p class="auth-subtitle mb-5">Log in with your data</p>

                    <form method="post">
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="email" class="form-control form-control-xl" name="email" placeholder="Email">
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-3">
                            <input type="password" class="form-control form-control-xl" id="inputPassword" name="password" placeholder="Password">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        <button name="login" class="btn btn-primary btn-block btn-lg shadow-lg mt-4">Log in</button>
                    </form>
                    <div class="text-center mt-5 text-lg fs-4">
                        <p class='text-gray-600'>Tidak ada Akun? <a href="auth-register.php"
                            class="font-bold">Sign-Up</a>.</p>
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
    <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/extensions/sweetalert2.js"></script>
    <script src="assets/vendors/sweetalert2/sweetalert2.all.min.js"></script>
    <?php if (isset($seller)): ?>
        <script>
            Swal.fire({title: 'Login Berhasil',text: 'Hi, <?php echo $_POST['email'] ?>',icon: 'success',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'page/index.php?halaman=dashboard-seller';
            }})
        </script>
    <?php endif ?>
    <?php if (isset($admin)): ?>
        <script>
            Swal.fire({title: 'Login Berhasil',text: 'Hi Admin, <?php echo $_POST['email'] ?>',icon: 'success',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'page/index.php?halaman=dashboard-admin';
            }})
        </script>
    <?php endif ?>
    <?php if (isset($salah)): ?>
        <script type="text/javascript">
            document.getElementById('error');
            Swal.fire({
                icon: "error",
                title: "Gagal Login",
                text: "Email dan Password tidak sesuai."
            });
        </script>
    <?php endif ?>

    <?php if (isset($statusfalse)): ?>
        <script>
            Swal.fire({title: 'User <?php echo $_POST['email'] ?>?',text: 'verifikasi Email anda, Kode verifikasi di Kirim ke Email.',icon: 'success',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'verifikasi/';
            }})
        </script>
    <?php endif ?>

    </html>