document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
        //PARA QUE EL CALENDARIO INICIE EN UNA FECHA ELEGIDA
      defaultDate: new Date(2020,10,16), 
      Array, default: [],
      hiddenDays: [1],
      plugins: [ 'dayGrid', 'interaction', 'timeGrid', 'list' ],
      header:{
          left: 'prev, next today',
          center: 'title',
          right:''
      },
      //ESTO ES PARA CUANDO HAGAS CLICK ES UNA FECHA SE PRESENTE UN MODAL
      dateClick:function(info){
          
          //ASIGNAMOS AL CAMPO FECHA EL VALOR DE FECHA OBTENIDO MEDIANTE dateStr
          $('#txtFecha').val(info.dateStr);


        //VALIDAR FECHA
            //FECHA 1
            var fec1 = document.getElementById("txtFecha").value;	
            console.log(fec1);
            //FECHA 2
            var date = new Date();
            var yyyy = date.getFullYear().toString();
            var mm = (date.getMonth()+1).toString().length == 1 ? "0"+(date.getMonth()+1).toString() : (date.getMonth()+1).toString();
            var dd  = (date.getDate()).toString().length == 1 ? "0"+(date.getDate()).toString() : (date.getDate()).toString();
            var fec2 = yyyy+"-"+mm+"-"+dd;
            console.log(fec2);
            if(fec1>=fec2){
            $('#exampleModal').modal();
            }else{
               
                swal({
                    icon: 'error', 
                    title: 'Por favor seleccionar una fecha actual o mayor.'
                    
                  })
            }
      },
      
      eventClick:function(info){

          
          //RECUPERAMOS INFORMACION DE FECHA Y HORA
          mes= (info.event.start.getMonth()+1);
          dia= (info.event.start.getDate());
          anio= (info.event.start.getFullYear());
          
          //PARA AGREGAR 0 POR EJEMPLO '09' EN VES DE '9'
          mes = (mes<10)?"0"+mes:mes;
          dia = (dia<10)?"0"+dia:dia;
          //ESTO ES PARA EL MANEJO DE HORAS 
          minutos = info.event.start.getMinutes();
          hora = info.event.start.getHours();
          minutos = (minutos<10)?"0"+minutos:minutos;
          hora = (hora<10)?"0"+hora:hora;

          horario= (hora+":"+minutos);

      },
      
      //AQUI MANDAMOS LA URL DE EVENTOS PARA QUE SE VEA EL EVENTO GUARDADO EN LA BASE DE DATOS
      events: url_show

    });
    calendar.setOption('locale','Es');
    calendar.render();
    
  });
 