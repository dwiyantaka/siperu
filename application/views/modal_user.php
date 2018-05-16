<div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="simpleModal">
	<div class="modal-dialog" role="document">
		    <div class="modal-content">
		        <div class="modal-header">
		          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		          <h4 class="modal-title" id="titleModal">Tambah Data User</h4>
		        </div>

		        <div class="modal-body">
              <form id="myform">
                <div class="form-group">
                  <label>Username:</label>
                  <input type="text" autocomplete="off" name="username" class="form-control" required>
                </div>
                <div class="form-group">
                  <label>Password:</label>
                  <input type="password" autocomplete="new-password" name="password" class="form-control" required>
                </div>
                <div class="form-group">
                  <label>Level:</label>
                  <select type="text" name="level" class="form-control" required>
                    <option></option>
                    <option value="admin">Administrator</option>
                    <option value="petugas">Petugas</option>
                  </select>
                </div>
                <div class="form-group" id="bidang" style="display:none">
                  <label>Bidang:</label>
                  <select type="text" name="bidang" class="form-control">
                    <option></option>
                    <?php foreach ($bidang as $b): ?>
                    <option value="<?php echo $b->id_bidang; ?>"><?php echo $b->nama; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
		        </div>

		        <div class="modal-footer">
              <button type="button" class="btn btn-default tutupModal">Batal</button>
		          <button type="submit" id="submit" class="btn btn-primary">Simpan</button>
            </form>
		        </div>
		    </div>
	</div>
</div>
