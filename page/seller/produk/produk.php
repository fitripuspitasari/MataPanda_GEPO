<?php  
$data=mysqli_query($koneksi,"SELECT * FROM produk INNER JOIN kategori ON produk.kategori_id=kategori.id_kategori WHERE produk.user_id='$_SESSION[id]'");
$kategori=mysqli_query($koneksi,"SELECT * FROM kategori WHERE user_id='$_SESSION[id]'");

if (isset($_POST['tambah'])) {
    if (addproduk($_POST)>0) {
        $addproduk=true;
    }
}
if (isset($_POST['update'])) {
    if (updateproduk($_POST)>0) {
        $updateproduk=true;
    }
}
if (isset($_POST['hapus'])) {
    $query=mysqli_query($koneksi,"DELETE FROM produk WHERE id_produk='$_POST[id_produk]'");
    if ($query) {
        $deleteproduk=true;   
    }
}
?>
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data Produk</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data Table</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                Table With Data Produk
                <button type="button" style="float: right;" class="btn btn-sm btn-outline-primary block" data-bs-toggle="modal"
                data-bs-target="#default">
                Tambah Data
            </button>
        </div>
        <div class="card-body">
            <table class="table table-striped" id="table1">
                <thead>
                    <tr>
                        <th>No. </th>
                        <th>Nama Produk</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th>Diskon</th>
                        <th>Gambar</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; ?>
                    <?php foreach ($data as $dt): ?>
                        <?php  
                        if ($dt['diskon']!=="0") {
                        $hasil=$dt['diskon']/100*$dt['harga'];
                        }elseif ($dt['diskon']=="0") {
                        $hasil=$dt['harga'];
                        }
                        ?>
                        <tr>
                            <td><?php echo $no ?>. </td>
                            <td><?php echo $dt['nama_produk'] ?></td>
                            <td><?php echo $dt['nama_kategori'] ?></td>
                            <td>Rp <?php echo number_format($hasil,0,",",".") ?></td>
                            <td><?php echo $dt['diskon'] ?>% - Rp <?php echo number_format($dt['harga']-$hasil,0,",","."); ?></td>
                            <td><img src="gambar/<?php echo $dt['gambar'] ?>" width="70"></td>
                            <td align="center">
                                <form method="post">
                                    <a href="" data-bs-toggle="modal"
                                    data-bs-target="#edit<?php echo $dt['id_kategori'] ?>" class="btn btn-sm btn-success rounded-pill"><i class="dripicons dripicons-document-edit"></i></a>
                                    <input type="hidden" value="<?php echo $dt['id_produk'] ?>" name="id_produk">
                                    <button name="hapus" onclick="return confirm('Yakin Hapus Data Produk <?php echo $dt['nama_produk'] ?>?')" class="btn btn-sm btn-danger rounded-pill"><i class="dripicons dripicons-trash"></i></button> <br>
                                    <a href="index.php?halaman=penambahan-image&data=<?php echo $dt['id_produk'] ?>" class="btn btn-sm btn-primary rounded-pill"><i class="dripicons dripicons-photo-group"></i></a>
                                    <?php if ($dt['varian']=="Y"): ?>
                                        <a href="index.php?halaman=varian-produk&format=<?php echo $dt['id_produk'] ?>" class="btn btn-sm btn-secondary rounded-pill"><i class="dripicons dripicons-graph-pie"></i></a>
                                    <?php endif ?>
                                </form>
                            </td>
                        </tr>
                        <?php include 'update_produk.php'; ?>
                        <?php $no++ ?>
                    <?php endforeach ?>

                </tbody>
            </table>
        </div>
    </div>

</section>
</div>
<?php include 'tambah_produk.php'; ?>
