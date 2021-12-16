<?php
require 'config/koneksi.php';
$kategori=mysqli_query($koneksi,"SELECT DISTINCT nama_kategori FROM kategori");
$produk=mysqli_query($koneksi,"SELECT * FROM produk INNER JOIN kategori ON produk.kategori_id=kategori.id_kategori JOIN biodata ON biodata.user_id=produk.user_id WHERE produk.id_produk='$_GET[data]'");
$varian=mysqli_query($koneksi,"SELECT * FROM varian WHERE produk_id='$_GET[data]'");
$image=mysqli_query($koneksi,"SELECT * FROM image WHERE produk_id='$_GET[data]'");

$maps=mysqli_fetch_assoc($produk);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>GEPO - CEK PRODUK</title>
	<link href="konsumen/css/bootstrap.min.css" rel="stylesheet">
	<link href="konsumen/css/font-awesome.min.css" rel="stylesheet">
	<link href="konsumen/css/prettyPhoto.css" rel="stylesheet">
	<link href="konsumen/css/price-range.css" rel="stylesheet">
	<link href="konsumen/css/animate.css" rel="stylesheet">
	<link href="konsumen/css/main.css" rel="stylesheet">
	<link href="konsumen/css/responsive.css" rel="stylesheet">
	<link rel="stylesheet" href="template/dist/assets/vendors/toastify/toastify.css">

    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
<![endif]-->
<link rel="shortcut icon" href="konsumen/favicon.ico">
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="konsumen/images/ico/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="konsumen/images/ico/apple-touch-icon-114-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="konsumen/images/ico/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="konsumen/images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
	<header id="header"><!--header-->
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-md-4 clearfix">
						<div class="logo pull-left">
							<h3>GEPO</h3>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	</header><!--/header-->

	<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-xl-12">
					<iframe class="form-control" style="height: 400px;margin-bottom: 5px;" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=720&amp;height=600&amp;hl=en&amp;q=<?php echo $maps['username'] ?>+<?php echo $maps['alamat'] ?>+<?php echo $maps['kota'] ?>+(My%20Business%20Name)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
				</div>
			</div>
		</div>
	</section><!--/slider-->
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Vaian Produk</h2>

						<div class="brands_products"><!--brands_products-->
							<?php foreach ($varian as $vr): ?>
								<div class="brands-name">
									<ul class="nav nav-pills nav-stacked">
										<li><a href="#"> <span class="pull-right"></span><?php echo $vr['nama_varian'] ?></a></li>
									</ul>
								</div>
							<?php endforeach ?>
						</div><!--/brands_products-->

					</div>
				</div>

				<div class="col-sm-9 padding-right">
					<?php foreach ($produk as $prd): ?>
						<?php
						$hasil=$prd['diskon']/100*$prd['harga'];
						?>
						<div class="product-details"><!--product-details-->
							<div class="col-sm-5">
								<div class="view-product">
									<img src="page/gambar/<?php echo $prd['gambar'] ?>" alt="" />
								</div> <br>
								WhatsApp :
								<?php if (substr($prd['telepon'], 0,1)=='0'): ?>
									<a href="https://wa.me/62<?php echo substr($prd['telepon'], 1) ?>" target="_blank">
										+62 <?php echo substr($prd['telepon'], 1); ?>
									</a>
								<?php endif ?>
								<div id="similar-product" class="carousel slide" data-ride="carousel">
									<!-- Controls -->
								<!-- <a class="left item-control" href="#similar-product" data-slide="prev">
									<i class="fa fa-angle-left"></i>
								</a>
								<a class="right item-control" href="#similar-product" data-slide="next">
									<i class="fa fa-angle-right"></i>
								</a> -->
							</div>

						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<h2><?php echo $prd['nama_produk'] ?></h2>
								<p>Kategori : <?php echo $prd['nama_kategori'] ?></p>
								<p>Nama Toko : <?php echo $prd['username'] ?></p>

								<span>
									<span>
										<?php if ($prd['diskon']=="0"): ?>
											Rp. <?php echo number_format($prd['harga'],0,",",".") ?>
										<?php endif ?>
										<?php if ($prd['diskon']!=="0"): ?>
											<s>Rp. <?php echo number_format($prd['harga'],0,",",".") ?></s> <br>
											Rp. <?php echo number_format($hasil,0,",",".") ?>
										<?php endif ?>
									</span>

								</span>
								<p><b>Keterangan : </b> <br>
									<?php echo $prd['keterangan'] ?>
								</p>
								<p>
									Gambar Lainnya <br>
									<br>
									<?php foreach ($image as $img): ?>
										<sup><img src="page/seller/produk/image_add/<?php echo $img['gambar_add'] ?>" width="70"></sup>
									<?php endforeach ?>
								</p>
								<!-- <p><b>Brand:</b> E-SHOPPER</p> -->
							</div><!--/product-information-->
						</div>
					</div><!--/product-details-->
				<?php endforeach ?>
			</div>
		</div>
	</div>
</section>

<footer id="footer"><!--Footer-->
	<div class="footer-top">
		<div class="container">
			<div class="row">
				<div class="col-sm-2">
					<div class="companyinfo">
						<h2><span>GEPO</span></h2>
					</div>
				</div>
				<div class="col-sm-3">
					<div class="address">
						<img src="images/home/map.png" alt="" />
						<p>505 S Atlantic Ave Virginia Beach, VA(Virginia)</p>
					</div>
				</div>
			</div>
		</div>
	</div>


	<div class="footer-bottom">
		<div class="container">
			<div class="row">
				<p class="pull-left">Copyright Gepo</p>
			</div>
		</div>
	</div>

</footer><!--/Footer-->

<script src="konsumen/js/jquery.js"></script>
<script src="konsumen/js/bootstrap.min.js"></script>
<script src="konsumen/js/jquery.scrollUp.min.js"></script>
<script src="konsumen/js/price-rang}.jse"></script>
<script src="konsumen/js/jquery.prettyPhoto.js"></script>
<script src="konsumen/js/main.js"></script>
</body>
</html>
