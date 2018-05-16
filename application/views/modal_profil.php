<div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="simpleModal">
	<div class="modal-dialog" role="document">
		    <div class="modal-content">
		        <div class="modal-header">
		          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		          <h4 class="modal-title" id="titleModal">Ubah password</h4>
		        </div>

		        <div class="modal-body">
              <form id="myform">
                <div class="form-group">
                  <label>Password Lama:</label>
                  <input type="password" autocomplete="new-password" id="pwd_lama" class="form-control" required>
                </div>
                <div class="form-group">
                  <label>Password Baru:</label>
                  <input type="password" autocomplete="new-password" id="pwd_baru" class="form-control" required>
                  <span id="span_pwd_baru"></span>
                </div>
                <div class="form-group">
                  <label>Masukkan kembali password baru:</label>
                  <input type="password" autocomplete="new-password" id="verify_pwd" class="form-control" required>
                  <span id="span_verify_pwd"></span>
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
