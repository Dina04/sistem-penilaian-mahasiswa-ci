<div class="container">
    <table class="table table-hover" style="width: 550px;">
        <?php if ($this->session->flashdata('flash-data')) : ?>
            <div class="row mt-4">
                <div class="col-md-6">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        Matakuliah<strong> berhasil</strong> <?= $this->session->flashdata('flash-data'); ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
        <?php endif ?>
        <div class="row mt-4">
            <div class="col-md-6">
                <a href="<?= base_url(); ?>matakuliah/tambah" class="btn btn-primary"> Tambah Data Matakuliah</a>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-6">
                <form action="" method="post">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Cari Data Matakuliah" name="keyword">
                        <div class="input-group-append">
                            <button class="btn btn-info" type="submit">Cari</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <br>
        <!--alert-->
        <div class="row">
            <div class="col-4">
                <?php if (empty($matakuliah)) : ?>
                    <div class="alert alert-danger" role="alert">
                        Data Matakuliah tidak ditemukan
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <thead>
            <th scope="col" class="text-center table-primary">Daftar Matakuliah</th>
            <th scope="col" class="text-center table-primary">Aksi</th>
        </thead>
        <tbody>
            <?php foreach ($matakuliah as $mk) : ?> <tr>
                    <td scope="row" class="text-left"><?= $mk['matakuliah']; ?></td>
                    <td>
                        <a href="<?= base_url(); ?>matakuliah/hapus/<?= $mk['id_matakuliah']; ?>" class="btn btn-danger btn-sm float-right" onclick="return confirm('Yakin Data ini akan dihapus');">Hapus</a>
                        <a href="<?= base_url(); ?>matakuliah/detail/<?= $mk['id_matakuliah']; ?>" class="btn btn-primary btn-sm float-right">Detail Matakuliah</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
</div>