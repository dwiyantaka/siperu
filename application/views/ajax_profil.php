<script>
$(document).ready(function(){
  $('#btn_username').click(function(){
    $('#username').prop('disabled', false);
    $('#username').focus();
    $('#btn_username').hide();
    $('#btn_username_new').show();
    $('#btn_cancel').show();
  });

  $(document).keyup(function(e){
    if (e.keyCode === 27) $('#btn_cancel').click();
  });

  $('#btn_cancel').click(function(){
    $('#username').prop('disabled', true);
    $('#btn_username').show();
    $('#btn_username_new').hide();
    $('#btn_cancel').hide();
  });

  usrnm = $('#username').val();
  $('#username').on('input', function(){
    if( $(this).val() == usrnm ){
      $('#btn_username_new').prop('disabled', true);
    }else{
      $('#btn_username_new').prop('disabled', false);
    }
  });

  $('#btn_username_new').click(function(e){
    $.ajax({
      url  : base_url+'user/ubah',
      type : 'post',
      dataType : 'json',
      data : { username : $('#username').val()},
      success : function(data) {
        swal({
          title : "Tersimpan",
          text  : data.sukses,
          icon  : 'success',
        }).then(function(){
          window.location.href = base_url+'admin/profil';
        });
      }
    })
    e.preventDefault();
  });

  $('#btn_pwd').click(function(){
    $('#Modal').modal('show');
  });

  $('.tutupModal').click(function(){
    $('#Modal').modal('hide');
  })

  var err;
  $('#Modal').on('input',function(){
    baru   = $('#pwd_baru');
    lama   = $('#pwd_lama');
    v_baru = $('#verify_pwd');

    baru.blur(function(){
      if( lama.val() == baru.val()){
        $('#span_pwd_baru').text('Password baru dan password lama sama');
        err = 1;
        window.err;
      }else{
        $('#span_pwd_baru').text('');
        err = 0;
        window.err;
      }
    });

    v_baru.blur(function(){
      if( v_baru.val() != baru.val()){
        $('#span_verify_pwd').text('Verifikasi password baru tidak sama');
        err = 1;
        window.err;
      }else{
        $('#span_verify_pwd').text('');
        err = 0;
        window.err;
      }
    });
  });

  $('#submit').click(function(e){
    if(err == 0){
      $.ajax({
        url      : base_url+'user/ubah',
        type     : 'post',
        dataType : 'json',
        data     : {
          pwd_lama : $('#pwd_lama').val(),
          pwd_baru : $('#pwd_baru').val()
        },
        success  : function(data){
          if (typeof data.error !== 'undefined'){
            swal(data.error, {icon:'warning'});
          }else{
            $('#Modal').modal('hide');
            swal({
              title : "Tersimpan",
              text  : data.sukses,
              icon  : 'success',
            }).then(function(){
              window.location.href = base_url+'admin/profil';
            });
          }
        }
      })
    }
    e.preventDefault();
  });

});
</script>
</body>
</html>
