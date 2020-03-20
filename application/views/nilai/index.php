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
            <div class="col-md-6">
                <?php
                $status_login = $this->session->userdata('level');
                if ($status_login == 'admin' || $status_login == 'dosen') {
                ?>
                    <a href="<?= base_url(); ?>nilai/tambah" class="btn btn-primary">Tambah Data Nilai</a>
                    <a href="<?= base_url(); ?>nilai/cetakLaporan" class="btn btn-info">Cetak Data Nilai</a>
                <?php
                } else {
                ?>
                    <a href="<?= base_url(); ?>nilai/cetakLaporan" class="btn btn-info">Cetak Data Nilai</a>
                <?php
                }
                ?>
            </div>
        </div>
        <!-- <div class="col-md-4">
                <form action="" method="post">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Cari Data Nilai" name="keyword">
                        <div class="input-group-append">
                            <button class="btn btn-info" type="submit">Cari</button>
                        </div>
                    </div>
                </form>
            </div>
        </div> -->
        <br>
        <!--alert-->
        <div class="row">
            <div class="col-4">
                <h3>Daftar Nilai</h3>
                <?php if (empty($nilai)) : ?>
                    <div class="alert alert-danger" role="alert">
                        Data Nilai tidak ditemukan
                    </div>
                <?php endif; ?>
                <table id="listNilai" class="table table-striped table-bordered">
                    <thead>
                        <tr style="background-color: #D8BFD8;">
                            <th>No</th>
                            <th>Nama Dosen</th>
                            <th>Nama Mahasiswa</th>
                            <th>Nilai </th>
                            <th>Aksi</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($nilai as $nl) {
                        ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td>
                                    <?= $nl->nama_dosen; ?>
                                </td>
                                <td>
                                    <?= $nl->nama; ?>
                                </td>
                                <td>
                                    <?= $nl->nilai; ?>
                                </td>
                                <td>
                                    <?php
                                    $status_login = $this->session->userdata('level');
                                    if ($status_login == 'admin' || $status_login == 'dosen') {
                                    ?>
                                        <a href="<?= base_url(); ?>nilai/detail/<?= $nl->id_matakuliah ?>/<?= $nl->id_dosen; ?>/<?= $nl->id_mahasiswa  ?>/<?= $nl->id_nilai ?>" class="btn btn-primary btn-sm float-right">Detail </a>
                                        <a href="<?= base_url(); ?>nilai/hapus/<?= $nl->id_nilai ?>" class="btn btn-danger btn-sm float-right" onclick="return confirm('Yakin Data ini akan dihapus');">Hapus</a>
                                        <a href="<?= base_url(); ?>nilai/edit/<?= $nl->id_nilai ?> " class="btn btn-success btn-sm float-right">Edit Nilai</a>
                                    <?php
                                    } else {
                                    ?>
                                        <a href="<?= base_url(); ?>nilai/detailUser/<?= $nl->id_matakuliah ?>/<?= $nl->id_dosen; ?>/<?= $nl->id_mahasiswa  ?>/<?= $nl->id_nilai ?>" class="btn btn-primary btn-sm float-right">Detail </a>
                                    <?php
                                    }
                                    ?>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
</div>