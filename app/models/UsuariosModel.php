<?php
require_once "ConexionModel.php";

class UsuariosModel{

  /*
   *
   */
  public function consultaGeneral()
  {
    $conexion = ConexionModel::conexion();

    $query = "SELECT a.*,b.* FROM usuarios a 
              INNER JOIN perfiles b ON a.id_perfil = b.id_perfil";

    $resultado = pg_query($conexion, $query);

    return $resultado;
  }

  /*
   *
   */
  public function loginUsuario($datos)
  {
    $conexion = ConexionModel::conexion();

    $query = sprintf("SELECT * FROM usuarios WHERE cedula = '%s' AND password = '%s'",
                     $datos['cedula'],
                     $datos['password']);

    $resultado = pg_query($conexion, $query);

    return $resultado;
  }

  /*
   *
   */
  public function consultaCedula ($cedula)
  {
  	$conexion = ConexionModel::conexion();

  	$query = "SELECT * FROM usuarios WHERE cedula = $cedula";

  	$resultado = pg_query($conexion, $query);

  	return $resultado;
  }

  /*
   *
   */
  public function registroUsuario ($datos) 
  {
  	$conexion = ConexionModel::conexion();

  	$query = sprintf("INSERT INTO usuarios(cedula, nombre, apellido, correo, password, id_perfil, estatus_usuario) 
  			  VALUES('%s', '%s', '%s', '%s', '%s', '%s', true)",
    		  $datos["cedula"], 
    		  $datos["nombre"], 
    		  $datos["apellido"], 
    		  $datos["email"], 
    		  $datos["password"],
          $datos["perfil"]
    		  );

  	$resultado = pg_query($conexion, $query);

  	return $resultado;
  }

  /*
   *
   */
  public function usuariosActivos($datos)
  {
    $conexion = ConexionModel::conexion();

    $query = sprintf("SELECT * FROM usuarios WHERE cedula = '%s' AND estatus_usuario = '%s'",
                     $datos["cedula"],
                     true);

    $resultado = pg_query($conexion, $query);

    return $resultado;
  }

  /*
   *
   */
  public function actualizarUsuario ($datos) 
  {
    $conexion = ConexionModel::conexion();

    $query = sprintf("UPDATE public.usuarios SET nombre='%s', apellido='%s', correo='%s', password='%s' WHERE cedula = '%s'", 
          $datos["nombre"], 
          $datos["apellido"], 
          $datos["email"], 
          $datos["password"], 
          $datos["cedula"]
          );


    $resultado = pg_query($conexion, $query);

    return $resultado;
  }

  /*
   *
   */
  public function suspender ($id) 
  {
    $conexion = ConexionModel::conexion();

    $query = sprintf("UPDATE public.usuarios SET estatus_usuario = false WHERE cedula = '%s'", 
                      $id);

    $resultado = pg_query($conexion, $query);

    return $resultado;
  }

  /*
   *
   */
  public function activar ($id) 
  {
    $conexion = ConexionModel::conexion();

    $query = sprintf("UPDATE public.usuarios SET estatus_usuario = true WHERE cedula = '%s'", 
                      $id);

    $resultado = pg_query($conexion, $query);

    return $resultado;
  }
}