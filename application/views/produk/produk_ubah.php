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
  <form method="post" action="<?php echo base_url('produk/ubah_proses') ?>">
    {result}
    <div class="box-body">
      <div class="form-group">
        <label for="exampleInputEmail1">ID Produk</label>
        <input type="text" class="form-control" id="id_produk" name="id_produk" placeholder="" value ="{id_produk}"readonly>
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Nama</label>
        <input type="text" class="form-control" id="nama" name="nama" placeholder="" value="{nama}">
      </div>
      <div class="form-group">
        <!-- <?php
        print_r($result_kategori_pilihan);
        ?>  -->
        <label for="id_kategori" class="control-label">ID Kategori</label>
        <div class="form-group">
          <select class="form-control" name="id_kategori" >
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
        <input type="text" class="form-control" id="jumlah" name="jumlah" placeholder="" value="{jumlah}">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Stok</label>
        <input type="text" class="form-control" id="stok" name="stok" placeholder="" value="{stok}">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Status</label>
        <input type="text" class="form-control" id="status" name="status" placeholder="" value="{status}">
      </div>
      
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
      <a href="<?php  echo base_url('produk') ?>" class="btn btn-danger">Cancel </a>
    </div>
    {/result}
  </form>
  </section><!-- /.content -->
  <?php
  $this->load->view('_partials/js');
  ?>
  <!--tambahkan custom js disini-->
  <?php
  $this->load->view('_partials/footer');
  ?>