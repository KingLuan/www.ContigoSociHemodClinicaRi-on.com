



$(document).ready(function() {

    jQuery.validator.addMethod("letras", function(value, element) {
        return this.optional(element) || /^[a-zA-Z ]+$/i.test(value);
    }, "Solo Letras");


    $("#formHC").validate({
        rules: {
            nombres : {
                letras:true,
                required: true,
                minlength: 3,
                maxlength: 20
            },
            apellidos: {
                letras:true,
                required: true,
                minlength: 3,
                maxlength: 25
            },
            edad: {
                required: true, 
                number: true, 
                min: 1,
                max: 110
            },
            telefono: {
                required: true, 
                number: true, 
                minlength: 10,
                maxlength: 10
            },
            cedula: {
                required: true, 
                number: true, 
                minlength: 10,
                maxlength: 10
            },
            codigo_historial: {
                required: true, 
                number: true, 
                minlength: 5,
                maxlength: 5
            },
            fecha_nacimiento: {
                required: true
            },
            foto: {
                required: true
            }

        },
        messages: {
            nombres : {
                letras: "solo letras",
                required: "Campo Obligatorio",
                minlength: "Minimo 3 letras",
                maxlength: "Maximo 20 letras"
            },
            apellidos: {
                letras: "solo letras",
                required: "Campo Obligatorio",
                minlength: "Minimo 3 letras",
                maxlength: "Maximo 25 letras"
            },
            edad: {
                required: "* Ingresa un valor", 
                number: "* Ingresa solo numeros", 
                min: $.validator.format("* Ingresa una cantidad igual o mayor a {0} digitos"), 
                max: $.validator.format("* Ingresa una cantidad igual o menor a {0} digitos")
            },
            telefono: {
                required: "* Ingresa un valor", 
                number: "* Ingresa solo numeros", 
                minlength: $.validator.format("* Ingresa una cantidad igual o mayor a {0} digitos"), 
                maxlength: $.validator.format("* Ingresa una cantidad igual o menor a {0} digitos")
            },
            cedula: {
                required: "* Ingresa un valor", 
                number: "* Ingresa solo numeros", 
                minlength: $.validator.format("* Ingresa una cantidad igual o mayor a {0} digitos"), 
                maxlength: $.validator.format("* Ingresa una cantidad igual o menor a {0} digitos")
            },
            codigo_historial: {
                required: "* Ingresa un valor", 
                number: "* Ingresa solo numeros", 
                minlength: $.validator.format("* Ingresa una cantidad igual o mayor a {0} digitos"), 
                maxlength: $.validator.format("* Ingresa una cantidad igual o menor a {0} digitos")
            },
            foto: {
                required:"fecha requerida"
            },
            foto: {
                required: "foto requerida"
            }
        },

        highlight: function(element) {
            $(element).css('background', '#ffdddd');
        },
        
        unhighlight: function(element) {
            $(element).css('background', '#ffffff');
        }

    });


     


  });