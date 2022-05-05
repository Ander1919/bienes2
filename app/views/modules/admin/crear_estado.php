<?php
	require_once "../app/controllers/EstadoController.php";	
?>
<div class="container form-group">
	<form method="post">
	<div class="row">
		<h3>Registrar Nuevo Estado</h3>
	</div>
	<div class="row">
		<div class="col-sm-4">
			<label for="descripcion_estado">Nombre del Estado: </label>
			<input type="text" name="descripcion_estado" class="form-control" maxlength="50" pattern="[A-Za-z ]{0,50}" placeholder="Ingrese el Estado" required>
			<small>No Admite Caracteres Especiales. Sólo Letras, Hasta 50 Caracteres.</small>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-2">
			<input type="submit" name="submit_estado" value="Registrar" class="btn btn-primary">
		</div>	
	</div>
	<?php
		EstadoController::registrarEstado();
	?> 
	</form>
</div>