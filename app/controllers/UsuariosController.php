<?php
session_start();

require_once "../app/models/UsuariosModel.php";

class UsuariosController{

  /*
   *
   */
  public function consulta()
  {
    $consulta = UsuariosModel::consultaGeneral();
    return $consulta;
  }

  /*
   *
   */
  public function login()
  {
    if (isset($_POST["submit_login"])) {
      
      $datos = array(
        'cedula'   => pg_escape_string($_POST["cedula"]),
        'password' => pg_escape_string(md5($_POST["password"])),
      );

      $consulta = UsuariosModel::consultaCedula($datos["cedula"]);

      if (pg_num_rows($consulta) == 0) {
        echo '<script type="text/javascript">alert("El Usuario no se encuentra registrado!");</script>';
      }elseif (pg_num_rows(UsuariosModel::usuariosActivos($datos)) == 0) {
        echo '<script type="text/javascript">alert("El Usuario esta suspendido!");</script>';
      }elseif (pg_num_rows(UsuariosModel::loginUsuario($datos)) == 0) {
        echo '<script type="text/javascript">alert("Cedula o Contraseña incorrecto!");</script>';
      }else{
        $usuario = pg_fetch_assoc($consulta);    
        $nombre = $usuario["nombre"]." ".$usuario["apellido"];
        //var_dump($usuario);
        $_SESSION["logueado"]    = true;
        $_SESSION["user_name"]   = ucwords(strtolower($nombre));
        $_SESSION["user_id"]     = $usuario["cedula"];
        $_SESSION["user_perfil"] = $usuario["id_perfil"];

        echo '<script type="text/javascript">alert("Bienvenido '.$_SESSION["user_name"].'!");
              window.location.href = "index.php";</script>';
      }
    }
  }

  /*
   *$contrasena=md5($_POST['contrasena'])
   */
  public function registrarUsuarios ()
  {
    if (isset($_POST["submit_usuarios"])) {
      $datos = array(
        'cedula'   => pg_escape_string($_POST["cedula_usuario"]),
        'nombre'   => pg_escape_string($_POST["nombre_usuario"]),
        'apellido' => pg_escape_string($_POST["apellido_usuario"]),
        'email'    => pg_escape_string($_POST["email_usuario"]),
        'password' => pg_escape_string(md5($_POST["password_usuario"])),
        'perfil'   => pg_escape_string($_POST["perfil_usuario"]),
      );

      $consulta = UsuariosModel::consultaCedula($datos["cedula"]);

      if (pg_num_rows($consulta) > 0) {
        echo '<script type="text/javascript">alert("El Usuario ya se encuentra registrado!");window.location.href="index.php?action=admin/usuarios_create";</script>';
      }else{
        $registro = UsuariosModel::registroUsuario($datos);
        if ($registro) {
          echo '<script type="text/javascript">alert("Usuario registrado exitosamente!");window.location.href="index.php?action=admin/usuarios_create";</script>';

        }else{
          echo '<script type="text/javascript">alert("Ha ocurrido un error al guardar. Comunicarse con el Administrador del sistema!");window.location.href="index.php?action=admin/usuarios_create";</script>';
        }
      }
    }
  }

  public function consultaId($id)
  {
    return pg_fetch_assoc(UsuariosModel::consultaCedula($id));
  }

  public function actualizarUsuarios ()
  {
    if (isset($_POST["submit_usuarios"])) {
      $datos = array(
        'cedula'   => pg_escape_string($_POST["cedula_usuario"]),
        'nombre'   => pg_escape_string($_POST["nombre_usuario"]),
        'apellido' => pg_escape_string($_POST["apellido_usuario"]),
        'email'    => pg_escape_string($_POST["email_usuario"]),
        'password' => pg_escape_string(md5($_POST["password_usuario"])),
      );

      $registro = UsuariosModel::actualizarUsuario($datos);

      if ($registro) {
        echo '<script type="text/javascript">alert("Modificación de usuario exitosa!");window.location.href="index.php";</script>';
      }else{
        echo '<script type="text/javascript">alert("Ha ocurrido un error al guardar. Comunicarse con el Administrador del sistema!");</script>';
      }
    }
  }
}
