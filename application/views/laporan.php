<?php
	$this->load->view('template/header');
?>

<div class="content-wrapper">
	<div class="container">
		<section class="content-header">
			<h3>Laporan</h3>
		</section>
		<section class="content">
			<?php echo form_open('laporan/export', array( 'class' => 'form-inline')); ?>
      <!--  <div class="form-inline"> -->
				<label class="control-label">Pilih Tanggal: </label>
        <input type="text" name="date_range" class="form-control" id="daterange">
        <button type="submit" name="pdf" value="pdf" class="btn btn-default" disabled style="display:none">Export PDF</button>
				<button type="submit" name="excel" value="excel" class="btn bg-green" disabled><i class="fa fa-file-excel-o"></i> Export Excel</button>
			<?php echo form_close(); ?>
      <!-- </div> -->
			<br></br>
      <div class="box box-danger">
          <div class="box-body">
            <table class="table table-bordered table-hover">
  						<thead>
  							<th>No</th>
								<th>Tanggal Pemesanan</th>
								<th>Tanggal Rapat</th>
  							<th>Nama Bidang</th>
								<th>Nama Ruangan</th>
                <th>Waktu Rapat</th>
                <th>Nama Acara</th>
                <th>Keterangan</th>
  						</thead>
  						<tbody>
  						</tbody>
  					</table>
				  </div>
			  </div>
	  </section>
	</div>
</div>

<?php
	$this->load->view('template/footer');
	$this->load->view('ajax_laporan');
?>
