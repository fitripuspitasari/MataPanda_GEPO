     <div class="modal fade text-left" id="detail<?php echo $dt['id'] ?>" tabindex="-1"
        role="dialog" aria-labelledby="myModalLabel160"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
        role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title white" id="myModalLabel160">
                    Detail Karyawan <?php echo $dt['nama_lengkap'] ?>
                </h5>
                <button type="button" class="close"
                data-bs-dismiss="modal" aria-label="Close">
                <i data-feather="x"></i>
            </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-lg-6">
                    Nama Toko
                </div>
                <div class="col-lg-6">
                    <?php echo $dt['username'] ?>
                </div>
                <div class="col-lg-6">
                    Nama
                </div>
                <div class="col-lg-6">
                    <?php echo $dt['nama_lengkap'] ?>
                </div>
                <div class="col-lg-6">
                    Email
                </div>
                <div class="col-lg-6">
                    <?php echo $dt['email'] ?>
                </div>
                <div class="col-lg-6">
                    Telepon
                </div>
                <div class="col-lg-6">
                    <?php echo $dt['telepon'] ?>
                </div>
                <div class="col-lg-6">
                    Jenis Kelamin
                </div>
                <div class="col-lg-6">
                    <?php echo $dt['jenis_kelamin'] ?>
                </div>
                <div class="col-lg-6">
                    Tempat Lahir
                </div>
                <div class="col-lg-6">
                    <?php echo $dt['tempat'] ?>
                </div>
                <div class="col-lg-6">
                    Tanggal Lahir
                </div>
                <div class="col-lg-6">
                    <?php echo $dt['tgl_lahir'] ?>
                </div>
                <div class="col-lg-6">
                    Tanggal Gabung
                </div>
                <div class="col-lg-6">
                    <?php echo $dt['join_us'] ?>
                </div>
                <div class="col-lg-6">
                    Alamat
                </div>
                <div class="col-lg-6">
                    <?php echo $dt['alamat'] ?>
                </div>
                <div class="col-lg-6">
                    Kota
                </div>
                <div class="col-lg-6">
                    <?php echo $dt['kota'] ?>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button"
            class="btn btn-light-secondary"
            data-bs-dismiss="modal">
            <i class="bx bx-x d-block d-sm-none"></i>
            <span class="d-none d-sm-block">Close</span>
        </button>
        <!--  -->
    </div>
</div>
</div>
</div>