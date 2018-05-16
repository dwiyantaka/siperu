<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Masuk</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/skins/skin-red.min.css">
</head>

<body class="hold-transition login-page">
	<div class="login-box">
    <div class="login-logo">
      <a><?php echo $this->session->userdata('nama_singkat'); ?></a>
    </div>
    <div class="login-box-body">
    	<p class="login-box-msg"><?php echo $desc; ?></p>
    	<?php echo form_open("auth/cek_login"); ?>
    	<div class="form-group has-feedback">
      		<input type="username" class="form-control" name="username" placeholder="username" required>
      		<span class="fa fa-user form-control-feedback"></span>
      	</div>
      	<div class="form-group has-feedback">
      		<input type="password" class="form-control" name="password" placeholder="password" required>
      		<span class="fa fa-key form-control-feedback"></span>
      	</div>
        <button type="submit" class="btn btn-primary btn-block btn-flat">Masuk</button>
        <?php form_close() ?>
      </div>
  </div>
</div>
</body>
</html>
