<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <!-- http://getbootstrap.com/docs/4.1/components/card/ -->
            <div class="card">
                <div class="card-header">
                    Form Merubah Data Matakuliah
                </div>
                <div class="card-body">
                    <!-- untuk menampilkan pesan error -->
                    <?php if (validation_errors()) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?= validation_errors(); ?>
                        </div>
                    <?php endif ?>
                    <form action="" method="post">
                        <input type="hidden" name="id_matakuliah" value="<?= $matakuliah['id_matakuliah']; ?>">
                        <!-- http://getbootstrap.com/docs/4.1/components/form/ -->
                        <div class="form-group">
                            <label for="matakuliah">Matakuliah</label>
                            <input type="text" class="form-control" id="matakuliah" name="matakuliah" value="<?= $matakuliah['matakuliah']; ?>">
                            <!-- <small class="form-text text-danger"><?= form_error('matakuliah'); ?></small> -->
                        </div>
                        <div class="form-group">
                            <label for="kode_mk">Kode Matakuliah</label>
                            <select class="form-control" id="kode_mk" name="kode_mk">
                                <?php foreach ($matakuliah as $key) : ?>
                                    <?php if ($key == $matakuliah['kode_mk']) : ?>
                                        <option value="<?= $key ?>" selected><?= $key ?></option>
                                    <?php else : ?>
                                        <option value="<?= $key ?>"><?= $key ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="sks">Sks</label>
                            <input type="number" class="form-control" id="sks" name="sks" value="<?= $matakuliah['sks']; ?>">
                        </div>
                        <button type="submit" name="edit" class="btn btn-primary float-right"> Edit </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>