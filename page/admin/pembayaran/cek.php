<?php  
$cek=mysqli_query($koneksi,"SELECT * FROM pembayaran WHERE id_pembayaran='$_GET[format]'");
$data=mysqli_query($koneksi,"SELECT * FROM users INNER JOIN biodata ON biodata.user_id=users.id JOIN pembayaran ON pembayaran.user_id=users.id WHERE pembayaran.id_pembayaran='$_GET[format]'");

if (isset($_POST['ubh'])) {
	$query=mysqli_query($koneksi,"UPDATE pembayaran SET status_tf='$_POST[status_tf]' WHERE id_pembayaran='$_POST[id_pembayaran]'");
	if ($query) {
		$konfir=true;
	}else{
		$konfir=true;
	}
}
?>
<section class="row">
	<div class="col-12 col-lg-8">

		<div class="card">
			<div class="card-content">
				<div class="card-body">
					<div class="form-body">
						<div class="row">
							<div class="col-12">
								<form class="form form-vertical" method="post">
									<?php foreach ($data as $dta): ?>	
										<?php if ($dta['status_tf']=="Y"): ?>
											<span class="badge bg-success form-control mb-3">Pembayara sudah di Setujui</span>	
										<?php endif ?>
										<?php if ($dta['status_tf']!=="Y"): ?>
											<div class="form-group">
												<input type="hidden" value="<?php echo $dta['id_pembayaran'] ?>" name="id_pembayaran">
												<label for="first-name-vertical">Keterangan</label>
												<select class="form-control" name="status_tf">
													<option <?php if($dta['status_tf']=="Y"){echo "selected";} ?> value="Y">Setujui</option>
													<option <?php if($dta['status_tf']=="T"){echo "selected";} ?> value="T">Tolak</option>
												</select>
												<button name="ubh" class="btn btn-sm btn-outline-primary rounded-pill mt-3"> <i class="icon dripicons-document-edit"></i> Ubah</button>
											</div>
										<?php endif ?>									
										
									<?php endforeach ?>
								</form>
							</div>
							<hr>
							<?php foreach ($data as $ck): ?>								
								<div class="col-6">
									<div class="form-group">
										<label for="email-id-vertical">Nama Toko</label>
										<p><?php echo $ck['username'] ?></p>
									</div>
								</div>
								<div class="col-6">
									<div class="form-group">
										<label for="email-id-vertical">Email</label>
										<p><?php echo $ck['email'] ?></p>
									</div>
								</div>
								<div class="col-6">
									<div class="form-group">
										<label for="email-id-vertical">Nama Lengkap</label>
										<p><?php echo $ck['nama_lengkap'] ?></p>
									</div>
								</div>
								<div class="col-6">
									<div class="form-group">
										<label for="email-id-vertical">Alamat</label>
										<p><?php echo $ck['alamat'] ?></p>
									</div>
								</div>
								<div class="col-6">
									<div class="form-group">
										<label for="email-id-vertical">Kota</label>
										<p><?php echo $ck['kota'] ?></p>
									</div>
								</div>
								<div class="col-6">
									<div class="form-group">
										<label for="email-id-vertical">Jenis Kelaminn</label>
										<p><?php echo $ck['jenis_kelamin'] ?></p>
									</div>
								</div>
								<div class="col-6">
									<div class="form-group">
										<label for="email-id-vertical">Tempat, Tanggal Lahir</label>
										<p><?php echo $ck['tempat'] ?>, <?php echo $ck['tgl_lahir'] ?></p>
									</div>
								</div>
								<div class="col-6">
									<div class="form-group">
										<label for="email-id-vertical">
											Status Pembayaran :
										</label>
										<p>
											<?php if ($ck['status_tf']=="F"): ?>
												<span class="badge bg-danger">Belum di Konfirmasi</span> <br>
												<?php echo $ck['tgl_awal'] ?>
											<?php endif ?>
											<?php if ($ck['status_tf']=="Y"): ?>
												<span class="badge bg-success">Sudah di Konfirmasi</span> <br>
												<?php echo $ck['tgl_awal'] ?>
											<?php endif ?>

											<?php if ($ck['status_tf']=='T'): ?>
												<span class="badge bg-danger">Pembayaran di Tolak</span> <br>
												<?php echo $ck['tgl_awal'] ?>
											<?php endif ?>
										</p>
									</div>
								</div>
							<?php endforeach ?>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
	<div class="col-12 col-lg-4">
		<div class="card">
			<div class="card-content">
				<div class="card-body">
					<h4 class="card-title">Bukti Pembayaran</h4>
					<hr>
					<div class="form-body">
						<div class="row">
							<?php foreach ($cek as $ce): ?>								
								<img src="upload/<?php echo $ce['bukti_tf'] ?>" class="img-thumbnail">
							<?php endforeach ?>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
</section>