<?php
  require_once "../app/controllers/UsuariosController.php";
  $users = new UsuariosController();
  $users_consulta = $users->ingreso();
?>
<h1>Pagina de Ingresar</h1>
<form class="" method="post">

  <label for="uname"><b>Username</b></label>
  <input type="text" placeholder="Enter Username" name="uname" required>

  <label for="psw"><b>Password</b></label>
  <input type="password" placeholder="Enter Password" name="psw" required>

  <button type="submit_login">Login</button>
  <label>
  <input type="checkbox" checked="checked" name="remember"> Remember me
  </label>
</form>
