<!-- Modal dialog -->
				<div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="simpleModal">
		    		<div class="modal-dialog" role="document">
		        		<div class="modal-content">
		            		<div class="modal-header">
		                		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		                			<h4 class="modal-title" id="titleModal">Tambah Data</h4>
		            		</div>
		            		<div class="modal-body">
		            			<label>Nama Lengkap: </label>
		                		<input type="text" id="namaLengkap" class="form-control" placeholder="nama lengkap" autofocus>
		                		<label>Tanggal Lahir: </label>
		                		<div class="input-group date">
		                  			<div class="input-group-addon">
		                    		<i class="fa fa-calendar"></i>
		                  			</div>
		                  		<input type="text" class="form-control pull-right" id="datepicker">
		                		</div>

		            		</div>
		            		<div class="modal-footer">
		                		<button type="button" class="btn btn-default tutupModal">Hide modal</button>
		                		<button type="button" class="btn btn-primary saveModal">Save</button>
		            		</div>
		        		</div>
		    		</div>
				</div>

				<div id="fullCalModal" class="modal fade">
	    			<div class="modal-dialog">
	        			<div class="modal-content">
	            			<div class="modal-header" align="center" id="modalTitle">
	                		<!-- <h3 id="modalTitle" class="modal-title" style="color: #f56954"></h3> -->
	            			</div>
	            			<div id="modalBody" class="modal-body">
											<table class="table table-bordered table-striped">
												<tr>
													<td>Penyelenggara</td> <td>:</td> <td id="bidang"></td>
												</tr>
												<tr>
													<td>Waktu</td> <td>:</td> <td id="jam"></td>
												</tr>
												<tr>
													<td>Tempat</td> <td>:</td> <td id="ruang"></td>
												</tr>
												<tr>
													<td>Keterangan</td> <td>:</td> <td id="keterangan"></td>
												</tr>
											</table>
	            			</div>
	            			<div class="modal-footer">
	                			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	            			</div>
	        			</div>
	    			</div>
				</div>
			</div>
