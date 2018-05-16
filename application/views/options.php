<?php
 $this->load->view('template/header');
?>

<div class="content-wrapper">
		<section class="content">
      <div class="options-box">

        <div class="options-logo">
          <h3>Options</h3>
        </div>

        <div class="options-box-body">
          <form id="myform">
            <div class="form-group">
              <label>Nama Singkat Sistem: </label>
              <input name="nama_singkat" class="form-control" placeholder="Nama Singkat Sistem" value="<?php echo $opt->nama_singkat; ?>" required disabled>
            </div>
            <div class="form-group">
              <label>Nama Panjang Sistem: </label>
              <input name="nama_panjang" class="form-control" placeholder="Nama Panjang Sistem" value="<?php echo $opt->nama_panjang; ?>" required disabled>
            </div>
            <div class="form-group">
              <label>Nama Perusahaan/Lembaga: </label>
              <input name="nama_tempat" class="form-control" placeholder="Nama Perusahaan/Lembaga" value="<?php echo $opt->nama_tempat; ?>" required disabled>
            </div>
            <div class="form-group">
              <label>Alamat Perusahaan/Lembaga: </label>
              <input name="alamat" class="form-control" placeholder="Alamat Perusahaan/Lembaga" value="<?php echo $opt->alamat; ?>" required disabled>
            </div>
            <button id="btn-edit" class="btn btn-block bg-blue" type="button">Edit</button>
            <div class="clearfix">
              <button id="btn-cancel" class="btn btn-default pull-left" type="button" style="display:none">Batal</button>
              <button id="btn-update" class="btn btn-info pull-right" type="submit" style="display:none">Update</button>
            </div>
          </form>
  			</div>
  		</div>
	  </section>
</div>

<?php
  $this->load->view('template/footer');
  $this->load->view('ajax_options');
?>
