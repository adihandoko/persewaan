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
  <form method="post" action="<?php echo base_url('kategori/tambah_proses') ?>">
    <div class="box-body">
      <div class="form-group">
        <label for="exampleInputEmail1">ID Kategori</label>
        <td><input type="text" name='id_kategori' class="form-control" value="<?= $kodeunik; ?>" readonly></td>
      </div>
      <div class="form-group">
        <label for="id_produk" class="control-label"><span class="text-danger">*</span>ID Produk</label>
        <div class="form-group">
          <select name="id_produk" class="form-control">
            <option value="">Select Produk</option>
            <?php
            foreach($all_produk as $produk)
            {
            $selected = ($produk['id_produk'] == $this->input->post('id_produk')) ? ' selected="selected"' : "";
            echo '<option value="'.$produk['id_produk'].'" '.$selected.'>'.$produk['nama'].'</option>';
            }
            ?> 
          </select>
          <span class="text-danger"><?php echo form_error('id_produk');?></span>
        </div>
      </div>
      <div class="form-group">
       <!--  <?php
        print_r($result_paket_pilihan);
        ?> -->
        <label for="id_paket" class="control-label">Paket</label>
        <div class="form-group">
          <select class="form-control" name="id_paket">
            <?php 
            foreach($result_paket_pilihan as $row)
            { 
              echo '<option value="'.$row['id_paket'].'">'.$row['nama'].'</option>';
            }
            ?>
          </select>
        </div>
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Harga</label>
        <input type="text" class="form-control" id="harga" name="harga" placeholder="">
      </div>
      
      
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
      <a href="<?php  echo base_url('kategori') ?>" class="btn btn-danger">Cancel </a>
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