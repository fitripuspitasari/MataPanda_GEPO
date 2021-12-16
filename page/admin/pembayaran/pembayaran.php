<?php  
if (isset($_POST['upload'])) {
    if (upload_bukti($_POST)>0) {
        $uploadbukti=true;
    }else{
        $uploadbukti=true;
    }
}
$data=mysqli_query($koneksi,"SELECT * FROM pembayaran INNER JOIN biodata ON biodata.user_id=pembayaran.user_id");
$cek=mysqli_fetch_assoc($data);

?>
<section class="section">
    <div class="card">
        <div class="card-header">
            Data Pembayaran Pendaftaran Toko
        </div>
        <div class="card-body">
            <table class="table table-bordered" id="table1">
                <thead>
                    <tr>
                        <th>No. </th>
                        <th>Nama Toko</th>
                        <th>Tanggal Bayar</th>
                        <th>Jangka Tanggal</th>
                        <th>Nominal</th>
                        <th>Status Transfer</th>
                        <th>Bukti Transfer</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; ?>
                    <?php foreach ($data as $dt): ?> 
                        <tr>
                            <th><?=$no; ?>. </th>
                            <td><?php echo $dt['username'] ?></td>
                            <td><?php echo $dt['tgl_awal'] ?></td>
                            <td><?php echo $dt['tgl_akhir'] ?></td>
                            <td>Rp. <?php echo number_format($dt['nominal'],0,",",".") ?></td>
                            <td>
                                <?php if ($dt['status_tf']=='F'): ?>
                                    <span class="badge bg-danger">Belum <br> Di Konfirmasi</span>
                                <?php endif ?>
                                <?php if ($dt['status_tf']=='Y'): ?>
                                    <span class="badge bg-success">Sudah di <br> Konfirmasi</span>
                                <?php endif ?>
                                <?php if ($dt['status_tf']=='T'): ?>
                                    <span class="badge bg-danger">Pembayaran di <br> Tolak</span>
                                <?php endif ?>
                            </td>
                            <td>
                                <img src="upload/<?php echo $dt['bukti_tf'] ?>" width="70">
                            </td>
                            <td align="center">
                                <a class="btn btn-sm btn-primary" href="index.php?halaman=cek-pembayaran&format=<?php echo $dt['id_pembayaran'] ?>"><i class="dripicons dripicons-preview"></i></a>
                            </td>
                        </tr>
                        <?php $no++ ?>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</section>