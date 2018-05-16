<script>
  $(document).ready(function(){
    $('#btn-edit').click(function(){
      $(this).hide();
      $('input[name="nama_singkat"]').prop('disabled', false);
      $('input[name="nama_panjang"]').prop('disabled', false);
      $('input[name="nama_tempat"]').prop('disabled', false);
      $('input[name="alamat"]').prop('disabled', false);
      $('#btn-cancel').show();
      $('#btn-update').show();
      $('input[name="nama_singkat"]').focus();
    });

    $('#btn-cancel').click(function(){
      $('#btn-cancel').hide();
      $('#btn-update').hide();
      $('input[name="nama_singkat"]').prop('disabled', true);
      $('input[name="nama_panjang"]').prop('disabled', true);
      $('input[name="nama_tempat"]').prop('disabled', true);
      $('input[name="alamat"]').prop('disabled', true);
      $('#btn-edit').show();
    });

    $('#btn-update').click(function(e){
      values = $('#myform').serialize();
      e.preventDefault();
      swal({
        title 		: 'Data akan diubah?',
        icon  		: "warning",
        buttons   : ['Batal', 'Lanjutkan'],
      }).then((willUpdate) => {
          if (willUpdate) {
            $.ajax({
              method : 'post',
              url    : base_url+'options/update',
              dataType : 'json',
              data 	 : values,
              success: function(data){
                if (typeof data.error !== 'undefined'){
                  swal( data.error, {icon:'warning'});
                }else {
                  $('#Modal').modal('hide');
                  swal("Data terubah", {
                    icon: "success",
                  }).then(function(){
                     window.location.href = base_url+'admin/options';
                  })
                }
              },
            })
          }
      });
    })
  });
</script>
</body>
</html>
