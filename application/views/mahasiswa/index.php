<div class="container">
    <table class="table table-hover" style="width: 550px">
        <?php if ($this->session->flashdata('flash-data')) : ?>
            <div class="row mt-4">
                <div class="col-md-6">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        Mahasiswa<strong> berhasil</strong> <?= $this->session->flashdata('flash-data'); ?>
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
                    <a href="<?= base_url(); ?>mahasiswa/tambah" class="btn btn-primary"> Tambah Data Mahasiswa</a>
                    <a href="<?= base_url(); ?>mahasiswa/cetakLaporan" class="btn btn-info">Cetak Data Mahasiswa</a>
                <?php
                } else {
                ?>
                    <a href="<?= base_url(); ?>mahasiswa/cetakLaporan" class="btn btn-info">Cetak Data Mahasiswa</a>
                <?php
                }
                ?>
            </div>
        </div>
        <!-- <div class="row mt-3">
            <div class="col-md-6">
                <form action="" method="post">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Cari Data Mahasiswa" name="keyword">
                        <div class="input-group-append">
                            <button class="btn btn-info" type="submit">Cari</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
</div> -->
        <br>
        <!--alert-->
        <div class="row">
            <div class="col-4">
                <h3>Daftar Matakuliah</h3>
                <?php if (empty($mahasiswa)) : ?>
                    <div class="alert alert-danger" role="alert">
                        Data Mahasiswa tidak ditemukan
                    </div>
                <?php endif; ?>
                <table id="listMahasiswa" class="table table-striped table-bordered">
                    <thead>
                        <tr style="background-color: #FFA07A;">
                            <th>No</th>
                            <th>Nim</th>
                            <th>Nama</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($mahasiswa as $mhs) {
                        ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td>
                                    <?= $mhs->nim; ?>
                                </td>
                                <td>
                                    <?= $mhs->nama; ?>
                                </td>
                                <td>
                                    <?php
                                    $status_login = $this->session->userdata('level');
                                    if ($status_login == 'user') {
                                    ?>
                                        <a href="<?= base_url(); ?>mahasiswa/detail/<?= $mhs->id_mahasiswa ?>" class="btn btn-primary btn-sm float-center">Detail</a>
                                    <?php
                                    } else {
                                    ?>
                                        <a href="<?= base_url(); ?>mahasiswa/detail/<?= $mhs->id_mahasiswa ?>" class="btn btn-primary btn-sm float-center">Detail</a>
                                        <a href="<?= base_url(); ?>mahasiswa/edit/<?= $mhs->id_mahasiswa ?>" class="btn btn-success btn-sm float-center">Edit Mahasiswa</a>
                                        <a href="<?= base_url(); ?>mahasiswa/hapus/<?= $mhs->id_mahasiswa ?>" class="btn btn-danger btn-sm float-center" onclick="return confirm('Yakin Data ini akan dihapus');">Hapus</a>
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