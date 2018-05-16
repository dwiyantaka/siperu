<?php
	$this->load->view('template/header');
?>

<div class="content-wrapper">
	<div class="container">
		<section class="content-header">
			<h3>Pembatalan Rapat</h3>
		</section>
		<section class="content">
      <div class="box box-danger">
          <div class="box-body">
            <table class="table table-bordered table-hover">
  						<thead>
  							<th>No</th>
                <th hidden>id</th>
								<th>Tanggal Pemesanan</th>
								<th>Tanggal Rapat</th>
  							<th>Nama Bidang</th>
								<th>Nama Ruangan</th>
                <th>Waktu Rapat</th>
                <th>Nama Acara</th>
                <th>Aksi</th>
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
	$this->load->view('ajax_data_rapat');
?>
