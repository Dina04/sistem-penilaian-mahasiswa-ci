<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <!-- http://getbootstrap.com/docs/4.1/components/card/ -->
            <div class="card">
                <div class="card-header">
                    Form Tambah Data Nilai
                </div>
                <div class="card-body">
                    <!-- untuk menampilkan pesan error -->
                    <?php if (validation_errors()) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?= validation_errors() ?>
                        </div>
                    <?php endif ?>
                    <form action="" method="post">
                        <!-- http://getbootstrap.com/docs/4.1/components/form/ -->
                        <div class="form-group">
                            <label for="id_dosen">Nama Dosen</label>
                            <select name="id_dosen" class="form-control" id="id_dosen">
                                <option selected>Pilih Dosen Pengampu</option>
                                <?php foreach ($dosen as $dsn) : ?>
                                    <option value="<?= $dsn['id_dosen'] ?>"><?= $dsn['nama_dosen'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="id_matakuliah">Nama Matakuliah</label>
                            <select name="id_matakuliah" class="form-control" id="matakuliah">
                                <option selected>Pilih Nama Matakuliah</option>
                                <?php foreach ($matakuliah as $mk) : ?>
                                    <option value="<?= $mk['id_matakuliah'] ?>"><?= $mk['matakuliah'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama Mahasiswa</label>
                            <select class="form-control" name="id_mahasiswa" id="id_mahasiswa">
                                <option selected="selected">Pilih Nama Mahasiswa</option>
                                <?php foreach ($mahasiswa as $mhs) : ?>
                                    <option value="<?= $mhs['id_mahasiswa'] ?>"><?= $mhs['nama'] ?> - <?= $mhs['nim'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nilai">Nilai</label>
                            <input type="number" class="form-control" id="nilai" name="nilai">
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary float-right"> Submit </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>