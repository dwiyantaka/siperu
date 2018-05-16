<script type="text/javascript">
$(document).ready(function(){
	$('.tampilkanModal').click(function(){
		$('#Modal').modal('show');
  });

	$('.tutupModal').click(function(){
          $('#Modal').modal('hide');
      });

	$("#submit").click(function(event){
		$.ajax({
			url     : base_url+'bidang/simpan',
      method  : 'post',
			dataType: 'json',
      data 		: {
				nama  : $('#namaBidang').val()
			},
      success : function(data){
				if (typeof data.error !== 'undefined'){
					swal( data.error, {icon:'warning'});
				}else {
					if (typeof data.error !== 'undefined'){
						swal( data.error, {icon:'warning'});
					}else {
						$('#Modal').modal('hide');
					  swal({
							title : "Tersimpan",
					    text  : data.sukses,
					    icon  : 'success',
					  }).then(function(){
							window.location.href = base_url+'admin/data_bidang';
					  })
					}
				}
      },
    });
		event.preventDefault();
	});

	$("#update").click(function(event){
		$.ajax({
    	url     : base_url+'bidang/ubah',
    	method  : 'post',
			dataType: 'json',
			data 		: {
				id    : $('#idBidang').val(),
				nama  : $('#namaBidang').val()
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
						window.location.href = base_url+'admin/data_bidang';
				  });
				}
      },
    })
		event.preventDefault();
	});

	var nama;
	$(".Edit").click(function(){
				var id = $(this).closest('tr').find('.id').text();
				nama = $(this).closest('tr').find('.nama').text();
				window.nama;
				$.ajax({
					method : "POST",
					data 	 : {
										id   : id,
										nama : nama,
					},
					processData: false,
					contentType: false,
					success: function(data){
						$('#Modal').modal('show');
						$('#namaBidang').val(nama);
						$('#idBidang').val(id);
						$('#submit').hide();
						$('#update').show();
					},
					error  : function(data){
						alert(data);
					}
				});
			});

	$("#namaBidang").on('input',function(){
				var namaBaru = $("#namaBidang").val();
				if (nama != namaBaru){
					$('#update').prop("disabled", false);
				}
			});

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
					url     : base_url+'bidang/hapus',
					dataType: 'json',
					data 	  : {id:id},
					success : function(data){
						if (typeof data.error !== 'undefined'){
							swal( data.error, {icon:'warning'});
						}else {
							$('#Modal').modal('hide');
							swal("Data terhapus", {
			      		icon: "success",
							}).then(function(){
								window.location.href = base_url+'admin/data_bidang';
							})
						}
					},
    		})
				event.preventDefault();
  		}
			})
		});
});
</script>
</body>
</html>
