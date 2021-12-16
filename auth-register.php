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

if (isset($_POST['register'])) {

    if (register($_POST)>0) {
        // $addreg=true;
        try {
    //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'emailkamu';                     //SMTP username
    $mail->Password   = 'passwordemailkamu';                               //SMTP password
    $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    $mail->setFrom('emailkamu', 'GEPO PROMO');
    $mail->addAddress($_POST['email'], $_POST['nama_lengkap']);     //Add a recipient

    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'GEPO VERIFIKASI';
    $mail->Body    = '<h3>Selamat Datang di GEPO</h3><br>JANGAN BERI kode ini ke siapa pun, TERMASUK PIHAK GEPO. WASPADA PENIPUAN! DAFTAR AKUN, masukkan kode verifikasi : '.$_POST['kode'];
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    $_SESSION['emailverif']=$_POST['email'];
    $addreg=true;
} catch (Exception $e) {
    echo "Koneksi ke Gmail Anda Error: {$mail->ErrorInfo}";
}
}else{
    $addreg=true;
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
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="stylesheet" href="assets/vendors/sweetalert2/sweetalert2.min.css">

    <link rel="stylesheet" href="assets/css/pages/auth.css">
    <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
</head>

<body>
    <div id="auth">

        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <h1 class="auth-title">Register.</h1>
                    <p class="auth-subtitle mb-5">Register Form Verifikasi Email</p>

                    <form method="post">
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="hidden" name="kode" value="<?php echo $shuffle ?>">
                            <input type="email" class="form-control form-control-xl" required="" name="email" placeholder="Email">
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" class="form-control form-control-xl" required="" name="nama_lengkap" placeholder="Nama Lengkap">
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="number" class="form-control form-control-xl" required="" name="telepon" placeholder="Telepon">
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-3">
                            <input type="password" class="form-control form-control-xl" required="" id="inputPassword" name="password" placeholder="Password">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        <button name="register" class="btn btn-primary btn-block btn-lg shadow-lg mt-4">Register</button>
                    </form>
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
<?php if (isset($addreg)): ?>
    <script>
        Swal.fire({title: 'Register Berhasil!',text: 'Berhasil Registrasi Data',icon: 'success',confirmButtonText: 'OK'
    }).then((result) => {
        if (result.value) {
            window.location = 'verifikasi/';
        }})
    </script>
<?php endif ?>
</html>