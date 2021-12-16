<div class="modal fade text-left" id="edit<?php echo $dt['id_kategori'] ?>" tabindex="-1" role="dialog"
aria-labelledby="myModalLabel1" aria-hidden="true">
<div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="myModalLabel1">Update Data Produk</h5>
            <button type="button" class="close rounded-pill"
            data-bs-dismiss="modal" aria-label="Close">
            <i data-feather="x"></i>
        </button>
    </div>
    <form method="post" enctype="multipart/form-data">
        <div class="modal-body">
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Nama Produk</label>
                        <input type="hidden" value="<?php echo $dt['id_produk'] ?>" name="id_produk">
                        <input type="text" class="form-control" value="<?php echo $dt['nama_produk'] ?>" name="nama_produk">
                    </div>  
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Kategori Produk</label>
                        <select class="form-control" name="kategori_id">
                            <?php foreach ($kategori as $ktg): ?>
                                <option <?php if($ktg['id_kategori']==$dt['kategori_id']){echo "selected";} ?> value="<?php echo $ktg['id_kategori'] ?>"><?php echo $ktg['nama_kategori'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>  
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Harga Produk</label>
                        <input type="text" class="form-control" value="<?php echo $dt['harga'] ?>" name="harga">
                    </div>  
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Diskon Produk</label>
                        <input type="number" value="<?php echo $dt['diskon'] ?>" class="form-control" name="diskon">
                    </div>  
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Varian Produk</label>
                        <select class="form-control" name="varian">
                            <option <?php if($dt['varian']=="Y"){echo "selected";} ?> value="Y">Ada Varian</option>
                            <option <?php if($dt['varian']=="T"){echo "selected";} ?> value="T">Tidak Ada Varian</option>
                        </select>
                    </div>  
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Gambar Produk</label>
                        <input type="file" class="form-control" name="gambar">
                        <input type="hidden" value="<?php echo $dt['gambar'] ?>" name="gambarLama">
                    </div>  
                </div>
                <div class="col-xl-12">
                    <div class="form-group">
                        <label>Detail Produk</label>
                        <textarea class="form-control" rows="5" name="keterangan"><?php echo $dt['keterangan'] ?></textarea>
                    </div>  
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn" data-bs-dismiss="modal">
                <i class="bx bx-x d-block d-sm-none"></i>
                <span class="d-none d-sm-block">Close</span>
            </button>
            <button name="update" class="btn btn-primary ml-1">
                <i class="bx bx-check d-block d-sm-none"></i>
                <span class="d-none d-sm-block">Accept</span>
            </button>
        </div>
    </form>
</div>
</div>
</div>