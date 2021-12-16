<?php  
$produk=mysqli_query($koneksi,"SELECT * FROM produk INNER JOIN kategori ON produk.kategori_id=kategori.id_kategori WHERE produk.user_id='$_SESSION[id]' AND produk.id_produk='$_GET[data]'");
$image=mysqli_query($koneksi,"SELECT * FROM image WHERE produk_id='$_GET[data]'");
?>
<?php foreach ($produk as $prd): ?>	
	<div class="page-heading">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-offset-md-4">
					<div class="card">
						<h5 class="card-header">Tambahkan beberapa Gambar</h5>
						<div class="card-body">
							<form action="seller/produk/multiple.php" method="post" enctype="multipart/form-data">
								<div class="imgPreview">
									<div class="form-group">
										<input type="hidden" value="<?php echo $prd['id_produk'] ?>" name="id_produk">
										<input type="file" id="images" class="form-control" name="foto[]" multiple>
									</div>
								</div>
								<button type="submit" name="add" class="btn btn-sm btn-primary mt-2">Upload</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php endforeach ?>

	<!-- jQuery -->
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
	<script>
		$(function() {
        // Multiple images preview with JavaScript
        var multiImgPreview = function(input, imgPreviewPlaceholder) {

        	if (input.files) {
        		var filesAmount = input.files.length;

        		for (i = 0; i < filesAmount; i++) {
        			var reader = new FileReader();

        			reader.onload = function(event) {
        				$($.parseHTML('<img>')).attr('src', event.target.result).width('200').appendTo(imgPreviewPlaceholder);
        			}

        			reader.readAsDataURL(input.files[i]);
        		}
        	}

        };

        $('#images').on('change', function() {
        	multiImgPreview(this, 'div.imgPreview');
        });
    });    
</script>

<section id="content-types">
	<div class="row">
		<?php foreach ($image as $img): ?>	
			<div class="col-xl-3 col-md-6 col-sm-12">
				<div class="card">
					<div class="card-content">
						<img src="seller/produk/image_add/<?php echo $img['gambar_add'] ?>" class="card-img-top img-fluid"
						alt="singleminded">
					<!-- 	<video controls="">
							<source src="seller/produk/image_add/<?php echo $img['gambar_add'] ?>" type="mp4/video">
							</video> -->
						</div>
						<ul class="list-group list-group-flush">
							<form action="seller/produk/multiple.php" method="post">
								<li class="list-group-item">
									<input type="hidden" value="<?php echo $img['id_image'] ?>" name="id_image">
									<button name="hapus" class="btn btn-sm btn-danger">
										<i class="dripicons dripicons-trash"></i>
									</button>
								</li>
							</form>					
						</ul>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</section>
</div>