<?php

class Paginas{

  /*
   *
   */
  public function enlacesPaginaModel($enlaces)
  {
    
    if (!isset($_SESSION["logueado"])) {
      //Validamos si el usuario esta logueado o no dentro del sistema
      $module = "../app/views/modules/login.php";

    }elseif ($enlaces == "admin/usuarios_create" ||
             $enlaces == "admin/usuarios_consulta" ||
             $enlaces == "admin/tipo_bien" ||
             $enlaces == "admin/crear_tipo_bien" ||
             $enlaces == "admin/descripcion_bien" ||
             $enlaces == "admin/crear_descripcion_bien" ||
             $enlaces == "admin/institucion" ||
             $enlaces == "admin/crear_institucion" ||
             $enlaces == "admin/ubicacion_almacen" ||
             $enlaces == "admin/crear_ubicacion_almacen" ||
             $enlaces == "admin/tipo_incorporacion" ||
             $enlaces == "admin/crear_tipo_incorporacion" ||
             $enlaces == "admin/gerencia" ||
             $enlaces == "admin/crear_gerencia" ||
             $enlaces == "admin/coordinacion" ||
             $enlaces == "admin/crear_coordinacion" ||
             $enlaces == "admin/cargo" ||
             $enlaces == "admin/crear_cargo"||
             $enlaces == "admin/estado_fisico_bien"||
             $enlaces == "admin/crear_estado_fisico_bien"||
             $enlaces == "admin/estado"||
             $enlaces == "admin/crear_estado"||
             $enlaces == "admin/municipio"||
             $enlaces == "admin/crear_municipio"||

             $enlaces == "inventario_material_oficina/registro_inventario"||

             $enlaces == "bienes/incorporacion" ||
             $enlaces == "bienes/asignacion" ||
             //$enlaces == "bienes/asignacion_por_gerencia" ||
             $enlaces == "bienes/desvinculacion" ||
             $enlaces == "bienes/deshabilitar" ||
             $enlaces == "bienes/desincorporar" ||
            
             $enlaces == "reportes/consulta_cedula_bienesActivo" ||
             $enlaces == "reportes/consulta_cedula" ||
             $enlaces == "reportes/consulta_bien" ||
             $enlaces == "reportes/consulta_historico_bien" ||
             $enlaces == "reportes/consulta_tipo_bien" ||
             $enlaces == "reportes/consulta_inventario" ||
             $enlaces == "reportes/consulta_gerencia" || 

             $enlaces == "usuarios/perfil" ||

             $enlaces == "empleados/prueba_estado" ||             
             $enlaces == "empleados/empleados") {
      //Llamamos a los modulos correspondientes a la ruta GET
      $module = "../app/views/modules/".$enlaces.".php";

    }elseif ($enlaces == "index"){
      //Llamamos a index de la aplicacion
      $module = "../app/views/modules/inicio.php";

    }elseif ($enlaces == "logout") {
      //Si la ruta es logout se destruye la sesion y se envia al index.php
      session_destroy();
      echo "<script>
              window.location.href = 'index.php';
            </script>";
    }else{
      //Llamamos a index de la aplicacion
      $module = "../app/views/modules/inicio.php";
    }

    return $module;
  }
  
}
