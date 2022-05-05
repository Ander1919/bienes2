<?php
	require_once "../app/controllers/UsuariosController.php";
	require_once "../app/controllers/SelectController.php";
	$perfiles = SelectController::selectPerfil();
?>
<div class="container form-group">
	<form method="post">
	<div class="row">
		<h3>Creación Usuario</h3>
	</div>
	<div class="row">
		<div class="col-sm-4">
			<label for="cedula_usuario">Cédula Usuario: </label>
			<input type="text" name="cedula_usuario" class="form-control" maxlength="8" pattern="[0-9]{7,8}" placeholder="ej. 00000000" required>
			<small>Solo numeros. De 7 a 8 caracteres.</small>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-4">
			<label for="nombre_usuario">Nombre Usuario: </label>
			<input type="text" name="nombre_usuario" class="form-control" maxlength="10" pattern="[A-Za-z ]{0,10}" placeholder="ej. Miguel" required>
			<small>Solo letras, mayusculas y minusculas. Hasta 10 caracteres.</small>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-4">
			<label for="apellido_usuario">Apellido Usuario: </label>
			<input type="text" name="apellido_usuario" class="form-control" maxlength="10" pattern="[A-Za-z ]{0,10}" placeholder="ej. Nuñez" required>
			<small>Solo letras, mayusculas y minusculas. Hasta 10 caracteres.</small>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-4">
			<label for="email_usuario">Email Usuario: </label>
			<input type="email" name="email_usuario" class="form-control" maxlength="100" placeholder="ej. usuario@email.com" required>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-4">
			<label for="password_usuario">Contraseña Usuario: </label>
			<input type="password" name="password_usuario" class="form-control" maxlength="10" placeholder="*******" required>
			<small>Hasta 10 caracteres.</small>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-4">
			<label for="perfil_usuario">Cargo Usuario: </label>
			<select name="perfil_usuario" class="form-control" required>
				<option>Seleccione...</option>
	         	<?php
	            while ($resultado = pg_fetch_assoc($perfiles)){
	              echo "<option value='".$resultado['id_perfil']."'>".$resultado['nombre_perfil']."</option>";
	            }
	          ?>
			</select>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col-sm-2">
			<input type="submit" name="submit_usuarios" value="Registrar" class="btn btn-primary">
		</div>	
	</div>
	<?php
		UsuariosController::registrarUsuarios();
	?> 
	</form>
</div>