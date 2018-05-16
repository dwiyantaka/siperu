<?php
 $this->load->view('template/header');
?>

<div class="content-wrapper"> <!--
		<section class="content-header">
			<h3 align="center">Profil</h3>
		</section> -->
		<section class="content">
      <div class="login-box">

        <div class="login-logo">
          <h3>Profil</h3>
        </div>

        <div class="login-box-body">
          <div class="form-group">
            <label>Username: </label>
            <div class="input-group">
              <input id="username" class="form-control" value="<?php echo $user->username; ?>" disabled>
              <span class="input-group-btn">
                <button id="btn_username" class="btn bg-blue btn-flat">ganti</button>
                <button id="btn_username_new" class="btn bg-blue btn-flat" style="display:none" disabled>update</button>
                <button id="btn_cancel" class="btn btn-danger btn-flat" style="display:none">batal</button>
              </span>
            </div>
          </div>
          <div class="form-group">
            <label>Password: </label>
            <div class="input-group">
              <input class="form-control" placeholder="*******" disabled>
              <span class="input-group-btn">
                <button class="btn bg-blue btn-flat" id="btn_pwd">ganti</button>
              </span>
            </div>
          </div>
          <div class="form-group">
            <label>Level: </label>
            <input class="form-control" value="<?php echo $user->level; ?>" disabled>
          </div>
          <?php if( $user->level == 'petugas' ){  ?>
          <div class="form-group">
            <label>Bidang: </label>
            <input class="form-control" value="<?php echo $user->nama; ?>" disabled>
          </div>
          <?php } ?>
  			</div>
  		</div>
      <?php $this->load->view('modal_profil'); ?>
	  </section>

</div>

<?php
  $this->load->view('template/footer');
  $this->load->view('ajax_profil');
?>
