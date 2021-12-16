<?php if (isset($profilseller)): ?>
	<script>
		Swal.fire({
			icon: 'success',
			title: 'Success Update Data',
			showConfirmButton: false,
			timer: 1500,
		}).then((result) => {
			window.location = 'index.php?halaman=profil-seller';
		})
	</script>
<?php endif ?>
<?php if (isset($gantipassword)): ?>
	<script>
		Swal.fire({title: 'Update Password Success!',text: 'Data Password di Ubah',icon: 'success',confirmButtonText: 'OK'
	}).then((result) => {
		if (result.value) {
			window.location = 'index.php?halaman=profil-seller';
		}})
	</script>
<?php endif ?>

<?php if (isset($uploadbukti)): ?>
	<script>
		Swal.fire({title: 'Upload Success!',text: 'Berhasil Upload Bukti Pembayaran',icon: 'success',confirmButtonText: 'OK'
	}).then((result) => {
		if (result.value) {
			window.location = 'index.php?halaman=pembayaran';
		}})
	</script>
<?php endif ?>

<?php if (isset($addkategori)): ?>
	<script>
		Swal.fire({
			icon: 'success',
			title: 'Success Tambah Data',
			showConfirmButton: false,
			timer: 1000,
		}).then((result) => {
			window.location = 'index.php?halaman=kategori-produk';
		})
	</script>
<?php endif ?>
<?php if (isset($updatekategori)): ?>
	<script>
		Swal.fire({
			icon: 'success',
			title: 'Success Update Data',
			showConfirmButton: false,
			timer: 1000,
		}).then((result) => {
			window.location = 'index.php?halaman=kategori-produk';
		})
	</script>
<?php endif ?>
<?php if (isset($deletekategori)): ?>
	<script>
		Swal.fire({
			icon: 'success',
			title: 'Success Delete Data',
			showConfirmButton: false,
			timer: 1000,
		}).then((result) => {
			window.location = 'index.php?halaman=kategori-produk';
		})
	</script>
<?php endif ?>

<?php if (isset($addproduk)): ?>
	<script>
		Swal.fire({title: 'Tambah Produk Success!',text: 'Berhasil Tambah Data Produk',icon: 'success',confirmButtonText: 'OK'
	}).then((result) => {
		if (result.value) {
			window.location = 'index.php?halaman=produk';
		}})
	</script>
<?php endif ?>
<?php if (isset($updateproduk)): ?>
	<script>
		Swal.fire({title: 'Update Produk Success!',text: 'Berhasil Update Data Produk',icon: 'success',confirmButtonText: 'OK'
	}).then((result) => {
		if (result.value) {
			window.location = 'index.php?halaman=produk';
		}})
	</script>
<?php endif ?>
<?php if (isset($deleteproduk)): ?>
	<script>
		Swal.fire({
			icon: 'success',
			title: 'Success Delete Data Produk',
			showConfirmButton: false,
			timer: 1000,
		}).then((result) => {
			window.location = 'index.php?halaman=produk';
		})
	</script>
<?php endif ?>

<?php if (isset($varian)): ?>
	<script>
		Swal.fire({
			icon: 'success',
			title: 'Success Tambah Data Varian Produk',
			showConfirmButton: false,
			timer: 1000,
		}).then((result) => {
			document.location.href=window.history.go(-1);
		})
	</script>
<?php endif ?>
<?php if (isset($deletevarian)): ?>
	<script>
		Swal.fire({
			icon: 'success',
			title: 'Success Hapus Data Varian Produk',
			showConfirmButton: false,
			timer: 1000,
		}).then((result) => {
			document.location.href=window.history.go(-1);
		})
	</script>
<?php endif ?>
<!--  -->
<?php if (isset($konfir)): ?>
	<script>
		Swal.fire({
			icon: 'success',
			title: 'Success Konfirmasi',
			text: 'Status Pembayaran Telah di Perbarui',
			showConfirmButton: false,
			timer: 1000,
		}).then((result) => {
			document.location.href=window.history.go(-1);
		})
	</script>
<?php endif ?>
<?php if (isset($adminubah)): ?>
	<script>
		Swal.fire({title: 'Update Success!',text: 'Berhasil Update Data Profil',icon: 'success',confirmButtonText: 'OK'
	}).then((result) => {
		if (result.value) {
			document.location.href='index.php?halaman=dashboard-admin';
		}})
	</script>
<?php endif ?>