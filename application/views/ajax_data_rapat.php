<script type="text/javascript">
$(document).ready(function(){
  table = $('.table').DataTable({
      ordering    : false,
      processing  : true,
      serverSide  : true,
      order       : [],
      destroy     : true,
      clear       : true,

      ajax: {
        url : base_url+'rapat/ambil_data',
        type:'post',
      },

      columnDefs: [
        {
          targets : 1,
          createdCell: function(td){
              $(td).attr('class', 'id');
              $(td).prop('hidden', 'true');
          }
        },
        {
          targets : 2,
          render  : function(data, type, row){
            return convertDate(data);
          }
        },
        {
          targets : 3,
          render  : function(data, type, row){
            return convertDate(data);
          }
        },
        {
          targets : 7,
          render  : function(data, type, row){
            if( row[8] == 0){
              //$(row).find('td').prop('disabled', 'true');
              //$(row).find('tr').prop('hidden', 'true');
              return data;
            }else{
              return data;
            }
          }
        },
        {
          targets   : 8,
          orderable : false,
          render    : function(data, type, row){
            if(data == 1){
              var a = '<a href="#" class="btn btn-sm bg-red Batal">Batalkan</a>';
            }else if (data == 0) {
              var a = '<i>dibatalkan</i>';
            }
            return a;
        },

      }],

      rowCallback: function(row, data, index){
        if(data[8] == 0){
          //$('td:eq(4)', row).html( '<b>A</b>' );
          //$(row).css('background-color', 'gray');
          $(row).attr('class', 'active');
          //$('td:eq(4)', row).css('background-color', 'gray');
          //$('td:eq(4)', row).prop('disabled', true);
        }
      },

      language: {
        sProcessing   : "Sedang memproses...",
        sLengthMenu   : "Tampilkan _MENU_ entri",
        sZeroRecords  : "Tidak ditemukan data yang sesuai",
        sInfo         : "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
        sInfoEmpty    : "Menampilkan 0 sampai 0 dari 0 entri",
        sInfoFiltered : "(disaring dari _MAX_ entri keseluruhan)",
        sInfoPostFix  : "",
        sSearch       : "Cari:",
        sUrl          : "",
        oPaginate     : {
          sFirst    : "Pertama",
          sPrevious : "Sebelumnya",
          sNext     : "Selanjutnya",
          sLast     : "Terakhir"
  	    }
      }
    });

  $('.table').on('click', '.Batal', function(){
    var id = $(this).closest('tr').find('.id').text();
    swal({
			title 		: "Jadwal Rapat Akan Dibatalkan. Lanjutkan?",
			icon  		: "warning",
			buttons   : true,
			dangerMode: true,
		}).then((willDelete) => {
      if (willDelete) {
        $.ajax({
          type     : 'post',
					url      : base_url+'rapat/batalkan',
          dataType : 'json',
					data 	   : {
            id : id,
          },
					success: function(data){
						if (typeof data.error !== 'undefined'){
              swal( data.error, {icon:'warning'});
						}else {
							$('#Modal').modal('hide');
							swal("Jadwal Rapat dibatalkan", {
			      		icon: "success",
							}).then(function(){
								window.location.href = base_url+'admin/pembatalan_rapat';
							})
						}
					},
    		})
				event.preventDefault();
  		}
		})
  });
});

function convertDate(dateString){
  var p = dateString.split(/\D/g)
  return [p[2],p[1],p[0] ].join("-")
}
</script>
</body>
</html>
