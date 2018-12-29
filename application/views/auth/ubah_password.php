<?php
$this->load->view('_partials/header');
?>
<!--tambahkan custom css disini-->
<?php
$this->load->view('_partials/topbar');
$this->load->view('_partials/sidebar');
?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
    Blank page
    <small>it all starts here</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>
    </ol>
    <div class="col-md-9">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li><a href="#password" data-toggle="tab">Ubah Password</a></li>
            </ul>
            <div class="tab-content">
                    <form class="form-horizontal" action="<?php echo base_url('auth/ubah_password') ?>" method="POST">
                        <div class="form-group">
                            <label for="passLama" class="col-sm-2 control-label">Password Lama</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" placeholder="Password Lama" name="old_password">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="passBaru" class="col-sm-2 control-label">Password Baru</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" placeholder="Password Baru" name="new_password">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="passKonf" class="col-sm-2 control-label">Konfirmasi Password</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" placeholder="Konfirmasi Password" name="repeat_password">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-check-circle"></i> Simpan</button>
                            </div>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</section>

<?php
$this->load->view('_partials/js');
?>
<!--tambahkan custom js disini-->
<?php
$this->load->view('_partials/footer');
?>