<?php
	$this->load->view('template/header');
?>

<div class="content-wrapper">
	<div class="content">
		<div class="row">
			<?php $this->load->view('modal'); ?>
			<div class="col-md-3">
			 	<!-- <div class="box box-danger" id="calendar"></div> -->

					<div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo $month_count; ?></h3>

              <p>Agenda Rapat di Bulan <?php echo $month; ?></p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
          </div>
					<div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo $year_count; ?></h3>

              <p>Agenda Rapat di Tahun <?php echo $year; ?></p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
          </div>
					<div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo $total_count; ?></h3>

              <p>Total Agenda Rapat</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
          </div>

					<div class="small-box bg-red">
            <div class="inner">
              <h3><?php echo $cancel_count; ?></h3>

              <p>Total Pembatalan</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
          </div>
			</div>
			<div class="col-md-9">
				<div class="box box-danger" id="listCal"></div>
			</div>


		</div>
	</div>
</div>

<?php
	$this->load->view('template/footer');
	$this->load->view('ajax_index');
?>
