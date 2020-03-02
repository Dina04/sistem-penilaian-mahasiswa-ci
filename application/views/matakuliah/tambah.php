<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <!-- http://getbootstrap.com/docs/4.1/components/card/ -->
            <div class="card">
                <div class="card-header">
                    Form Tambah Data Matakuliah
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
                            <label for="kode_mk">Kode Matakuliah</label>
                            <input type="text" class="form-control" id="kode_mk" name="kode_mk">
                        </div>
                        <div class="form-group">
                            <label for="matakuliah">Nama Matakuliah</label>
                            <input type="text" class="form-control" id="matakuliah" name="matakuliah">
                        </div>
                        <div class="form-group">
                            <label for="sks">SKS</label>
                            <input type="number" class="form-control" id="sks" name="sks">
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary float-right"> Submit </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>