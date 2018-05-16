<?php
	$this->load->view('template/header');
?>

<div class="content-wrapper">
	<div class="container">
		<section class="content-header">
			<h3>Data Kepala Bidang</h3>
		</section>
		<section class="content">
			<?php $this->load->view('modal_kepala_bidang'); ?>
			<div class="box box-danger">
				<div class="box-header with-border">
					<a href="#" class="btn btn-sm bg-blue tampilkanModal" role="button"><i class="fa fa-plus"></i> Tambah</a>
				</div>
				<div class="box-body">
					<table class="table table-bordered table-hover">
						<thead>
							<th>No</th>
							<th>Nama Bidang</th>
							<th>Jabatan</th>
							<th>Nama</th>
							<th>NIP</th>
							<th>Pangkat</th>
							<th>Aksi</th>
						</thead>
						<tbody>
							<?php
							foreach ($kepala_bidang as $data){ ?>
							<tr>
								<td class="counterCell"></td>
								<td class="id" hidden><?php echo $data->id; ?></td>
								<td class="bidang"><?php echo $data->nama_bidang; ?></td>
								<td class="jabatan"><?php echo $data->jabatan; ?></td>
								<td class="nama"><?php echo $data->nama; ?></td>
								<td class="nip"><?php echo $data->nip; ?></td>
								<td class="pangkat"><?php echo $data->pangkat; ?></td>
								<td>
									<button class="btn btn-sm bg-blue Edit"><i class="fa fa-pencil"></i></button>
									<button class="btn btn-sm bg-red Hapus"><i class="fa fa-trash"></i></button>
								</td>
							<tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
	    </section>
	</div>
</div>

<?php
	$this->load->view('template/footer');
	$this->load->view('ajax_data_kepala_bidang');
?>
