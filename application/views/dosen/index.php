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
                <?php
                $status_login = $this->session->userdata('level');
                if ($status_login == 'admin') {
                ?>
                    <a href="<?= base_url(); ?>dosen/tambah" class="btn btn-primary">Tambah Data Dosen</a>
                    <a href="<?= base_url(); ?>dosen/cetakLaporan" class="btn btn-info">Cetak Data Dosen</a>
                <?php
                } else {
                ?>
                    <a href="<?= base_url(); ?>dosen/cetakLaporan" class="btn btn-info">Cetak Data Dosen</a>
                <?php
                }
                ?>
                <br><br>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <h3>Daftar Dosen</h3>
                <?php if (empty($dosen)) : ?>
                    <div class="alert alert-danger" role="alert">
                        Data Dosen tidak ditemukan
                    </div>
                <?php endif; ?>
                <table id="listDosen" class="table table-striped table-bordered">
                    <thead>
                        <tr style="background-color: #F5DEB3;">
                            <th>No</th>
                            <th>NIP</th>
                            <th>Nama Dosen</th>
                            <th>Jenis Kelamin</th>
                            <th>Alamat</th>
                            <th>Email</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($dosen as $ds) {
                        ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td>
                                    <?= $ds->nip; ?>
                                </td>
                                <td>
                                    <?= $ds->nama_dosen; ?>
                                </td>
                                <td>
                                    <?= $ds->jeniskelamin; ?>
                                </td>
                                <td>
                                    <?= $ds->alamat; ?>
                                </td>
                                <td>
                                    <?= $ds->email; ?>
                                </td>
                                <td>
                                    <?php
                                    $status_login = $this->session->userdata('level');
                                    if ($status_login == 'admin') {
                                    ?>
                                        <a href="<?= base_url(); ?>dosen/hapus/<?= $ds->id_dosen ?>" class="btn btn-danger btn-sm float-right" onclick="return confirm('Yakin Data ini akan dihapus');">Hapus</a>
                                        <a href="<?= base_url(); ?>dosen/edit/<?= $ds->id_dosen  ?>" class="btn btn-success btn-sm float-right">Edit</a>
                                        <a href="<?= base_url(); ?>dosen/detail/<?= $ds->id_dosen  ?>" class="btn btn-primary btn-sm float-center">Detail</a>
                                    <?php
                                    } else {
                                    ?>
                                        <a href="<?= base_url(); ?>dosen/detail/<?= $ds->id_dosen  ?>" class="btn btn-primary btn-sm float-center">Detail</a>
                                        <a href="<?= base_url(); ?>dosen/edit/<?= $ds->id_dosen  ?>" class="btn btn-success btn-sm float-right">Edit</a>
                                    <?php
                                    }
                                    ?>
                                </td>
                            <?php
                        }
                            ?>
                            </tr>
                    </tbody>
                </table>
            </div>
        </div>