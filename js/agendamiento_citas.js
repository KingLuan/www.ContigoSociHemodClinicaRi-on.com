

        $(document).ready(function(){
            
            var cedula = $('#cedula');

            

            //Ejecutar accion al cambiar de opcion en el select de las bandas
            $('#paciente').change(function(){

                var pacient = $(this).val();

                if(pacient==0){
                    alert("seleccione un paciente");
                }
            //obtener el id seleccionado
                let arr=pacient.split('_');
                var paciente=arr[1];

                /*Inicio de llamada ajax*/
                $.ajax({
                data: {paciente:paciente}, //variables o parametros a enviar, formato => nombre_de_variable:contenido
                dataType: 'html', //tipo de datos que esperamos de regreso
                type: 'POST', //mandar variables como post o get
                url: 'get_cedula.php' //url que recibe las variables
                }).done(function(data){ //metodo que se ejecuta cuando ajax ha completado su ejecucion             
                //alert(data);
                cedula.val(data); //establecemos el contenido html de discos con la informacion que regresa ajax             
                
                });
                /*fin de llamada ajax*/

        });


       


        $('input[type="file"]').on('change', function(){
            var ext = $( this ).val().split('.').pop();
            if ($( this ).val() != '') {
            if(ext == "pdf"){
                alert("La extensión es: " + ext);
                if($(this)[0].files[0].size > 5048576){
                console.log("El documento excede el tamaño máximo");
                toastr.error('¡Precaución!');
                toastr.error("Se solicita un archivo no mayor a 5MB. Por favor verifica.");          
                $(this).val('');
                }else{
                $("#modal-gral").hide();
                }
            }
            else
            {
                $( this ).val('');
                alert("Extensión no permitida: " + ext);
            }
            }
        });

        });



            