
function validar(){
valor1 = document.getElementById("date1").value;
valor2 = document.getElementById("date2").value;

if(valor2<valor1){
   alert("Fecha de INICIO no puede ser mayor a fecha FINAL");
}
}