<?php  
$koneksi=mysqli_connect("localhost","root","","makanan");



function register($data)
{
	global $koneksi;

	$kode=$data['kode'];
	$email=$data['email'];
	$password=md5($data['password']);
	$join=date('Y-m-d');
	$nama_lengkap=$data['nama_lengkap'];
	$telepon=$data['telepon'];

	$sama=mysqli_query($koneksi,"SELECT * FROM users WHERE email = '$email'");
	if (mysqli_fetch_assoc($sama)) {
		echo "<script>
		alert('Email telah terdaftar')
		document.location.href='auth-register.php'
		</script>";
		return false;
	}

	$query=mysqli_query($koneksi,"INSERT INTO users (email,password,join_us,role,status_user,verifikasi_daftar) VALUES ('$email','$password','$join','Seller','False','$kode')");
	$id=mysqli_insert_id($koneksi);
	$query.=mysqli_query($koneksi,"INSERT INTO biodata (user_id,nama_lengkap,telepon) VALUES ('$id','$nama_lengkap','$telepon')");

	return mysqli_affected_rows($koneksi);
}

function logo_toko(){

	$namaFile = $_FILES['logo']['name'];
	// $ukuranFile = $_FILES['logo']['size'];
	$error = $_FILES['logo']['error'];
	$tmpName = $_FILES['logo']['tmp_name'];

	$ekstensiGambarValid = ['jpg','jpeg','png','PNG','JPEG','JPG'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));


	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiGambar;

	move_uploaded_file($tmpName, 'logo/'. $namaFileBaru);

	return $namaFileBaru;

}
function lengkapi($data)
{
	global $koneksi;

	$id=$data['id'];
	$username=$data['username'];
	$telepon=$data['telepon'];
	$email=$data['email'];
	$nama_lengkap=$data['nama_lengkap'];
	$tempat=$data['tempat'];
	$tgl_lahir=$data['tgl_lahir'];
	$jenis_kelamin=$data['jenis_kelamin'];
	$alamat=$data['alamat'];
	$kota=$data['kota'];
	$gambarLama=$data['gambarLama'];
	if ($_FILES['logo']['error'] === 4) {
		$logo = $gambarLama;
	}else{
		$logo=logo_toko();
	}

	$query=mysqli_query($koneksi,"UPDATE users SET email='$email',logo='$logo' WHERE id='$id'");
	$querytwo=mysqli_query($koneksi,"UPDATE biodata SET username='$username',nama_lengkap='$nama_lengkap',telepon='$telepon',alamat='$alamat',kota='$kota',jenis_kelamin='$jenis_kelamin',tempat='$tempat',tgl_lahir='$tgl_lahir' WHERE user_id='$id'");
	return mysqli_affected_rows($koneksi);
}

function bukti(){

	$namaFile = $_FILES['bukti']['name'];
	// $ukuranFile = $_FILES['logo']['size'];
	$error = $_FILES['bukti']['error'];
	$tmpName = $_FILES['bukti']['tmp_name'];

	$ekstensiGambarValid = ['jpg','jpeg','png','PNG','JPEG','JPG'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));


	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiGambar;

	move_uploaded_file($tmpName, 'upload/'. $namaFileBaru);

	return $namaFileBaru;

}
function upload_bukti($data)
{
	global $koneksi;

	$bukti=bukti();
	$nominal=$data['nominal'];
	$id=$data['id'];
	$tgl_awal=date('Y-m-d');
	$jatuhtempo=date('Y-m-d',strtotime("+1 month",strtotime(date($tgl_awal))));

	$query=mysqli_query($koneksi,"INSERT INTO pembayaran (user_id,bukti_tf,nominal,tgl_awal,tgl_akhir,status_tf) VALUES ('$id','$bukti','$nominal','$tgl_awal','$jatuhtempo','F')");
	return mysqli_affected_rows($koneksi);
}

function gambar(){

	$namaFile = $_FILES['gambar']['name'];
	// $ukuranFile = $_FILES['logo']['size'];
	$error = $_FILES['gambar']['error'];
	$tmpName = $_FILES['gambar']['tmp_name'];

	$ekstensiGambarValid = ['jpg','jpeg','png','PNG','JPEG','JPG'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));


	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiGambar;

	move_uploaded_file($tmpName, 'gambar/'. $namaFileBaru);

	return $namaFileBaru;

}
function addproduk($data)
{
	global $koneksi;

	$nama_produk=$data['nama_produk'];
	$id=$data['id'];
	$kategori_id=$data['kategori_id'];
	$harga=$data['harga'];
	$diskon=$data['diskon'];
	$keterangan=$data['keterangan'];
	$varian=$data['varian'];
	$gambar=gambar();

	$query=mysqli_query($koneksi,"INSERT INTO produk VALUES ('','$id','$nama_produk','$kategori_id','$harga','$diskon','$keterangan','$gambar','$varian')");
	return mysqli_affected_rows($koneksi);
}

function updateproduk($data)
{
	global $koneksi;

	$nama_produk=$data['nama_produk'];
	$id_produk=$data['id_produk'];
	$kategori_id=$data['kategori_id'];
	$harga=$data['harga'];
	$diskon=$data['diskon'];
	$keterangan=$data['keterangan'];
	$varian=$data['varian'];
	$gambarLama=$data['gambarLama'];
	if ($_FILES['gambar']['error'] === 4) {
		$gambar=$gambarLama;
	}else{
		$gambar=gambar();
	}

	$query=mysqli_query($koneksi,"
		UPDATE produk SET nama_produk='$nama_produk',
		id_produk='$id_produk',
		kategori_id='$kategori_id',
		harga='$harga',
		diskon='$diskon',
		keterangan='$keterangan',
		gambar='$gambar',
		varian='$varian' WHERE id_produk='$id_produk'
		");
	return mysqli_affected_rows($koneksi);
}

?>