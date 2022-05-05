<?php
	require_once "../app/controllers/UbicacionAlmacenController.php";	
?>
<div class="container form-group">
	<form method="post">
	<div class="row">
		<h3>Registrar Nuevo Almacén</h3>
	</div>
	<div class="row">
		<div class="col-sm-4">
			<label for="descripcion_almacen">Descripción del Almacén: </label>
			<input type="text" name="nombre_almacen" class="form-control" maxlength="50" pattern="[A-Za-z ]{0,50}" placeholder="Ingrese Descripción Almacén" required>
			<small>No Admite Caracteres Especiales. Sólo Letras, Hasta 50 Caracteres.</small>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-4">
			<label for="direccion">Dirección: </label>
			<input type="text" name="direccion" class="form-control" maxlength="50" pattern="[A-Za-z ]{0,50}" placeholder="Ingrese la Dirección del Almacén" required>
			<small>No Admite Caracteres Especiales. Sólo Letras, Hasta 50 Caracteres.</small>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-2">
			<input type="submit" name="submit_almacen" value="Registrar" class="btn btn-primary">
		</div>	
	</div>
	<?php
		UbicacionAlmacenController::registrarAlmacen();
	?> 
	</form>
</div>