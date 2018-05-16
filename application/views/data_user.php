<?php
	$this->load->view('template/header');
?>

<div class="content-wrapper">
	<div class="container">
		<section class="content-header">
			<h3>Data User</h3>
		</section>
		<section class="content">
			<?php $this->load->view('modal_user'); ?>
			<div class="box box-danger">
				<div class="box-header with-border">
					<a href="#" class="btn btn-sm bg-blue tampilkanModal"><i class="fa fa-plus"></i> Tambah</a>
				</div>
				<div class="box-body">
					<table class="table table-bordered table-hover">
						<thead>
							<th>No</th>
							<th>Username</th>
							<th>Level</th>
              <th>Bidang</th>
              <th>Aksi</th>
						</thead>
						<tbody>
							<?php foreach ($user as $row): ?>
								<tr>
									  <td class="counterCell"></td>
										<td class="id" hidden><?php echo $row->id_user; ?></td>
										<td class="nama"><?php echo $row->username; ?></td>
										<td><?php echo $row->level; ?></td>
										<td><?php echo $row->nama; ?></td>
										<td>
											<button class="btn btn-sm bg-green Reset">Reset Password</button>
											<button class="btn btn-sm bg-red Hapus"><i class="fa fa-trash"></i></button>
										</td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
	    </section>
	</div>
</div>

<?php
$this->load->view('template/footer');
$this->load->view('ajax_data_user');
?>
