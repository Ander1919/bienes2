<?php
	require_once "../app/controllers/TipoIncorporacionController.php";	
?>
<div class="container form-group">
	<form method="post">
	<div class="row">
		<h3>Registrar Nuevo Tipo de Incorporacion</h3>
	</div>
	<div class="row">
		<div class="col-sm-4">
			<label for="descripcion_tipo_incorporacion">Descripción Tipo de Incorporación: </label>
			<input type="text" name="tipo_incorporacion" class="form-control" maxlength="50" pattern="[A-Za-z ]{0,50}" placeholder="Ingrese el Tipo de Incorporación" required>
			<small>No Admite Caracteres Especiales. Sólo Letras, Hasta 50 Caracteres.</small>
	</div>
	<div class="row">
		<div class="col-sm-2">
			<input type="submit" name="submit_tipo_incorporacion" value="Registrar" class="btn btn-primary">
		</div>	
	</div>
	<?php
		TipoIncorporacionController::registrarTipoIncorporacion();
	?> 
	</form>
</div>