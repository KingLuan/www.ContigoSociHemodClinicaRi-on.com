$(document).ready(function () {
  if ($('#ruc').length) {
    $('#ruc').keyup(function (e) {
        e.preventDefault();
        var no = $('#ruc').val();
        var action = 'recup';

        $.ajax({
          url: 'ajax.php',
          type: 'POST',
          async: true,

          data: { action: action, historia_clinica: no },
          success: function (response) {

              console.log(response);

              if (response  == 0) {
                var $nombre = $('#nombres');
                $('#id_historias').val('');
                $nombre.val('');
                alert("Este numero de cedula no existe en la lista de pacientes registrados");

              }else {
                //var data =JSON.parse(JSON.stringify(response));


                var data = JSON.parse(response);
                var $nombre = $('#nombres');
                $nombre.val(data.nombres + ' ' + data.apellidos);
                $('#id_historias').val(data.id_historias);
                $nombre.removeAttr('disabled');
                $('#fecha_cita').removeAttr('disabled');
                $('#hora_cita').removeAttr('disabled');
                $('#medico').removeAttr('disabled');
                $('#horario').removeAttr('disabled');
                $('#especialidad').removeAttr('disabled');
              }
          }
          ,
          error: function (error)
          {
            console.log(error);
          }
        });
    });
  }
            //calcular edad por medio de input date hacia un input Text
            $('#fecha_nacimiento').on('change', function (){
              var fecha = $(this).val();
              var hoy = new Date();
              var cumpleanos = new Date(fecha);
              var tedad = hoy.getFullYear() - cumpleanos.getFullYear();
              var m = hoy.getMonth() - cumpleanos.getMonth();



              if (m < 0 || (m === 0 && hoy.getDate() < cumpleanos.getDate())) {
                  tedad--;
              }
              $('#edad').val(tedad);
            });



            /*$('.cedula').keyup(function (e) {
              var cedd = $(this).val();
              e.preventDefault();
              $.ajax({
                url: 'validarcamposexistentes.php',
                type: 'POST',
                async: true,
                data: { cedula: cedd },
                success: function (response) {
                  //echo "<script> alert('cedula no existe en el registro de pacientes'); </script>";
                  console.log(response);
                  //if (response > 0) {
                    //alert('cedula existe en el registro de pacientes');
                  //}else {
                    //alert('cedula no existe en el registro de pacientes');
                  //}


                }
                ,
                error: function (error)
                {
                  //echo "<script> alert('cedula no existe en el registro de pacientes'); </script>";
                  console.log(error);
                }
              });
            });*/


});
