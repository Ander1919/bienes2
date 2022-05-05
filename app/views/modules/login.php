<?php 
	require_once "../app/controllers/UsuariosController.php";
?>
<br>
<div class="jumbotron">
	<form method="post">
	<div class="row text-center">
		<div class="col-sm-12">
			<h3>Inicio Sesión</h3>
		</div>
	</div>
	<br>
	<div class="row form-group">
		<div class="col-sm-offset-4 col-sm-4">
			<label for="cedula">Cédula:</label>
			<input type="text" name="cedula" required autofocus maxlength="8" pattern="[0-9]{7,8}" class="form-control" placeholder="ej. 0000000">
		</div>
	</div>
	<div class="row form-group">
		<div class="col-sm-offset-4 col-sm-4">
			<label for="password">Contraseña:</label>
			<input type="password" name="password" required maxlength="100" class="form-control" placeholder="ej. ******">
		</div>
	</div>
	<div class="row form-group text-center">
		<input type="submit" name="submit_login" class="btn btn-primary" value="Registrar">
	</div>
	<?php 
		UsuariosController::login();
	?>
	</form>
</div>