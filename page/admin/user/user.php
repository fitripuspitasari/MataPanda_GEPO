<?php  
// $area=mysqli_query($koneksi,"SELECT * FROM area");
$data=mysqli_query($koneksi,"SELECT * FROM users INNER JOIN biodata ON biodata.user_id=users.id");
// // $user=mysqli_query($koneksi,"SELECT * FROM user WHERE level!='Admin' AND akses='F'");
// if (isset($_POST['tambah'])) {
//     if (addkaryawan($_POST)>0) {
//         $addkaryawan=true;
//     }else{
//         $addkaryawan=true;   
//     }
// }
// if (isset($_POST['update'])) {
//     if (updatekaryawan($_POST)>0) {
//         $updatekaryawan=true;
//     }else{
//         $updatekaryawan=true;
//     }
// }
if (isset($_POST['hapus'])) {
    $query=mysqli_query($koneksi,"DELETE FROM users WHERE id='$_POST[id]'");
    $query.=mysqli_query($koneksi,"DELETE FROM biodata WHERE user_id='$_POST[id]'");
    if ($query) {
        $deleteuser=true;   
    }
}
?>
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data User</h3>
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
                Table With Data User
        </div>
        <div class="card-body">
            <table class="table table-striped" id="table1">
                <thead>
                    <tr>
                        <th>No. </th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Telepon</th>
                        <th>Jenis Kelamin</th>
                        <th>Tempat Lahir</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; ?>
                    <?php foreach ($data as $dt): ?>                        
                        <tr>
                            <td><?php echo $no ?>. </td>
                            <td><?php echo $dt['nama_lengkap'] ?></td>
                            <td><?php echo $dt['email'] ?></td>
                            <td><?php echo $dt['telepon'] ?></td>
                            <td><?php echo $dt['jenis_kelamin'] ?></td>
                            <td><?php echo $dt['tempat'] ?></td>
                            <td align="center">
                             <form method="post">
                                <a href="" data-bs-toggle="modal"data-bs-target="#detail<?php echo $dt['id'] ?>" class="btn btn-sm rounded-pill btn-primary"><i class="dripicons dripicons-preview"></i></a>
                                <input type="hidden" value="<?php echo $dt['id'] ?>" name="id">
                                <button onclick="return confirm('Yakin Hapus Data <?php echo $dt['username'] ?>?')" name="hapus" class="btn btn-sm btn-danger rounded-pill"><i class="dripicons dripicons-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    <?php include 'detail.php'; ?>
                    <?php $no++ ?>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>
</section>

</div>
