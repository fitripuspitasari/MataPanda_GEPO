<?php  
$data=mysqli_query($koneksi,"SELECT * FROM kategori WHERE user_id='$_SESSION[id]'");
if (isset($_POST['tambah'])) {
    $query=mysqli_query($koneksi,"INSERT INTO kategori (nama_kategori,user_id) VALUES ('$_POST[nama_kategori]','$_POST[id]')");
    if ($query) {
        $addkategori=true;
    }
}
if (isset($_POST['update'])) {
    $query=mysqli_query($koneksi,"UPDATE kategori SET nama_kategori='$_POST[nama_kategori]' WHERE id_kategori='$_POST[id_kategori]'");
    if ($query) {
        $updatekategori=true;
    }
}
if (isset($_POST['hapus'])) {
    $query=mysqli_query($koneksi,"DELETE FROM kategori WHERE id_kategori='$_POST[id_kategori]'");
    if ($query) {
        $deletekategori=true;   
    }
}
?>
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data Kategori</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                Table With Data Kategori
                <button type="button" style="float: right;" class="btn btn-sm btn-outline-primary block" data-bs-toggle="modal"
                data-bs-target="#default">
                Tambah Kategori
            </button>
        </div>
        <div class="card-body">
            <table class="table table-bordered" id="table1">
                <thead>
                    <tr>
                        <th>No. </th>
                        <th>Nama Kategoi</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; ?>
                    <?php foreach ($data as $dt): ?>                        
                        <tr>
                            <td><?php echo $no ?>. </td>
                            <td><?php echo $dt['nama_kategori'] ?></td>
                            <td align="center">
                                <form method="post">
                                    <a href="" data-bs-toggle="modal"
                                    data-bs-target="#edit<?php echo $dt['id_kategori'] ?>" class="btn btn-sm rounded-pill btn-success">
                                    <i class="dripicons dripicons-document-edit"></i></a>
                                    <input type="hidden" value="<?php echo $dt['id_kategori'] ?>" name="id_kategori">
                                    <button onclick="return confirm('Yakin Hapus Data <?php echo $dt['nama_kategori'] ?>?')" name="hapus" class="btn btn-sm btn-danger rounded-pill"><i class="dripicons dripicons-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        <?php include 'update.php'; ?>
                        <?php $no++ ?>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>

</section>
</div>
<?php include 'tambah.php'; ?>