<div class="container">
    <table class="table table-hover">
        <?php if ($this->session->flashdata('flash-data')) : ?>
            <div class="row mt-4">
                <div class="col-md-6">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        Dosen<strong> berhasil</strong> <?= $this->session->flashdata('flash-data'); ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
        <?php endif ?>
        <div class="row mt-4">
            <div class="col-md-6">
                <a href="<?= base_url(); ?>dosen/tambah" class="btn btn-primary">Tambah Data Dosen</a>
                <br><br>
            </div>
            <thead>
                <th scope="row" class="text-center bg-warning">NIP</th>
                <th scope="row" class="text-center bg-warning">Nama Dosen</th>
                <th scope="row" class="text-center bg-warning">Jenis Kelamin</th>
                <th scope="row" class="text-center bg-warning">Alamat</th>
                <th scope="row" class="text-center bg-warning">Email</th>
                <th scope="row" class="text-center bg-warning">Aksi</th>
            </thead>
            <tbody>
                <?php foreach ($dosen as $ds) : ?>
                    <tr>
                        <td scope="col" class="text-center"><?= $ds['nip']; ?></td>
                        <td scope="col" class="text-center"><?= $ds['nama_dosen']; ?></td>
                        <td scope="col" class="text-center"><?= $ds['jeniskelamin']; ?></td>
                        <td scope="col" class="text-center"><?= $ds['alamat']; ?></td>
                        <td scope="col" class="text-center"><?= $ds['email']; ?></td>
                        <td>
                            <a href="<?= base_url(); ?>dosen/hapus/<?= $ds['id_dosen']; ?>" class="btn btn-danger btn-sm float-right" onclick="return confirm('Yakin Data ini akan dihapus');">Hapus</a>
                            <a href="<?= base_url(); ?>dosen/edit/<?= $ds['id_dosen']; ?>" class="btn btn-success btn-sm float-right">Edit</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
    </table>
</div>
</div>
</div>