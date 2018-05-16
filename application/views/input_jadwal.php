<?php
 $this->load->view('template/header');
?>

<div class="content-wrapper">
	<div class="container">
		<section class="content-header">
			<h3>Input Jadwal Rapat</h3>
		</section>
		<section class="content">
			<form method="post" id="form_input">
			<div class="box box-danger">
				<div class="box-body">
					<div class="row">
						<div class="col-md-6">
								<div class="form-group">
									<label>Nama Bidang: </label>
                  <?php if ( $this->session->userdata('level') == 'admin' ){ ?>
                    <select type="text" name="bidang" class="form-control" required>
                      <option></option>
                      <?php foreach ($bidang as $b): ?>
                      <option value="<?php echo $b->id_bidang; ?>"><?php echo $b->nama; ?></option>
                      <?php endforeach; ?>
                    </select>
                  <?php }elseif ( $this->session->userdata('level') == 'petugas' ) { ?>
                    <select type="text" class="form-control" required disabled>
                      <option selected><?php echo $this->session->userdata('bidang'); ?></option>
                      <input type="hidden" name="bidang" value="<?php echo $this->session->userdata('id_bidang'); ?>" />
                    </select>
                  <?php } ?>
								</div>
								<div class="form-group">
									<label>Tanggal Rapat: </label>
									<div class="input-group date">
										<div class="input-group-addon">
											<i class="fa fa-calendar"></i>
										</div>
										<input type="text" name="tgl_rapat" class="form-control" id="datepicker" required>
									</div>
								</div>

								<div class="form-group">
									<label>Waktu Rapat: </label>
									<div class="input-group date">
										<div class="input-group-addon">
											<i class="fa fa-clock-o"></i>
										</div>
										<select type="text" name="waktu_rapat" class="form-control" id="waktu_rapat" required>
											<option></option>
											<option value="pagi">Pagi (07:00 s/d 12:00)</option>
											<option value="siang">Siang (12:00 s/d Selesai)</option>
										</select>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Ruangan:</label>
									<select name="ruangan" id="ruangan" class="form-control">
									</select>
								</div>

								<div class="form-group">
									<label>Nama Acara:</label>
									<input type="text" name="nama_acara" class="form-control">
								</div>

								<div class="form-group">
									<label>Keterangan: </label>
									<!--<input type="text" name="keterangan" class="form-control" required> -->
									<textarea class="form-control" name="keterangan" cols="40" rows="3"></textarea>
								</div>
							</div>
							</div>
							<div class="box-footer">
								<button class="btn btn-default pull-left" style="display:none">Batal</button>
								<button type="submit" name="submit" value="submit" id="input" class="btn btn-info pull-right">Simpan</button>
							</div>
						</div>
					</form>
					</div>
				</div>
			</div>
	    </section>
	</div>
</div>

<?php
$this->load->view('template/footer');
$this->load->view('ajax_input_jadwal');
?>
