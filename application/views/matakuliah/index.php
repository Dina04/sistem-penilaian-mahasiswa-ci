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
                <?php
                $status_login = $this->session->userdata('level');
                if ($status_login == 'admin') {
                ?>
                    <a href="<?= base_url(); ?>matakuliah/tambah" class="btn btn-primary"> Tambah Data Matakuliah</a>
                    <a href="<?= base_url(); ?>matakuliah/cetakLaporan" class="btn btn-info">Cetak Data Matakuliah</a>
                <?php
                } else {
                ?>
                    <a href="<?= base_url(); ?>matakuliah/cetakLaporan" class="btn btn-info">Cetak Data Matakuliah</a>
                <?php
                }
                ?>
            </div>
        </div>
        <!-- <div class="row mt-3">
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
        </div> -->
        <br>
        <!--alert-->
        <div class="row">
            <div class="col-4">
                <h3>Daftar Matakuliah</h3>
                <?php if (empty($matakuliah)) : ?>
                    <div class="alert alert-danger" role="alert">
                        Data Matakuliah tidak ditemukan
                    </div>
                <?php endif; ?>
                <table id="listMatakuliah" class="table table-striped table-bordered">
                    <thead>
                        <tr style="background-color: #90EE90;">
                            <th>No</th>
                            <th>Daftar Matakuliah</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($matakuliah as $mk) {
                        ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td>
                                    <?= $mk->matakuliah; ?>
                                </td>
                                <td>
                                    <?php
                                    $status_login = $this->session->userdata('level');
                                    if ($status_login == 'user') {
                                    ?>
                                        <a href="<?= base_url(); ?>matakuliah/detail/<?= $mk->id_matakuliah ?>" class="btn btn-primary btn-sm float-right">Detail Matakuliah</a>
                                    <?php
                                    } else {
                                    ?>
                                        <a href="<?= base_url(); ?>matakuliah/detail/<?= $mk->id_matakuliah ?>" class="btn btn-primary btn-sm float-right">Detail Matakuliah</a>
                                        <a href="<?= base_url(); ?>matakuliah/hapus/<?= $mk->id_matakuliah ?>" class="btn btn-danger btn-sm float-right" onclick="return confirm('Yakin Data ini akan dihapus');">Hapus</a>
                                        <a href="<?= base_url(); ?>matakuliah/edit/<?= $mk->id_matakuliah ?>" class="btn btn-success btn-sm float-right">Edit</a>
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