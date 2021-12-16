<?php
error_reporting(0);
require 'config/koneksi.php';
$kategori=mysqli_query($koneksi,"SELECT DISTINCT nama_kategori FROM kategori");
$produk=mysqli_query($koneksi,"SELECT * FROM produk INNER JOIN kategori ON kategori.id_kategori=produk.kategori_id WHERE nama_kategori LIKE '%$_GET[nama_kategori]%' ORDER BY rand()");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>GEPO HOME</title>
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
					<div class="col-md-8 clearfix">
						<div class="shop-menu clearfix pull-right">
							<ul class="nav navbar-nav">
								<!-- @if(Auth::user())
								<li><a href="{{route('profil_konsumen"><i class="fa fa-user"></i> Account</a></li>
								@endif
								<li><a href="{{route('data_checkout"><i class="fa fa-crosshairs"></i> Checkout</a></li>
								@if(Auth::user())
								<li><a href="{{route('keranjang"><i class="fa fa-shopping-cart"></i> Keranjang <sup>{{$cart}}</sup></a></li>
								@else
								<li><a href="{{route('keranjang"><i class="fa fa-shopping-cart"></i> Keranjang</a></li>
								@endif
								@if(Auth::user()) -->
								<li class="nav-item dropdown">
									<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
										<i class="fa fa-user"></i><!-- {{ Auth::user()->name }} -->
									</a>

									<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
										<!-- <a class="dropdown-item" href="{{ route('logout') }}"
										onclick="event.preventDefault();
										document.getElementById('logout-form').submit();">
										{{ __('Logout') }}
									</a>
								-->
								<form id="logout-form" action="{{ route('logout') }}" method="get" class="d-none">
								</form>
							</div>
						</li>
						<li><a href="auth-login.php"><i class="fa fa-lock"></i> Login</a></li>
						<li><a href="auth-register.php"><i class="fa fa-edit"></i> Register</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div><!--/header-middle-->

<div class="header-bottom"><!--header-bottom-->
	<div class="container">
		<div class="row">
			<div class="col-sm-9">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				<div class="mainmenu pull-left">
					<ul class="nav navbar-nav collapse navbar-collapse">
						<li><a href="index.php" class="active">Home</a></li>
					<!-- 	<li><a href="{{route('contact">Contact</a></li>
						<li><a href="{{route('cek_toko">Cek Toko</a></li> -->
					</ul>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="search_box pull-right">
					<input type="text" placeholder="Search"/>
				</div>
			</div>
		</div>
	</div>
</div><!--/header-bottom-->
</header><!--/header-->

<section id="slider"><!--slider-->
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div id="slider-carousel" class="carousel slide" data-ride="carousel">
					<ol class="carousel-indicators">
						<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
						<li data-target="#slider-carousel" data-slide-to="1"></li>
						<li data-target="#slider-carousel" data-slide-to="2"></li>
					</ol>

					<div class="carousel-inner">
						<div class="item active">
							<div class="col-sm-6">
								<h1><span>GEPO</span></h1>
								<p>Selamat Datang di portal promosi produk Makanan dan Minuman. </p>

							</div>
							<div class="col-sm-6">
								<img src="konsumen/promo1.jpg" class="girl img-responsive" alt="" />

							</div>
						</div>
						<div class="item">
							<div class="col-sm-6">
								<h1><span>GEPO</span></h1>
								<p>Selamat Datang di portal promosi produk Makanan dan Minuman. </p>
							</div>
							<div class="col-sm-6">
								<img src="konsumen/pomo2.jpg" class="girl img-responsive" alt="" />

							</div>
						</div>

						<div class="item">
							<div class="col-sm-6">
								<h1><span>GEPO</span></h1>
								<p>Selamat Datang di portal promosi produk Makanan dan Minuman. </p>
							</div>
							<div class="col-sm-6">
								<img src="konsumen/promo3.jpg" class="girl img-responsive" alt="" />

							</div>
						</div>

					</div>

					<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
						<i class="fa fa-angle-left"></i>
					</a>
					<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
						<i class="fa fa-angle-right"></i>
					</a>
				</div>

			</div>
		</div>
	</div>
</section><!--/slider-->
<section>
	<div class="container">
		<div class="row">
			<div class="col-sm-3">
				<div class="left-sidebar">
					<h2>Kategori</h2>
					<div class="brands_products"><!--category-productsr-->
						<!-- @foreach($kategori as $ktg) -->
						<?php foreach ($kategori as $ktg): ?>
						<div class="brands-name">
							<ul class="nav nav-pills nav-stacked">
								<li><a href="" onclick="document.location=href='index.php?nama_kategori=<?php echo $ktg['nama_kategori'] ?>'"> <span class="pull-right">+</span>
									<?php echo $ktg['nama_kategori'] ?>
								</a></li>
							</ul>
						</div>
						<?php endforeach ?>
						<!-- @endforeach -->
					</div><!--/category-products-->

				</div>
			</div>

			<div class="col-sm-9 padding-right">
				<div class="features_items"><!--features_items-->
					<h2 class="title text-center">Produk</h2>
					<!-- @foreach($produks as $prd) -->
					<?php foreach ($produk as $prd): ?>
						<?php
						if ($prd['diskon']!=="0") {
                        $hasil=$prd['diskon']/100*$prd['harga'];
                        }elseif ($prd['diskon']=="0") {
                        $hasil=$prd['harga'];
                        }
						?>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img src="page/gambar/<?php echo $prd['gambar'] ?>" alt="" />
										<h2>Rp <?php echo number_format($hasil,0,",",".") ?></h2>
										<p><?php echo $prd['nama_produk'] ?></p>
										<a href="#" class="btn btn-default add-to-cart">Cek Produk</a>
									</div>
									<div class="product-overlay">
										<div class="overlay-content">
											<h2>Rp <?php echo number_format($hasil,0,",",".") ?></h2>
											<p><?php echo $prd['nama_produk'] ?></p>
											<a target="_blank" href="produk.php?data=<?php echo $prd['id_produk'] ?>" class="btn btn-default add-to-cart">Cek Produk</a>
										</div>
									</div>
								</div>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><a href="#"><i class="fa fa-plus-square"></i>Cek</a></li>
										<li><a href="#"><i class="fa fa-plus-square"></i>
											<?php if ($prd['varian']=="Y"): ?>
												Ada Varian
											<?php endif ?>
											<?php if ($prd['varian']=="T"): ?>
												Tanpa Varian
											<?php endif ?>
										</a></li>
									</ul>
								</div>
							</div>
						</div>
					<?php endforeach ?>
					<!-- @endforeach -->

				</div><!--features_items-->

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
						<h2><span> GET </span> PROMO</h2>
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
				<p class="pull-left">Copyright</p>
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
