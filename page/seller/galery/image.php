<?php  
$produk=mysqli_query($koneksi,"SELECT * FROM produk WHERE user_id='$_SESSION[id]'");
$image=mysqli_query($koneksi,"SELECT * FROM produk INNER JOIN image ON image.produk_id=produk.id_produk WHERE produk.user_id='$_SESSION[id]'");
?>
<section id="content-types">
	<div class="row">
		<label><h5>Image Produk</h5></label>
		<?php foreach ($produk as $prd): ?>	
			<div class="col-xl-3 col-md-6 col-sm-12">
				<div class="card">
					<div class="card-content">
						<img src="gambar/<?php echo $prd['gambar'] ?>" class="card-img-top img-fluid"
						alt="singleminded">
					</div>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
	<div class="row">
		<label><h5>Image Tambahan</h5></label>
		<?php foreach ($image as $img): ?>	
			<div class="col-xl-3 col-md-6 col-sm-12">
				<div class="card">
					<div class="card-content">
						<img src="seller/produk/image_add/<?php echo $img['gambar_add'] ?>" class="card-img-top img-fluid"
						alt="singleminded">
					</div>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
</section>
</div>