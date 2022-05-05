/*
$(document).ready(function(){
  $('#profesor').on('change', function() {
    var profesor = $(this).val();
    $.get('/srce/teachers/'+profesor, function(data) {
      if (data == ''){
        $('#nombre').val("No registrado");
      }else{
        $('#nombre').val(data.trab_nombre+" "+data.trab_apellido);
      };
    });
  });
});
*/
$(document).ready(function (){
  //$("#empleado").hide();
  $("#cedula").on('change', function (){
    var cedula = $(this).val();
    $.get('/bienes2/app/controllers/AjaxController.php?cedula='+cedula, function(datos){
      //alert("holas la cedula es: "+cedula+" y la data es: "+datos);
      //alert(typeof(datos));
      if (datos == false) {
        $("#empleado").hide();
        $('#cedula_empleado').val('');
        $('#cedula_empleado_hidden').val('');
        $('#nombre').val('');
        $('#apellido').val('');
        $('#cargo').val('');
        $('#gerencia').val('');
        $('#institucion').val('');
        $('#correo').val('');
        alert("Empeado con el numero de Cedula: " + cedula +" no se encuentra Registrado!");
      }else{
        $("#empleado").show();
        //alert(JSON.stringify(datos));
        //alert(datos.cedula);
        $('#cedula_empleado').val('');
        $('#cedula_empleado_hidden').val(datos.cedula);
        $('#nombre').val(datos.nombre_empleado);
        $('#apellido').val(datos.apellido_empleado);
        $('#cargo').val(datos.descripcion_cargo);
        $('#gerencia').val(datos.descripcion_gerencia);
        $('#institucion').val(datos.nombre_institucion);
        $('#correo').val(datos.correo_empleado);
      }
    });
  });
});

$(document).ready(function (){
  $("#numero_bien").on('change', function (){
    var numero_bien = $(this).val();
    $.get('/bienes2/app/controllers/AjaxController.php?numero_bien='+numero_bien, function(datos){
      if (datos == false) {
        $("#bienes_consulta").find("tbody tr:last").remove();
        alert("El Bien con el ID: "+ numero_bien +" no se encuentra disponible o no esta registrado!");
      }else{
        var html = "<tr id='"+datos.numero_bien+"'><td><input type='' name='numero_bien[]' value='"+datos.numero_bien+"' style='border:none;width:100%;' readonly></td><td>"+datos.descripcion_tipobien+"</td><td>"+datos.descripcion_bien+"</td><td>"+datos.grupo+"</td><td>"+datos.sub_grupo+"</td><td>"+datos.seccion+"</td><td>"+datos.nombre_institucion+"</td><td>"+datos.caracteristicas+"</td><td>"+datos.serial_bien+"</td><td>"+datos.valor+"</td><td>"+datos.nombre_almacen+"</td><td></td></tr>";
        $("#bienes_consulta").find("tbody").append(html);
      }
    });
  });
});

$(document).ready(function(){
  $("#seleccionar").click(function(){
    var clonarfila = $("#bienes_consulta").find("tbody tr:last").clone();
    $("#bienes_seleccionados").find("tbody").append(clonarfila);
    $("#bienes_consulta").find("tbody tr:last").remove();
  });
});




