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
        Form Tambah Paket
        <small>it all starts here</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Master Data</a></li>
        <li class="active">Paket</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <!-- Default box -->
   <form method="post" action="<?php echo base_url('paket/tambah_proses') ?>">
    <div class="box-body">
      <div class="form-group">
        <label for="exampleInputEmail1">ID paket</label>
        <td><input type="text" name='id_paket' class="form-control" value="<?= $kodeunik; ?>" readonly></td>
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Nama</label>
        <input type="text" class="form-control" id="nama" name="nama" placeholder="">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Durasi</label>
        <input type="text" class="form-control" id="durasi" name="durasi" placeholder="">
      </div>
      
     

    </div>
    <!-- /.box-body -->

    <div class="box-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
      <a href="<?php  echo base_url('paket') ?>" class="btn btn-danger">Cancel </a>
    </div>
    
  </form>

</section><!-- /.content -->

<?php 
$this->load->view('_partials/js');
?>
<!--tambahkan custom js disini-->
<?php
$this->load->view('_partials/footer');
?>