<?php
	require_once "../app/controllers/UsuariosController.php";
	require_once "../app/controllers/SelectController.php";
	$perfiles = SelectController::selectPerfil();
	$usuario = UsuariosController::consultaId($_SESSION["user_id"]);
?>
<div class="container form-group">
	<form method="post">
	<div class="row">
		<h3>Edicion Perfil</h3>
	</div>
	<div class="row">
		<div class="col-sm-4">
			<label for="cedula_usuario">Cédula Usuario: </label>
			<input type="text" name="cedula_usuario" class="form-control" maxlength="8" pattern="[0-9]{7,8}" placeholder="ej. 00000000" value="<?php echo $usuario["cedula"] ?>" required readonly>
			<small>Solo numeros. De 7 a 8 caracteres.</small>
		</div>
		<div class="col-sm-4">
			<label for="nombre_usuario">Nombre Usuario: </label>
			<input type="text" name="nombre_usuario" class="form-control" maxlength="10" pattern="[A-Za-z ]{0,10}" placeholder="ej. Miguel" value="<?php echo $usuario["nombre"] ?>" required readonly>
			<small>Solo letras, mayusculas y minusculas. Hasta 10 caracteres.</small>
		</div>
		<div class="col-sm-4">
			<label for="apellido_usuario">Apellido Usuario: </label>
			<input type="text" name="apellido_usuario" class="form-control" maxlength="10" pattern="[A-Za-z ]{0,10}" placeholder="ej. Nuñez" value="<?php echo $usuario["apellido"] ?>" required readonly>
			<small>Solo letras, mayusculas y minusculas. Hasta 10 caracteres.</small>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-4">
			<label for="email_usuario">Email Usuario: </label>
			<input type="email" name="email_usuario" class="form-control" maxlength="100" placeholder="ej. usuario@email.com" value="<?php echo $usuario["correo"] ?>" required>
		</div>
		<div class="col-sm-4">
			<label for="password_usuario">Contraseña Usuario: </label>
			<input type="password" name="password_usuario" class="form-control" maxlength="10" placeholder="*******" value="<?php echo $usuario["password"] ?>" required>
			<small>Hasta 10 caracteres.</small>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col-sm-2">
			<input type="submit" name="submit_usuarios" value="Registrar" class="btn btn-primary">
		</div>	
	</div>
	<?php
		UsuariosController::actualizarUsuarios();
	?> 
	</form>
</div>