<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <!-- http://getbootstrap.com/docs/4.1/components/card/ -->
            <div class="card">
                <div class="card-header">
                    Form Edit Nilai
                </div>
                <div class="card-body">
                    <!-- untuk menampilkan pesan error -->
                    <?php if (validation_errors()) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?= validation_errors(); ?>
                        </div>
                    <?php endif ?>
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="nama_dosen">Nama Dosen</label>
                            <select class="form-control" id="id_dosen" name="id_dosen">
                                <?php foreach ($dosen as $dsn) : ?>
                                    <?php if ($dsn['id_dosen'] == $nilai['id_dosen']) : ?>
                                        <option value="<?= $nilai['id_dosen'] ?>" selected><?= $dsn['nama_dosen'] ?>
                                        <?php else : ?>
                                        <option value="<?= $dsn['id_dosen'] ?>"><?= $dsn['nama_dosen'] ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="nama">Nama Mahasiswa</label>
                            <select class="form-control" id="id_mahasiswa" name="id_mahasiswa">
                                <?php foreach ($mahasiswa as $mhs) : ?>
                                    <?php if ($mhs['id_mahasiswa'] == $nilai['id_mahasiswa']) : ?>
                                        <option value="<?= $nilai['id_mahasiswa'] ?>" selected><?= $mhs['nama'] ?>
                                        <?php else : ?>
                                        <option value="<?= $mhs['id_mahasiswa'] ?>"><?= $mhs['nama'] ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="matakuliah">Nama Matakuliah</label>
                            <select class="form-control" id="id_matakuliah" name="id_matakuliah">
                                <?php foreach ($matakuliah as $mk) : ?>
                                    <?php if ($mk['id_matakuliah'] == $nilai['id_matakuliah']) : ?>
                                        <option value="<?= $nilai['id_matakuliah'] ?>" selected><?= $mk['matakuliah'] ?>
                                        <?php else : ?>
                                        <option value="<?= $mk['id_matakuliah'] ?>"><?= $mk['matakuliah'] ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                            </select>
                        </div>
                        <input type="hidden" name="id_nilai" value="<?= $nilai['id_nilai']; ?>">
                        <div class="form-group">
                            <label for="nilai">Nilai</label>
                            <input type="number" class="form-control" id="nilai" name="nilai" value="<?= $nilai['nilai']; ?>">
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary float-right"> Edit </button>
                    </form>
                </div>
            </div>
        </div>
    </div>