<script>
  $(document).ready(function(){
      $('.tampilkanModal').click(function(){
          $('#Modal').modal('show');
      });
      $('.tutupModal').click(function(){
          $('#Modal').modal('hide');
      });

      $('#calendar').fullCalendar({
        defaultView : 'month',
        height : 490,
        /**header    : {
          left  : 'prev,next today',
          center: 'title',
          right : 'month,agendaWeek,agendaDay'
        },
        buttonText: {
          today: 'today',
          month: 'month',
          week : 'week',
          day  : 'day'
        },**/

        eventSources    : [
          {
            url  : base_url+'admin/getJadwal',
            type : 'POST',
            textColor    : 'white',
          },
        ],
        timeFormat : 'H(:mm)',
        slotLabelFormat:'HH:mm',
        eventClick:  function(event, jsEvent, view) {
              var awal = moment(event.start).format("HH:mm");
              var akhir = moment(event.end).format("HH:mm");

              $('#modalTitle').find('h3').remove();
              $('#modalTitle').append('<h3 class="modal-title" style="color: '+event.color+' ">'+event.title+'</h3>');
              $('#bidang').html('Rapat Bidang : <b>'+event.bidang+'</b>');
              $('#jam').html('Pukul <b>'+awal+' s/d '+akhir+'</b>');
              $('#ruang').html('di <b>'+event.ruang+'</b>');
              $('#keterangan').html(event.description);
              //$('#eventUrl').attr('href',event.url);
              $('#fullCalModal').modal();
        }
        });

      $('#listCal').fullCalendar({
        defaultView: 'listMonth',
        height : 490,
        //resourceLabelText: 'Rooms',
        eventSources    : [
          {
            url  : base_url+'admin/getJadwal',
            type : 'post',
            //color: '#f56954', //red
            textColor    : 'white',
          },
        ],
        listDayFormat : 'dddd, D MMMM Y',
        listDayAltFormat : false,
        eventRender: function(event, element){
          var els = $(element).find('td.fc-list-item-title');
          var app = '<a>'+event.title+'</a>  <strong>di '+event.ruang+'</strong><div class="pull-right"><em style="color:'+event.color+'">'+event.bidang+'</em></div>';

          els.html(app);
        },

        eventClick:  function(event, jsEvent, view) {
              var awal = moment(event.start).format("HH:mm");
              var akhir = moment(event.end).format("HH:mm");

              $('#modalTitle').find('h3').remove();
              $('#modalTitle').append('<h3 class="modal-title" style="color: '+event.color+' ">'+event.title+'</h3>');
              //$('#modalTitle').css('textColor', color);
              $('#bidang').html('<b>'+event.bidang+'</b>');
              $('#jam').html('Pukul <b>'+awal+' s/d '+akhir+'</b>');
              $('#ruang').html('di <b>'+event.ruang+'</b>');
              $('#keterangan').html(event.description);
              //$('#eventUrl').attr('href',event.url);
              $('#fullCalModal').modal();
          }
      })
  });
</script>
</body>
</html>
