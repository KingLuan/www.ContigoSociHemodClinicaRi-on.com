$(document).ready(function() {

    jQuery.validator.addMethod("letras", function(value, element) {
        return this.optional(element) || /^[ a-záéíóúüñ]*$/i.test(value);
    }, "Solo Letras");

    jQuery.validator.addMethod("alphanumeric", function(value, element) {
        return this.optional(element) || /^[\w ]+$/i.test(value);
      }, "letras y numeros");


    $("#formE").validate({
        rules: {
            nombre : {
                letras:true,
                required: true,
                minlength: 3,
                maxlength: 20
            }, 
            apellido : {
                letras:true,
                required: true,
                minlength: 3,
                maxlength: 20
            },
            cedula: {
                required: true, 
                number: true, 
                minlength: 10,
                maxlength: 10
            },
            edad: {
                required: true, 
                number: true, 
                min: 1,
                max: 110
            },
            peso: {
                required: true, 
                number: true, 
                min: 25,
                max: 600
            },
            estatura: {
                required: true, 
                number: true, 
                min: 1,
                max: 2
            },
            presionarterial: {
                required: true, 
                number: true, 
                min: 60,
                max: 200
            },
            diagnostico : {
                alfanumeric:true,
                required: true,
                minlength: 10,
                maxlength: 20
            },
            cuadroclinico : {
                alfanumeric:true,
                required: true,
                minlength: 10,
                maxlength: 20
            }

        },
        messages: {
            nombre : {
                letras: "solo letras",
                required:  "* Ingresa un valor",
                minlength: "Minimo 3 letras",
                maxlength: "Maximo 20 letras"
            },
            apellido: {
                letras: "solo letras",
                required:  "* Ingresa un valor",
                minlength: "Minimo 3 letras",
                maxlength: "Maximo 20 letras"
            },
            cedula: {
                required: "* Ingresa un valor", 
                number: "* Ingresa solo numeros", 
                minlength: $.validator.format("* Ingresa una cantidad igual o mayor a {0} digitos"), 
                maxlength: $.validator.format("* Ingresa una cantidad igual o menor a {0} digitos")
            },
            edad: {
                required: "* Ingresa un valor", 
                number: "* Ingresa solo numeros", 
                min: $.validator.format("* Ingresa una cantidad igual o mayor a {0} digitos"), 
                max: $.validator.format("* Ingresa una cantidad igual o menor a {0} digitos")
            },
            peso: {
                required: "* Ingresa un valor", 
                number: "* Ingresa solo numeros", 
                min: $.validator.format("* Ingresa una cantidad (kg) igual o mayor a {0} digitos"), 
                max: $.validator.format("* Ingresa una cantidad (kg) igual o menor a {0} digitos ")
            },
            estatura: {
                required: "* Ingresa un valor", 
                number: "* Ingresa solo numeros", 
                min: $.validator.format("* Ingresa una cantidad (m) igual o mayor a {0} digitos"), 
                max: $.validator.format("* Ingresa una cantidad (m) igual o menor a {0} digitos")
            },
            presionarterial: {
                required: "* Ingresa un valor", 
                number: "* Ingresa solo numeros", 
                min: $.validator.format("* Ingresa una cantidad igual o mayor a {0} digitos"), 
                max: $.validator.format("* Ingresa una cantidad igual o menor a {0} digitos")
            },
            diagnostico : {
                letras: "solo letras",
                required:  "* Ingresa un valor",
                minlength: $.validator.format("* Ingresa una cantidad igual o mayor a {0} digitos"), 
                maxlength: $.validator.format("* Ingresa una cantidad igual o menor a {0} digitos")
            },
            cuadroclinico : {
                letras: "solo letras",
                required:  "* Ingresa un valor",
                minlength: $.validator.format("* Ingresa una cantidad igual o mayor a {0} digitos"), 
                maxlength: $.validator.format("* Ingresa una cantidad igual o menor a {0} digitos")
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