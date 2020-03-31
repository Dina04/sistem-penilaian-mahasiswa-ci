<?=
    form_open('auth/proses_register');
?>
<div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6 mx-auto">

                    <!-- form card login -->
                    <div class="card rounded-0">
                        <div class="card-header">
                            <h3 class="mb-0">Register</h3>
                        </div>
                        <div class="card-body">
                            <form class="form" role="form" autocomplete="off" id="formLogin" novalidate="" method="POST">
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" class="form-control form-control-lg rounded-0" name="nama" id="nama" required="">
                                </div>
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control form-control-lg rounded-0" name="username" id="username" required="">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control form-control-lg rounded-0" name="password" id="password" required="" autocomplete="new-password">
                                    <div class="invalid-feedback">Enter your password too!</div>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control form-control-lg rounded-0" name="email" id="email" required="">
                                </div>
                                <div class="form-group">
                                    <label for="notelp">No Telepon</label>
                                    <input type="number" class="form-control form-control-lg rounded-0" name="notelp" id="notelp" required="">
                                </div>
                                Already Have an Account? <a href="<?= base_url(); ?>auth/login">Login Here</a>
                                <button type="submit" class="btn btn-success btn-lg float-right" name="submit">Register</button>
                            </form>
                        </div>
                        <!--/card-block-->
                    </div>
                    <!--/form card login-->
                </div>
            </div>
            <!--/row-->
        </div>
        <!--/col-->
    </div>
    <!--/row-->
</div>
<!--/container-->
<?= form_close();
?>