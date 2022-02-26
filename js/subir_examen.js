$(document).ready(function(){


    var paciente = $('#paciente');

            
    //Ejecutar accion al cambiar de opcion en el select de las bandas
    $('#cedula').change(function(){

        var ced = $(this).val();

        if(ced==0){
            alert("seleccione algo");
        }
    //obtener el id seleccionado
        let arr=ced.split('_');
        var cedula=arr[1];

        /*Inicio de llamada ajax*/
        $.ajax({
        data: {cedula:cedula}, //variables o parametros a enviar, formato => nombre_de_variable:contenido
        dataType: 'html', //tipo de datos que esperamos de regreso
        type: 'POST', //mandar variables como post o get
        url: 'get_nombres.php' //url que recibe las variables
        }).done(function(data){ //metodo que se ejecuta cuando ajax ha completado su ejecucion             
        alert(data);
        paciente.val(data); //establecemos el contenido html de discos con la informacion que regresa ajax             
        
        });
        /*fin de llamada ajax*/

});


});