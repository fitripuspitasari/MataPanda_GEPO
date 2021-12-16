<?php  
$profil=mysqli_query($koneksi,"SELECT * FROM users INNER JOIN biodata ON users.id=biodata.user_id WHERE users.id='$_SESSION[id]'");
if (isset($_POST['lengkapi'])) {
	if (lengkapi($_POST)>0) {
		$profilseller=true;
	}else{
		$profilseller=true;
	}
}
if (isset($_POST['ganti'])) {
	$query=mysqli_query($koneksi,"UPDATE users SET password='$_POST[password]' WHERE id='$_POST[id]'");
	if ($query) {
		$gantipassword=true;
	}
}
?>
<div class="page-heading">
	<section class="section">
		<div class="card">
			<?php foreach ($profil as $cst): ?>							
				<div class="card-header">
					<h2>Profil</h2>
					<?php if ($cst['status_user']=="False"): ?>
						Segera Upload Bukti pembayaran Pendaftaran<br> <a href="index.php?halaman=pembayaran">Click Me!</a>
					<?php endif ?>
					<button type="button" class="btn rounded-pill btn-sm btn-warning block" style="float: right;" data-bs-toggle="modal" data-bs-target="#inlineForm">
						<i class="icon dripicons-document-edit"></i> Lengkapi
					</button>
					<button type="button" class="btn rounded-pill btn-sm btn-primary block" style="float: right;" data-bs-toggle="modal" data-bs-target="#password">
						<i class="bi bi-shield-lock"></i> Ganti Password
					</button>
				</div>
				<div class="card-body">
					<table class="table table-bordered">
						<tbody>
							<tr>
								<td>EMAIL TOKO</td>
								<td>:</td>
								<td><?php echo $cst['email'] ?></td>
							</tr>
							<tr>
								<td>NAMA TOKO</td>
								<td>:</td>
								<td><?php echo $cst['username'] ?></td>
							</tr>
							<tr>
								<td>NAMA LENGKAP</td>
								<td>:</td>
								<td><?php echo $cst['nama_lengkap'] ?></td>
							</tr>
							<tr>
								<td>TEMPAT LAHIR</td>
								<td>:</td>
								<td><?php echo $cst['tempat'] ?></td>
							</tr>
							<tr>
								<td>TANGGAL LAHIR</td>
								<td>:</td>
								<td><?php echo $cst['tgl_lahir'] ?></td>
							</tr>
							<tr>
								<td>JENIS KELAMIN</td>
								<td>:</td>
								<td><?php echo $cst['jenis_kelamin'] ?></td>
							</tr>
							<tr>
								<td>PONSEL</td>
								<td>:</td>
								<td>
									<?php if (substr($cst['telepon'],0,1)=='0') :?>
										<a href="https://wa.me/62<?php echo substr($cst['telepon'],1) ?>" target="_blank">
											+62 <?php echo substr($cst['telepon'],1) ?>
										</a>
									<?php endif ?>
								</td>
							</tr>
							<tr>
								<td>ALAMAT</td>
								<td>:</td>
								<td><?php echo $cst['alamat'] ?></td>
							</tr>
							<tr>
								<td>Kota</td>
								<td>:</td>
								<td><?php echo $cst['kota'] ?></td>
							</tr>
							<tr>
								<td>FOTO</td>
								<td>:</td>
								<td>
									<img src="logo/<?php echo $cst['logo'] ?>" width="70">
								</td>
							</tr>
							<div class="modal fade text-left" id="password" tabindex="-1"
							role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
							<div class="modal-dialog modal-sm modal-dialog-centered modal-dialog-scrollable"
							role="document">
							<div class="modal-content" style="border-bottom:1px solid blue;">
								<div class="modal-header">
									<h4 class="modal-title" id="myModalLabel33">UBAH PASSWORD </h4>
									<button type="button" class="close" data-bs-dismiss="modal"
									aria-label="Close">
									<i data-feather="x"></i>
								</button>
							</div>
							<form method="post">
								<div class="modal-body">
									<div class="row">
										<div class="col-xl-12">
											<label>PASSWORD:</label>
											<div class="form-group">
												<input type="text" required="" name="password"
												class="form-control">
												<input type="hidden" value="<?php echo $_SESSION['id'] ?>" name="id">
											</div>
										</div>
									</div>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-light-secondary"
									data-bs-dismiss="modal">
									<i class="bx bx-x d-block d-sm-none"></i>
									<span class="d-none d-sm-block">Close</span>
								</button>
								<button type="submit" name="ganti" class="btn btn-primary ml-1">
									<i class="bx bx-check d-block d-sm-none"></i>
									<span class="d-none d-sm-block">Accept</span>
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="modal fade text-left" id="inlineForm" tabindex="-1"
			role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
			<div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable"
			role="document">
			<div class="modal-content" style="border-bottom:1px solid blue;">
				<div class="modal-header">
					<h4 class="modal-title" id="myModalLabel33">SETING PROFIL </h4>
					<button type="button" class="close" data-bs-dismiss="modal"
					aria-label="Close">
					<i data-feather="x"></i>
				</button>
			</div>
			<form method="post" enctype="multipart/form-data">
				<div class="modal-body">
					<div class="row">
						<div class="col-lg-6">
							<label>EMAIL:</label>
							<div class="form-group">
								<input type="hidden" value="<?php echo $_SESSION['id'] ?>" name="id">
								<input type="email" name="email" value="<?php echo $cst['email'] ?>"
								class="form-control">
							</div>
						</div>
						<div class="col-lg-6">
							<label>NAMA TOKO:</label>
							<div class="form-group">
								<input type="text" name="username" value="<?php echo $cst['username'] ?>"
								class="form-control">
							</div>
						</div>
						<div class="col-lg-6">
							<label>NAMA LENGKAP: </label>
							<div class="form-group">
								<input type="text" name="nama_lengkap" value="<?php echo $cst['nama_lengkap'] ?>"
								class="form-control">
							</div>
						</div>
						<div class="col-lg-6">
							<label>TEMPAT LAHIR: </label>
							<div class="form-group">
								<input type="text" name="tempat" value="<?php echo $cst['tempat'] ?>"
								class="form-control">
							</div>
						</div>
						<div class="col-lg-6">
							<label>TANGGAL LAHIR:</label>
							<div class="form-group">
								<input type="date" name="tgl_lahir" value="<?php echo $cst['tgl_lahir'] ?>"
								class="form-control">
							</div>
						</div>
						<div class="col-lg-6">
							<label>JENIS KELAMIN:</label>
							<div class="form-group">
								<select class="form-control" name="jenis_kelamin">
									<option <?php if($cst['jenis_kelamin']=="LAKI - LAKI"){echo "selected";} ?> value="LAKI - LAKI">LAKI - LAKI</option>
									<option <?php if($cst['jenis_kelamin']=="PEREMPUAN"){echo "selected";} ?> value="PEREMPUAN">PEREMPUAN</option>
								</select>
							</div>
						</div>
						<div class="col-lg-6">
							<label>PONSEL TOKO:</label>
							<div class="form-group">
								<input type="number" value="<?php echo $cst['telepon'] ?>" name="telepon"
								class="form-control">
							</div>
						</div>
						<div class="col-lg-6">
							<label>KOTA:</label>
							<div class="form-group">
								<input type="text" value="<?php echo $cst['kota'] ?>" name="kota"
								class="form-control">
							</div>
						</div>
						<div class="col-xl-12">
							<label>FOTO TOKO:</label>
							<div class="form-group">
								<input type="file" name="logo"
								class="form-control">
								<input type="hidden" value="<?php echo $cst['logo'] ?>" name="gambarLama">
							</div>
						</div>
						<div class="col-xl-12">
							<label>ALAMAT: </label>
							<div class="form-group">
								<textarea class="form-control" rows="4" name="alamat"><?php echo $cst['alamat'] ?></textarea>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-light-secondary"
					data-bs-dismiss="modal">
					<i class="bx bx-x d-block d-sm-none"></i>
					<span class="d-none d-sm-block">Close</span>
				</button>
				<button type="submit" name="lengkapi" class="btn btn-primary ml-1">
					<i class="bx bx-check d-block d-sm-none"></i>
					<span class="d-none d-sm-block">Accept</span>
				</button>
			</div>
		</form>
	</div>
</div>
</div>
</tbody>
</table>
</div>
</div>

</section>
</div>
<div class="row mb-4">
	<?php if ($cst['alamat']==NULL): ?>
		<div class="alert alert-light-danger color-danger"><i
			class="bi bi-exclamation-circle"></i> ENTRY YOUR ALAMAT</div>
		<?php endif ?>
		<?php if ($cst['alamat']!==NULL): ?>
			<div class="col-12"><iframe class="form-control" height="400" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=720&amp;height=600&amp;hl=en&amp;q=<?php echo $cst['alamat'] ?>+<?php echo $cst['kota'] ?>+<?php echo $cst['username'] ?>+(My%20Business%20Name)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
			</div>
		<?php endif ?>
	</div>
<?php endforeach ?>
