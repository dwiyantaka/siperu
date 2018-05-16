<script>
$(document).ready(function(){
  $('.tampilkanModal').click(function(){
      $('#Modal').modal('show');
  });

  $('.tutupModal').click(function(){
      $('#Modal').modal('hide');
  });

  $('select[name="level"]').select2({
    placeholder : 'Silahkan pilih',
    width : '100%',
    minimumResultsForSearch: Infinity
  });

  $('select[name="level"]').on('change', function(){
    val = $(this).val();
    if( val == 'petugas'){
      $('#bidang').show();
      $('select[name="bidang"]').prop('required', true);
    }else {
      $('#bidang').hide();
      $('select[name="bidang"]').prop('required', false);
    }
  });

  $('select[name="bidang"]').select2({
    placeholder : 'Silahkan pilih',
    width : '100%',
    minimumResultsForSearch: Infinity
  });

  $('#myform').submit(function(e){
    data = $(this).serialize();
    $.ajax({
      url      : base_url+'user/simpan',
      method   : 'post',
      dataType : 'json',
      data     : data,
      success  : function(data){
        if (typeof data.error !== 'undefined'){
          swal( data.error, {icon:'warning'});
        }else {
          swal({
            title : "Tersimpan",
            text  : data.sukses,
            icon  : 'success',
          }).then(function(){
            window.location.href = base_url+'admin/data_user';
          });
        }
      }
    })
    e.preventDefault();
  });

  $(".Hapus").click(function(event){
    var id   = $(this).closest('tr').find('.id').text();
    var nama = $(this).closest('tr').find('.nama').text();
    swal({
      title 		: "'"+nama+"' akan dihapus. Yakin?",
      icon  		: "warning",
      buttons   : true,
      dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
          $.ajax({
            method : 'post',
            url    : base_url+'user/hapus',
            dataType : 'json',
            data 	 : { id:id },
            success: function(data){
              if (typeof data.error !== 'undefined'){
                swal( data.error, {icon:'warning'});
              }else {
                $('#Modal').modal('hide');
                swal("Data terhapus", {
                  icon: "success",
                }).then(function(){
                   window.location.href = base_url+'admin/data_user';
                })
              }
            },
          })
          event.preventDefault();
        }
    });
  });

  $(".Reset").click(function(event){
    var id   = $(this).closest('tr').find('.id').text();
    var nama = $(this).closest('tr').find('.nama').text();
    swal({
      title 		: "'"+nama+"' akan direset passwordnya. Yakin?",
      text      : "Password default setelah reset adalah 1234",
      icon  		: "warning",
      buttons   : true,
      dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
          $.ajax({
            method : 'post',
            url    : base_url+'user/reset_password',
            dataType : 'json',
            data 	 : { id:id },
            success: function(data){
              if (typeof data.error !== 'undefined'){
                swal( data.error, {icon:'warning'});
              }else {
                $('#Modal').modal('hide');
                swal( data.sukses, {
                  icon: "success",
                }).then(function(){
                   window.location.href = base_url+'admin/data_user';
                })
              }
            },
          })
          event.preventDefault();
        }
    });
  });





});
</script>
