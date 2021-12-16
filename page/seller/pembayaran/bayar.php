    <div class="modal fade text-left" id="password" tabindex="-1"
    role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
    role="document">
    <div class="modal-content" style="border-bottom:1px solid blue;">
        <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel33">UPLOAD BUKTI PEMBAYARAN </h4>
            <button type="button" class="close" data-bs-dismiss="modal"
            aria-label="Close">
            <i data-feather="x"></i>
        </button>
    </div>
    <form method="post" enctype="multipart/form-data">
        <div class="modal-body">
            <div class="row">
                <div class="col-xl-12">
                    <label>
                        Untuk Nominal pembayaran Registrasi pertama = Rp. 5.000 <br>
                        Untuk Nominal pembayaran Registrasi selanjutnya = Rp. 50.000
                        <hr>
                        <?php if (isset($cek)): ?>
                            Pembayaran di kenakan sebesar Rp. 50.000
                            <input type="hidden" value="50000" name="nominal">
                        <?php endif ?>
                        <?php if (!isset($cek)): ?>
                            Pembayaran di kenakan sebesar Rp. 5.000
                            <input type="hidden" value="5000" name="nominal">
                        <?php endif ?>
                    </label>
                    <div class="form-group">
                        <input type="file" required="" name="bukti"
                        class="form-control">
                        <input type="hidden" value="<?php echo $_SESSION['id'] ?>" name="id">
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-light-secondary"
            data-bs-dismiss="modal">
            <i class="bx bx-x d-block d-sm-none"></i>
            <span class="d-none d-sm-block">Close</span>
        </button>
        <button type="submit" onclick="return confirm('Lanjut untuk Upload Bukti?')" name="upload" class="btn btn-primary ml-1">
            <i class="bx bx-check d-block d-sm-none"></i>
            <span class="d-none d-sm-block">Accept</span>
        </button>
    </div>
</form>
</div>
</div>
</div>