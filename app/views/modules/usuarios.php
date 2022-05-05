<?php
  require_once "../app/controllers/UsuariosController.php";
  $users = new UsuariosController();
  $users_consulta = $users->consulta();
?>
<h1>Usuarios del Sistema</h1>
<?php
  while ($usuario = mysqli_fetch_array($users_consulta)) {
    echo "El Codigo del usuario es: ".$usuario["cod_usuario"]." y el nombre es: ".$usuario["nombre_usuario"]."<br>";
  };
?>
