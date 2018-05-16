<script type="text/javascript">
	 $(document).ready(function(){
      $('.tampilkanModal').click(function(){
          $('#Modal').modal('show');
      });

      $('.tutupModal').click(function(){
          $('#Modal').modal('hide');
      });

			$('#bidang').select2({
				placeholder : 'Silahkan pilih',
				width : '100%',
				minimumResultsForSearch: Infinity
			})

      $("#submit").click(function(event){
				var url = base_url+'kepala_bidang/simpan';
				ajax(url, event);
      });

			$("#update").click(function(event){
				var url = base_url+'kepala_bidang/ubah';
				ajax(url, event);
      });

			$(".Edit").click(function(){
				var id      = $(this).closest('tr').find('.id').text();
				var bidang  = $(this).closest('tr').find('.bidang').text();
				var nama    = $(this).closest('tr').find('.nama').text();
				var jabatan = $(this).closest('tr').find('.jabatan').text();
				var nip 		= $(this).closest('tr').find('.nip').text();
				var pangkat = $(this).closest('tr').find('.pangkat').text();

				$.ajax({
					method: 'post',
					data : {
						id: id,
						nama: nama,
						jabatan: jabatan,
						nip: nip,
						pangkat: pangkat
					},
					processData: false,
					contentType: false,
					success: function(){
						$('#Modal').modal('show');
						$('#id').val(id);
						$newOption = '<option>'+bidang+'</option>';
						$('#bidang').html($newOption);
						$('#bidang').prop('disabled', true);
						$('#nama').val(nama);
						$('#jabatan').val(jabatan);
						$('#nip').val(nip);
						$('#pangkat').val(pangkat);
						$('#submit').hide();
						$('#update').show();
					}
				})
			})

			$(".Hapus").click(function(event){
				var id = $(this).closest('tr').find('.id').text();
				swal({
					title 		: "Data akan dihapus. Yakin?",
					text  		: "Anda tidak bisa mengembalikan data yang terhapus",
					icon  		: "warning",
					buttons   : true,
					dangerMode: true,
				}).then((willDelete) => {
  					if (willDelete) {
							$.ajax({
								method  : 'post',
								url     : base_url+'kepala_bidang/hapus',
								dataType: 'json',
								data 	  : { id:id },
								success : function(data){
									if (typeof data.error !== 'undefined'){
										swal( data.error, {icon:'warning'});
									}else {
										$('#Modal').modal('hide');
										swal("Data terhapus", {
			      					icon: "success",
										}).then(function(){
								       window.location.href = base_url+'admin/data_kepala_bidang';
										})
									}
								},
    					})
							event.preventDefault();
  					}
					})
				});

		function ajax(url, event){
			$.ajax({
			url     : url,
			method  : 'post',
			dataType: 'json',
			data 	  : {
				id          : $('#id').val(),
				bidang 	    : $('#bidang').val(),
				jabatan			: $('#jabatan').val(),
				nama	      : $('#nama').val(),
				nip         : $('#nip').val(),
				pangkat     : $('#pangkat').val(),
			},
			success : function(data){
				if (typeof data.error !== 'undefined'){
					swal( data.error, {icon:'warning'});
				}else {
					$('#Modal').modal('hide');
					swal({
						title : "Tersimpan",
						text  : data.sukses,
						icon  : 'success',
					}).then(function(){
						window.location.href = base_url+'admin/data_kepala_bidang';
					});
				}
			}
			})
			event.preventDefault();
			}
  });
</script>
</body>
</html>
