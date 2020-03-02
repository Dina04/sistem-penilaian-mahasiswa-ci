<div class="container">
    <table class="table table-hover">
        <?php if ($this->session->flashdata('flash-data')) : ?>
            <div class="row mt-4">
                <div class="col-md-6">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        Nilai<strong> berhasil</strong> <?= $this->session->flashdata('flash-data'); ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
        <?php endif ?>
        <div class="row mt-4">
            <div class="col-md-2">
                <a href="<?= base_url(); ?>nilai/tambah" class="btn btn-primary">Tambah Data Nilai</a>
            </div>
            <div class="col-md-4">
                <form action="" method="post">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Cari Data Nilai" name="keyword">
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
                <?php if (empty($nilai)) : ?>
                    <div class="alert alert-danger" role="alert">
                        Data Nilai tidak ditemukan
                    </div>
                <?php endif; ?>
                <thead>
                    <th scope="row" class="text-center table-success">Nama Dosen</th>
                    <th scope="row" class="text-center table-success">Nama Mahasiswa</th>
                    <th scope="row" class="text-center table-success">Nama Matakuliah</th>
                    <th scope="row" class="text-center table-success">Nilai</th>
                    <th scope="row" class="text-center table-success">Aksi</th>
                </thead>
                <tbody>
                    <?php foreach ($nilai as $nl) : ?>
                        <tr>
                            <td scope="col" class="text-center"><?= $nl['nama_dosen']; ?></td>
                            <td scope="col" class="text-center"><?= $nl['nama']; ?></td>
                            <td scope="col" class="text-center"><?= $nl['matakuliah']; ?></td>
                            <td scope="col" class="text-center"><?= $nl['nilai']; ?></td>
                            <td>
                                <a href="<?= base_url(); ?>nilai/hapus/<?= $nl['id_nilai']; ?>" class="btn btn-danger btn-sm float-right" onclick="return confirm('Yakin Data ini akan dihapus');">Hapus</a>
                                <a href="<?= base_url(); ?>nilai/edit/<?= $nl['id_nilai']; ?>" class="btn btn-success btn-sm float-right">Edit Nilai</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
    </table>
</div>
</div>
</div>