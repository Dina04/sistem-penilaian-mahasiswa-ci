<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <!-- http://getbootstrap.com/docs/4.1/components/card/ -->
            <div class="card">
                <div class="card-header">
                    Form Edit Data User
                </div>
                <div class="card-body">
                    <!-- untuk menampilkan pesan error -->
                    <?php if (validation_errors()) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo validation_errors() ?>
                        </div>
                    <?php endif ?>
                    <form action="" method="POST">
                        <input type="hidden" name="id_user" value="<?= $user->id_user; ?>">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="<?= $user->nama; ?>">
                        </div>
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control" id="username" name="username" value="<?= $user->username; ?>">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?= $user->email; ?>">
                        </div>
                        <div class="form-group">
                            <label>No.Telepon</label>
                            <input type="number" class="form-control" id="notelp" name="notelp" value="<?= $user->notelp; ?>">
                        </div>
                        <div class="form-group">
                            <label>Level</label>
                            <input type="text" class="form-control" id="level" name="level" value="<?= $user->level; ?>">
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select class="form-control" name="status">
                                <?php foreach ($status as $st) : ?>
                                    <?php if ($st == $user->status) : ?>
                                        <option value="<?= $user->status ?>" selected><?= $user->status ?></option>
                                    <?php else : ?>
                                        <option value="<?= $st ?>"><?= $st ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                            <button type="submit" name="submit" class="btn btn-success float-right">Edit Data</button>
                            <a href="<?= base_url('user/list_user'); ?>" class="btn btn-primary float-right">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>