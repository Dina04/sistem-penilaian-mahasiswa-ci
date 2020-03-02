<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Detail Matakuliah
                </div>
                <div class="card-body">
                    <h5 class="card-title"><?= $matakuliah['matakuliah']; ?></h5>
                    <br>
                    <p class="card-text">
                        <label for=""><b> Kode Matakuliah:</b></label>
                        <?= $matakuliah['kode_mk']; ?></p>
                    <p class="card-text">
                        <label for=""><b> Sks:</b></label>
                        <?= $matakuliah['sks']; ?></p>
                    <a href="<?= base_url(); ?>matakuliah" class="btn btn-primary">kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>