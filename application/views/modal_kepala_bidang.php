<div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="simpleModal">
	<div class="modal-dialog" role="document">
		    <div class="modal-content">
		        <div class="modal-header">
		            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		            <h4 class="modal-title" id="titleModal">Tambah Data Kepala Bidang</h4>
		        </div>

		        <div class="modal-body">
							<div class="form-group">
		           	<label>Nama Bidang: </label>
								<input id="id" hidden>
		            <?php echo $form_bidang; ?>
							</div>

							<div class="form-group">
		            <label>Jabatan: </label>
		            <input type="text" id="jabatan" class="form-control" placeholder="jabatan" required>
							</div>

							<div class="form-group">
		            <label>Nama Kepala:</label>
		            <input type="text" id="nama" class="form-control" placeholder="nama kepala bidang" required>
							</div>

							<div class="form-group">
		            <label>NIP:</label>
		            <input type="number" id="nip" class="form-control" placeholder="nip" required>
							</div>

							<div class="form-group">
		            <label>Pangkat: </label>
		            <input type="text" id="pangkat" class="form-control" placeholder="pangkat" required>
							</div>
		        </div>

		        <div class="modal-footer">
		            <button type="button" class="btn btn-default tutupModal">Batal</button>
		            <button type="submit" id="submit" class="btn btn-primary">Simpan</button>
								<button type="submit" id="update" class="btn btn-primary" style="display: none">Update</button>
		        </div>
		    </div>
		</div>
</div>
