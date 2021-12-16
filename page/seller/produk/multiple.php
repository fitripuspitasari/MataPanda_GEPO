<?php  
require '../../../config/koneksi.php';
if (isset($_POST['add'])) {

	$limit = 10 * 1024 * 1024;
	$ekstensi =  ['png','jpg','jpeg','JPEG','JPG','gif'];
	$jumlahFile = $_FILES['foto']['name'];

	foreach ($jumlahFile as $key => $value) {


		$namafile = $_FILES['foto']['name'][$key];
		$tmp = $_FILES['foto']['tmp_name'][$key];
		$tipe_file = pathinfo($namafile, PATHINFO_EXTENSION);
		$ukuran = $_FILES['foto']['size'][$key];
		$namaFileBaru = uniqid();
		$namaFileBaru .= '.';
		$namaFileBaru .= $ekstensi[$key];

		if($ukuran > $limit){
			echo "<script>alert('Ukuran Gambar Melebihi Kapasitas')
			document.location.href=window.history.go(-1)
			</script>";		
		}
		else{
			if(!in_array($tipe_file, $ekstensi)){
				echo "<script>alert('Ekstensi Gambar Tidak Valid')
				document.location.href=window.history.go(-1)
				</script>";					
			}else{		
				move_uploaded_file($tmp, 'image_add/'.$namaFileBaru);
				mysqli_query($koneksi,"INSERT INTO image VALUES('','$_POST[id_produk]','$namaFileBaru')");
				echo "<script>alert('Berhasil Uplaod Gambar')
				document.location.href=window.history.go(-1)
				</script>";					
			}
		}
	}	
}

if (isset($_POST['hapus'])) {
	$id_image=$_POST['id_image'];
	$query=mysqli_query($koneksi,"DELETE FROM image WHERE id_image='$id_image'");

	if ($query) {
		echo "<script>alert('Berhasil Hapus Gambar')
		document.location.href=window.history.go(-1)
		</script>";
	}
}
?>