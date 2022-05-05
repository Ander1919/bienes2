<?php
	require_once "../app/controllers/EstadoFisicoBienController.php";	
?>
<div class="container form-group">
	<form method="post">
	<div class="row">
		<h3>Nuevo Registro</h3>
	</div>
	<div class="row">
		<div class="col-sm-4">
			<label for="descripcion_estado_fisico">Descripción: </label>
			<input type="text" name="descripcion_estado_fisico" class="form-control" maxlength="50" pattern="[A-Za-z ]{0,50}" placeholder="Ingrese el Cargo" required>
			<small>No Admite Caracteres Especiales. Sólo Letras, Hasta 50 Caracteres.</small>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-2">
			<input type="submit" name="estado_fisico" value="Registrar" class="btn btn-primary">
		</div>	
	</div>
	<?php
		EstadoFisicoBienController::registrar();
	?> 
	</form>
</div>