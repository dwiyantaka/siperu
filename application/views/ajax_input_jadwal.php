<script>
$(document).ready(function(){
  $('#waktu_rapat').select2({
    placeholder : 'Pilih Waktu',
    minimumResultsForSearch: Infinity,
  });

  $('#ruangan').select2({
    placeholder : 'Pilih Ruangan',
    minimumResultsForSearch : Infinity
  });

  $('select[name="bidang"]').select2({
    placeholder : 'Pilih Bidang',
    minimumResultsForSearch : Infinity
  });

  $('#datepicker').daterangepicker({
    locale              : { format: 'DD-MM-YYYY' },
    singleDatePicker    : true,
    autoclose           : true,
    showDropdowns       : true,
    minDate             : new Date(),
  });

  $('#datepicker').on('apply.daterangepicker', function(){
    $('#waktu_rapat').val('').trigger('change');
    $('#ruangan').val('').trigger('change');
  });

  $('form').submit(function(e){
    var values = $(this).serialize();
    $.ajax({
      method   : 'post',
      url      : base_url+'input_jadwal/simpan_jadwal',
      dataType : 'json',
      data     : values,
      success  : function(data){
        if (typeof data.error !== 'undefined'){
          swal( data.error, {icon:'warning'});
        }else {
          swal({
            title : "Tersimpan",
            text  : data,
            icon  : 'success',
          }).then(function(){
            window.location.href = base_url+'admin';
          });
        }
      }
    });
    e.preventDefault();
  });

  $('#waktu_rapat').on('change', function(e){
    if ($(this).val() != ''){
      $.ajax({
        method  :'post',
        url     : base_url+'input_jadwal/getRuangan',
        dataType: 'html',
        data    : {
          tgl_rapat:$('#datepicker').val(),
          waktu_rapat:$('#waktu_rapat').val(),
        },
        success :function(result){
          $('#ruangan').find('option').remove();

          $('#ruangan').append(result);
        }
      })
      e.preventDefault();
    }
  });
});
</script>
</body>
</html>
