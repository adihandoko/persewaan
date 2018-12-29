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
</section>

<!-- Main content -->
<section class="content">

    <!-- Default box -->
   <form method="post" action="<?php echo base_url('produk/tambah_proses') ?>">
    <div class="box-body">
      <div class="form-group">
        <label for="exampleInputEmail1">ID Produk</label>
        <td><input type="text" name='id_produk' class="form-control" value="<?= $kodeunik; ?>" readonly></td>
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Nama</label>
        <input type="text" class="form-control" id="nama" name="nama" placeholder="">
      </div>
     <div class="form-group">
       <!-- <?php
        print_r($result_kategori_pilihan);
        ?> -->
        <label for="id_kategori" class="control-label">ID Kategori</label>
        <div class="form-group">
          <select class="form-control" name="id_kategori">
            <?php 
            foreach($result_kategori_pilihan as $row)
            { 
              echo '<option value="'.$row['id_kategori'].'">'.$row['nama'].'</option>';
            }
            ?>
          </select>
        </div>
    </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Jumlah</label>
        <input type="text" class="form-control" id="jumlah" name="jumlah" placeholder="">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Stok</label>
        <input type="text" class="form-control" id="stok" name="stok" placeholder="">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Status</label>
        <input type="text" class="form-control" id="status" name="status" placeholder="">
      </div>
     

    </div>
    <!-- /.box-body -->

    <div class="box-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
      <a href="<?php  echo base_url('produk') ?>" class="btn btn-danger">Cancel </a>
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