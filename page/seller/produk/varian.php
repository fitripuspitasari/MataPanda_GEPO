<?php  
$data=mysqli_query($koneksi,"SELECT * FROM produk INNER JOIN varian ON varian.produk_id=produk.id_produk WHERE produk.user_id='$_SESSION[id]' AND varian.produk_id='$_GET[format]'");
if (isset($_POST['tambah'])) {
    $query=mysqli_query($koneksi,"INSERT INTO varian (produk_id,nama_varian) VALUES ('$_POST[produk_id]','$_POST[nama_varian]')");
    if ($query) {
        $varian=true;
    }
}
if (isset($_POST['hapus'])) {
    $query=mysqli_query($koneksi,"DELETE FROM varian WHERE id_varian='$_POST[id_varian]'");
    if ($query) {
        $deletevarian=true;   
    }
}
?>
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data Varian Produk</h3>
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
                Table With Data Varian Produk
                <button type="button" style="float: right;" class="btn btn-sm btn-outline-primary block" data-bs-toggle="modal"
                data-bs-target="#default">
                Tambah Varian
            </button>
        </div>
        <div class="card-body">
            <table class="table table-bordered" id="table1">
                <thead>
                    <tr>
                        <th>No. </th>
                        <th>Nama Varian</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; ?>
                    <?php foreach ($data as $dt): ?>                        
                        <tr>
                            <td><?php echo $no ?>. </td>
                            <td><?php echo $dt['nama_varian'] ?></td>
                            <td align="center">
                                <form method="post">
                                    <input type="hidden" value="<?php echo $dt['id_varian'] ?>" name="id_varian">
                                    <button onclick="return confirm('Yakin Hapus Data <?php echo $dt['nama_varian'] ?>?')" name="hapus" class="btn btn-sm btn-danger rounded-pill"><i class="dripicons dripicons-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        <?php $no++ ?>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>

</section>
</div>

<div class="modal fade text-left" id="default" tabindex="-1" role="dialog"
aria-labelledby="myModalLabel1" aria-hidden="true">
<div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="myModalLabel1">Menambah Data Varian</h5>
            <button type="button" class="close rounded-pill"
            data-bs-dismiss="modal" aria-label="Close">
            <i data-feather="x"></i>
        </button>
    </div>
    <form method="post">
        <div class="modal-body">
            <div class="form-group">
                <label>Nama Varian</label>
                <input type="text" class="form-control" name="nama_varian">
                <input type="hidden" class="form-control" value="<?php echo $_GET['format'] ?>" name="produk_id">
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn" data-bs-dismiss="modal">
                <i class="bx bx-x d-block d-sm-none"></i>
                <span class="d-none d-sm-block">Close</span>
            </button>
            <button name="tambah" class="btn btn-primary ml-1">
                <i class="bx bx-check d-block d-sm-none"></i>
                <span class="d-none d-sm-block">Accept</span>
            </button>
        </div>
    </form>
</div>
</div>
</div>
