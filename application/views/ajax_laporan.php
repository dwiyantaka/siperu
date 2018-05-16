<script>
$(document).ready(function(){
  $('#daterange').daterangepicker({
    locale :{
      format : 'DD/MM/YYYY',
      applyLabel : 'Terapkan',
      cancelLabel : 'Batal',
      customRangeLabel : 'Rentang Khusus',
      daysOfWeek : [ 'Min', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab' ],
      monthNames : [
        'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
      ],
      firstDay: 1,
    },
    autoclose           : true,
    showDropdowns       : true,
  });

  $('#daterange').on('apply.daterangepicker', function(ev, picker){
    $('button[name="pdf"]').prop('disabled', false);
    $('button[name="excel"]').prop('disabled', false);

    var awal  = picker.startDate.format('YYYY-MM-DD');
    var akhir = picker.endDate.format('YYYY-MM-DD');
    table = $(".table").DataTable({
      ordering: false,
      processing: true,
      serverSide: true,
      order : [],
      destroy : true,

      ajax: {
        url  : base_url+'laporan/ambil_data',
        type : 'post',
        data : {
          awal  : awal,
          akhir : akhir,
        },
      },
      columnDefs : [
      {
        "targets" : 1,
        "render"  : function(data, type, row){
          return convertDate(data);
        }
      },
      {
        "targets" : 2,
        "render"  : function(data, type, row){
          return convertDate(data);
        }
      }
      ],
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
  });

  function convertDate(dateString){
    var p = dateString.split(/\D/g)
    return [p[2],p[1],p[0] ].join("-")
  }
});
</script>
</body>
</html>
