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
        Form Edit Harga
        <small>it all starts here</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Master Data</a></li>
        <li class="active">Harga</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
{result}
    <!-- Default box -->
   <form method="post" action="<?php echo base_url('harga/ubah_proses') ?>">
    <div class="box-body">
      <div class="form-group">
        <label for="exampleInputEmail1">ID harga</label>
        <input type="text" class="form-control" id="id_harga" name="id_harga" placeholder="" value ="{id_harga}"readonly>
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
        <label for="id_paket" class="control-label"><span class="text-danger">*</span>ID Paket</label>
            <div class="form-group">
              <select name="id_paket" class="form-control">
                <option value="">Select Produk</option>
                <?php 
                foreach($all_paket as $paket)
                {
                  $selected = ($paket['id_paket'] == $this->input->post('id_paket')) ? ' selected="selected"' : "";

                  echo '<option value="'.$paket['id_paket'].'" '.$selected.'>'.$paket['nama'].'</option>';
                } 
                ?>
              </select>
              <span class="text-danger"><?php echo form_error('id_paket');?></span>
            </div>
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Nama</label>
        <input type="text" class="form-control" id="nama" name="nama" placeholder="" value="{nama}">
      </div>
    </div>
    <!-- /.box-body -->

    <div class="box-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
      <a href="<?php  echo base_url('harga') ?>" class="btn btn-danger">Cancel </a>
    </div>
    
  </form>
{/result}
</section><!-- /.content -->

<?php 
$this->load->view('_partials/js');
?>
<!--tambahkan custom js disini-->
<?php
$this->load->view('_partials/footer');
?>