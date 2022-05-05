<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sistema de Inventario de Bienes</title>
  <!-- Bootstrap -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/responsive-slider.css">
  <link rel="stylesheet" href="css/animate.css">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="shortcut icon" href="#" />
  <link rel="stylesheet" href="css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="css/buttons.dataTables.min.css">
  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
 <![endif]-->
  <style>
  .dropdown-submenu {
      position: relative;
  }

  .dropdown-submenu .dropdown-menu {
      top: 0;
      left: 100%;
      margin-top: -1px;
  }
  </style>
</head>
<body>
  <?php
    include "inc/navbar.php";
  ?>
  <br>
  <div class="container">
    <br>
    <?php
      $mvc = new EnlacesController();
      $mvc->enlacesPaginaController();
    ?>
  </div>
  <br>
  <?php
    include "inc/footer.php";
  ?>
</body>
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="js/jquery-2.1.1.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/bootstrap.min.js"></script>
  <script src="js/responsive-slider.js"></script>
  <script src="js/wow.min.js"></script>
  <script src="js/select_dep_tipobien.js"></script>
  <!--<script src="js/select_dep_gerencias.js"></script>-->
  <script src="js/jquery.dataTables.min.js"></script>
  <script src="js/dataTables.buttons.min.js"></script>
  <script src="js/buttons.flash.min.js"></script>
  <script src="js/jszip.min.js"></script>
  <script src="js/pdfmake.min.js"></script>
  <script src="js/vfs_fonts.js"></script>
  <script src="js/buttons.html5.min.js"></script>
  <script src="js/buttons.print.min.js"></script>
  <script src="js/scripts.js"></script>

  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
 <link rel="stylesheet" href="../public/css/style.css">
  <!--<script src="https://code.jquery.com/jquery-1.12.4.js"></script>-->
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

  <script>
    $(function() {
    $("#datepicker").datepicker({ maxDate: 0 });
    
    $(document).ready(function() {
      
      $('[data-toggle="tooltip"]').tooltip();   
      
      //$('#fechaInicial').datepicker();      
      $.datepicker.regional['es'] = {
      closeText: 'Cerrar',
      prevText: '<Ant',
      nextText: 'Sig>',
      currentText: 'Hoy',
      monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
      monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
      dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'S&aacute;bado'],
      dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','S&aacute;b'],
      dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','S&aacute;'],
      weekHeader: 'Sm',
      dateFormat: 'dd/mm/yy',
      firstDay: 1,
      isRTL: false,
      showMonthAfterYear: false,
      yearSuffix: ''
      };
    $.datepicker.setDefaults($.datepicker.regional['es']);
    });
  });
  </script>
  
  <script>
    wow = new WOW(
    {

    }	)
    .init();
  </script>
  <script type="text/javascript">

  $(document).ready(function(){
    $('#gerencia-empleado').change(function(){
      $("#coord-empleado").empty();
      var id = $(this).val();
      //alert(id);
      $.get('/bienes2/app/controllers/AjaxController.php?gerencia='+id,function(data){
        if (data) {

          var html = '<option value="">Seleccione</option>';
          for (var i = data.length - 1; i >= 0; i--) {
            html+= '<option value="'+data[i].id_coordinacion+'">'+data[i].descripcion_coordinacion+'</option>';
          };
          $("#coord-empleado").append(html);
        }else{
          $("#coord-empleado").append('<option value="">Gerencia sin Coordinacion</option>');
        };

      });
    });  
  });

  $(document).ready(function(){
    $('#estado_empleado').change(function(){
      $("#municipio_empleado").empty();
      var id = $(this).val();
      //alert(id);
      $.get('/bienes2/app/controllers/AjaxController.php?estadoEmpleado='+id,function(data){
         if (data) {

          //alert("paso");
          //console.log(data);
          //alert("paso2");

          var html = '<option value="">Seleccione...</option>';
          for (var i = data.length - 1; i >= 0; i--) {
            html+= '<option value="'+data[i].id_municipio+'">'+data[i].descripcion_municipio+'</option>';
          };
          $("#municipio_empleado").append(html);
        }else{
          $("#municipio_empleado").append('<option value="">Estado sin Municipio</option>');
        };
      });
    });  
  });

    $(document).ready(function() {
      $('#tabla').DataTable( {
          "scrollX": true,
          dom: 'Bfrtip',
          buttons: [
              'copy', 'csv', 'excel', 'pdf', 'print'
          ]
      } );
    } );

  $(document).ready(function(){
    $('.dropdown-submenu a.test').on("click", function(e){
      $(this).next('ul').toggle();
      e.stopPropagation();
      e.preventDefault();
    });
  });

  $(document).ready(function(){
    $("#checkbox").click(function(){
      if ($(this).is(':checked')) {
        $("input[type=checkbox]").prop('checked', true);
      }else{
        $("input[type=checkbox]").prop('checked', false);
      };
    });
  });

  $(document).ready(function(){
    $(".create-empleado").click(function(){
      $("#create-empleado").modal("show");
    });
  });
  
  $(document).ready(function(){
    $(".edit-empleado").click(function(){
      var id = $(this).attr('id');
      $.get('/bienes2/app/controllers/AjaxController.php?cedula='+id, function(data){
          $("#cedula_modal").val(data.cedula).prop('readonly', false);
          $("#nombre").val(data.nombre_empleado);
          $("#apellido").val(data.apellido_empleado);
          $("#email").val(data.correo_empleado);
          $("#cargo").val(data.id_cargo);
          $("#gerencia-empleado").val(data.id_gerencia);          
          $("#institucion").val(data.id_institucion);
          $("#estado_empleado").val(data.id_estado);
          $("#submit").val("edit");
          $("#coord-empleado").empty();
          $("#coord-empleado").append('<option value="'+data.id_coordinacion+'" selected>'+data.descripcion_coordinacion+'</option>');
          $("#municipio_empleado").empty();
          $("#municipio_empleado").append('<option value="'+data.id_municipio+'" selected>'+data.descripcion_municipio+'</option>');
          $("#create-empleado").modal('show');
      });
    });
  });

  $(document).ready(function(){
    $(".suspender-usuario").click(function(){
      var id = $(this).attr('id');
      $.get('/bienes2/app/controllers/AjaxController.php?suspender='+id, function(data){
        alert(data);
        window.location.reload(true);
      });
    });
  });

  $(document).ready(function(){
    $(".activar-usuario").click(function(){
      var id = $(this).attr('id');
      $.get('/bienes2/app/controllers/AjaxController.php?activar='+id, function(data){
        alert(data);
        window.location.reload(true);
      });
    });
  });

 $(document).ready(function(){
    $(".editTipoBien").click(function(){
      var id = $(this).attr('id');
      $.get('/bienes2/app/controllers/AjaxController.php?tipo_bien='+id, function(data){
          $("#id").val(data.id_tipo_bien);
          $("#descripcion").val(data.descripcion_tipobien);
          $("#grupo").val(data.grupo);
          $("#sub_grupo").val(data.sub_grupo);
          $("#seccion").val(data.seccion);
          $("#edit_modal").modal('show');
      });
    });
  });

  $(document).ready(function(){
    $(".editar-descripcion-bien").click(function(){
      var id = $(this).attr('id'); 
      $.get('/bienes2/app/controllers/AjaxController.php?descripcion_bienes='+id, function(data){
        $("#id_bienes").val(data.id_bienes);
        $("#tipo_bien").val(data.id_tipo_bien);
        $("#nombre_bien").val(data.descripcion_bien);
        $("#descripcion-bien-modal").modal("show");
      });
    });
  });

  $(document).ready(function(){
    $(".editar-almacen").click(function(){
      var id = $(this).attr('id'); 
      $.get('/bienes2/app/controllers/AjaxController.php?almacen='+id, function(data){
        $("#id").val(data.id_ubicacion_almacen);
        $("#descripcion").val(data.nombre_almacen);
        $("#direccion").val(data.direccion);
        $("#almacen-modal").modal("show");
      });
    });
  }); 

  $(document).ready(function(){
    $(".editar-tipo-incorporacion").click(function(){
      var id = $(this).attr('id'); 
      $.get('/bienes2/app/controllers/AjaxController.php?tipo_incorporacion='+id, function(data){
        $("#id").val(data.id_tipo_incorporacion);
        $("#descripcion").val(data.descripcion_incorporacion);
        $("#tipo-incorporacion-modal").modal("show");
      });
    });
  });  

  $(document).ready(function(){
    $(".editar-institucion").click(function(){
      var id = $(this).attr('id'); 
      $.get('/bienes2/app/controllers/AjaxController.php?institucion='+id, function(data){
        $("#id").val(data.id_institucion);
        $("#descripcion").val(data.nombre_institucion);
        $("#direccion").val(data.direccion);
        $("#institucion-modal").modal("show");
      });
    });
  });  

  $(document).ready(function(){
    $(".editar-gerencia").on('click', function(){
      //alert();
      var id = $(this).attr('id'); 
      //alert(id);
      $.get('/bienes2/app/controllers/AjaxController.php?gerenciaId='+id, function(data){
        $("#id_gerencia").val(data.id_gerencia);
        $("#nombre_gerencia").val(data.descripcion_gerencia);        
        $("#gerencia-modal").modal("show");
      });
    });
  });

  $(document).ready(function(){
    $(".editar-coordinacion").click(function(){
      var id = $(this).attr('id'); 
      $.get('/bienes2/app/controllers/AjaxController.php?coordinacion='+id, function(data){
        $("#id_coordinacion").val(data.id_coordinacion);
        $("#gerencia").val(data.id_gerencia);
        $("#nombre_coordinacion").val(data.descripcion_coordinacion);
        $("#coordinacion-modal").modal("show");
      });
    });
  });

  $(document).ready(function(){
    $(".editar-cargo").click(function(){
      var id = $(this).attr('id'); 
      $.get('/bienes2/app/controllers/AjaxController.php?cargo='+id, function(data){
        $("#id").val(data.id_cargo);
        $("#descripcion_cargo").val(data.descripcion_cargo);
        $("#cargo-modal").modal("show");
      });
    });
  }); 

   $(document).ready(function(){
    $(".editar-estadoFisico").click(function(){
      var id = $(this).attr('id'); 
      $.get('/bienes2/app/controllers/AjaxController.php?estadoFisico='+id, function(data){
        $("#id").val(data.id_estado_fisico_bien);
        $("#descripcion_estado_fisico").val(data.descripcion_estado_fisico);
        $("#estadoFisicoBien-modal").modal("show");
      });
    });
  }); 

   $(document).ready(function(){
    $(".editar-estado").click(function(){
      var id = $(this).attr('id'); 
      $.get('/bienes2/app/controllers/AjaxController.php?estado='+id, function(data){
        $("#id").val(data.id_estado);
        $("#descripcion_estado").val(data.descripcion_estado);
        $("#estado-modal").modal("show");
      });
    });
  }); 

    $(document).ready(function(){
    $(".editar-municipio").click(function(){
      var id = $(this).attr('id'); 
      $.get('/bienes2/app/controllers/AjaxController.php?municipio='+id, function(data){
        $("#id_municipio").val(data.id_municipio);
        $("#estado").val(data.id_estado);
        $("#nombre_municipio").val(data.descripcion_municipio);
        $("#municipio-modal").modal("show");
      });
    });
  });

  $(document).ready(function(){
    $("#tipo_bien").on('change',function(){
      var id = $(this).val();
      //alert(id);
      $.get('/bienes2/app/controllers/AjaxController.php?tipoBien='+id, function(data){

        if (data == null){
          alert('malo');
        }else{
        $('#grupo').val(data.grupo);
        $('#sub_grupo').val(data.sub_grupo);
        $('#seccion').val(data.seccion);
        }  
      });
    });
  });
 
  $(document).ready(function (){
   $("#empleado").hide();
   $("#cedula_modal").on('change', function (){
     var cedula = $(this).val();
     $.get('/bienes2/app/controllers/AjaxController.php?cedula='+cedula, function(datos){
       if (datos == null) {
         $("#empleado").val();
         $('#cedula_empleado').val('');
         $('#cedula_empleado_hidden').val('');
         $('#nombre').val('');
         $('#apellido').val('');
         $('#cargo').val('');
         $('#gerencia').val('');
         $('#institucion').val('');
         $('#correo').val('');
         alert("Empleado con el numero de Cedula: " + cedula +" no se encuentra Registrado!");
       }else{
         $("#empleado").hide();
         $('#cedula_empleado').val('');
         $('#cedula_empleado_hidden').val('');
         $('#nombre').val('');
         $('#apellido').val('');
         $('#cargo').val('');
         $('#gerencia').val('');
         $('#institucion').val('');
         $('#correo').val('');
         alert("El empleado ya se encuentra registrado!");
         window.location.href = 'index.php?action=empleados/empleados';
       }
     });
   });
  });

  </script>
</html>
