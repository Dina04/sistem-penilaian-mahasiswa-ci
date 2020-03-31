<div class="container">
    <div calss="row mt-3">
        <div calss="col-md-6">
            <div class="card">
                <div class="card-header">
                    Detail Data Dosen
                </div>
                <div class="card-body">
                    <h5 class="card-title">Nip: <?= $dosen['nip']; ?></h5>
                    <br>
                    <p class="card-text">
                        <label for=""><b>Nama Dosen:</b></label>
                        <?= $dosen['nama_dosen']; ?></p>
                    <p class="card-text">
                        <label for=""><b> Jenis Kelamin:</b></label>
                        <?= $dosen['jeniskelamin']; ?></p>
                    <p class="card-text">
                        <label for=""><b> Alamat:</b></label>
                        <?= $dosen['alamat']; ?></p>
                    <p class="card-text">
                        <label for=""><b> Email:</b></label>
                        <?= $dosen['email']; ?></p>
                    <a href="<?= base_url(); ?>dosen" class="btn btn-primary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>