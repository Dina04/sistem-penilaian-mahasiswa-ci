<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Detail Nilai
                </div>
                <div class="card-body">


                    <p class="card-text">
                        <label for=""><b> Nama Dosen: </b></label>
                        <?= $dosen['nama_dosen']; ?></p>

                    <p class="card-text">
                        <label for=""><b> Nip: </b></label>
                        <?= $dosen['nip']; ?></p>

                    <p class="card-text">
                        <label for=""><b> Nama Mahasiswa:</b></label>
                        <?= $mahasiswa['nama']; ?></p>
                    <p class="card-text">
                        <label for=""><b> Nim:</b></label>
                        <?= $mahasiswa['nim']; ?></p>

                    <p class="card-text">
                        <label for=""><b> Nama Mata Kuliah:</b></label>
                        <?= $matakuliah['matakuliah']; ?></p>

                    <p class="card-text">
                        <label for=""><b> Sks:</b></label>
                        <?= $matakuliah['sks']; ?></p>

                    <p class="card-text">
                        <label for=""><b> Nilai:</b></label>
                        <?= $nilai['nilai']; ?></p>
                    <a href="<?= base_url(); ?>nilai" class="btn btn-primary">kembali</a>
                </div>
            </div>
        </div>
    </div>