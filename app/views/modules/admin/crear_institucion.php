<?php
	require_once "../app/controllers/InstitucionController.php";	
?>
<div class="container form-group">
	<form method="post">
	<div class="row">
		<h3>Registrar Nueva Institución</h3>
	</div>
	<div class="row">
		<div class="col-sm-4">
			<label for="descripcion_institucion">Descripción de la Institución: </label>
			<input type="text" name="nombre_institucion" class="form-control" maxlength="50" pattern="[A-Za-z ]{0,50}" placeholder="Ingrese la Institución" required>
			<small>No Admite Caracteres Especiales. Sólo Letras, Hasta 50 Caracteres.</small>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-4">
			<label for="direccion">Dirección: </label>
			<input type="text" name="direccion" class="form-control" maxlength="50" pattern="[A-Za-z ]{0,50}" placeholder="Ingrese la Dirección de la Institución" required>
			<small>No Admite Caracteres Especiales. Sólo Letras, Hasta 50 Caracteres.</small>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-2">
			<input type="submit" name="submit_institucion" value="Registrar" class="btn btn-primary">
		</div>	
	</div>
	<?php
		InstitucionController::registrarInstitucion();
	?> 
	</form>
</div>