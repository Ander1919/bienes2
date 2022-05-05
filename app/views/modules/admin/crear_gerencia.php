<?php
	require_once "../app/controllers/GerenciaController.php";	
?>
<div class="container form-group">
	<form method="post">
	<div class="row">
		<h3>Registrar Nueva Gerencia</h3>
	</div>
	<div class="row">
		<div class="col-sm-4">
			<label for="descripcion_gerencia">Nombre de la Gerencia: </label>
			<input type="text" name="gerencia" class="form-control" maxlength="50" pattern="[A-Za-z ]{0,50}" placeholder="Ingrese la Gerencia" required>
			<small>No Admite Caracteres Especiales. Sólo Letras, Hasta 50 Caracteres.</small>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-2">
			<input type="submit" name="submit_gerencia" value="Registrar" class="btn btn-primary">
		</div>	
	</div>
	<?php
		GerenciaController::registrarGerencia();
	?> 
	</form>
</div>