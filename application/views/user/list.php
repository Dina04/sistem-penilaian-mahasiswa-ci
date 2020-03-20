<div class="container">
    <?php if ($this->session->flashdata('flash-data')) : ?>
        <div class="row mt-4">
            <div class="col-md-6">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data User<strong> berhasil </strong><?php echo $this->session->flashdata('flash-data'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <?php if ($this->session->flashdata('flash-data-hapus')) : ?>
        <div class="row mt-4">
            <div class="col-md-6">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data User<strong> berhasil </strong><?php echo $this->session->flashdata('flash-data-hapus'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <div class="row mt-4">
        <div class="col-md-6">
            <a href="<?= base_url(); ?>user/cetakLaporan" class="btn btn-info">Cetak Data User</a>
        </div>
    </div>
    <!-- <div class="row mt-3">
        <div class="col-md-6">
            <form action="" method="post">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Cari Nama user" name="keyword">
                    <div class="input-group-append">
                        <button class="btn btn-info" type="submit">Cari Data User</button>
                    </div>
                </div>
            </form>
        </div>
    </div> -->
    <div class="row mt-3">

        <div class="col-lg-12" style="margin: 0 auto;">
            <h3>Daftar User</h3>
            <?php if (empty($user)) : ?>
                <div class="alert alert-danger" role="alert">
                    Data User Tidak Ditemukan
                </div>
            <?php endif; ?>
            <table class="table table-striped table-hover" id="list_user">
                <thead>
                    <tr style="background-color:orange;">
                        <td>Nama User</td>
                        <td>Username</td>
                        <td>Email</td>
                        <td>No.Telepon</td>
                        <td>Level</td>
                        <td>Status</td>
                        <td>Aksi</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($user as $ur) : ?>
                        <tr>
                            <td>
                                <?= $ur->nama ?>
                            </td>
                            <td>
                                <?= $ur->username ?>
                            </td>
                            <td>
                                <?= $ur->email ?>
                            </td>
                            <td>
                                <?= $ur->notelp ?>
                            </td>
                            <td>
                                <?= $ur->level ?>
                            </td>
                            <td>
                                <?= $ur->status ?>
                            </td>
                            <?php
                            if ($ur->level == "admin") { ?>
                                <td>

                                </td>
                            <?php
                            } else { ?>
                                <td>
                                    <a href="<?= base_url(); ?>user/edit/<?= $ur->id_user ?>" class="btn btn-success float-center">Edit Data</a>
                                    <a href=" <?php echo base_url(); ?>user/hapusDataUser/<?php echo $ur->id_user ?>" class="btn btn-danger float-center" onclick="return confirm('Apakah anda yakin menghapus data ini?')">Hapus</a>
                                </td>
                            <?php
                            }
                            ?>

                        </tr>
                    <?php endforeach; ?>
            </table>
        </div>
    </div>
</div>