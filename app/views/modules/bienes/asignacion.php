<?php
	require_once "../app/controllers/MovimientoController.php";
?>
<br>
<div class="container">
	<div class="row">
		<h2 class="text-center">Asignacion Bienes</h2>
	</div>

	<div class="row">
		<div class="col-sm-4">
			<label for="cedula">Cédula Empleado:</label>
			<input class="form-control" type="numeric" name="cedula" id="cedula" value="" maxlength="8" placeholder="Cédula del Empleado">
		</div>
	</div>

	<div id="empleado">
		        <div class="row">
			<div class="col-sm-3">
				<label for="cedula">Cédula Empleado:</label>
				<input class="form-control" type="text" name="cedula" id="cedula_empleado" value="" readonly="">
			</div>
			<div class="col-sm-3">
				<label for="cedula">Nombre:</label>
				<input class="form-control" type="text" name="nombre" id="nombre" value="" disabled>
			</div>
			<div class="col-sm-3">
				<label for="cedula">Apellido:</label>
				<input class="form-control" type="text" name="apellido" id="apellido" value="" disabled>
			</div>
			<div class="col-sm-3">
				<label for="cedula">Cargo:</label>
				<input class="form-control" type="text" name="cargo" id="cargo" value="" disabled>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-3">
				<label for="cedula">Gerencia:</label>
				<input class="form-control" type="text" name="gerencia" id="gerencia" value="" disabled>
			</div>
			<div class="col-sm-3">
				<label for="cedula">Institucion:</label>
				<input class="form-control" type="text" name="institucion" id="institucion" value="" disabled>
			</div>
			<div class="col-sm-3">
				<label for="cedula">Correo:</label>
				<input class="form-control" type="text" name="correo" id="correo" value="" disabled>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-4">
			<label for="numero_bien">Numero de Bien:</label>
			<input class="form-control" type="text" name="numero_bien" id="numero_bien" value="" maxlength="6" placeholder="Numero Bien">
		</div>
	</div>
	<br>

	<div class="table-responsive row">
		<table class="table table-condensed" id="bienes_consulta">
			<thead>
				<tr>
					<th>Número de Bien</th>
					<th>Tipo de Bien</th>
					<th>Descripción Bien</th>
					<th>Grupo</th>
					<th>Sub-Grupo</th>
					<th>Sección</th>
					<th>Nombre de la Institución</th>
					<th>Caracteristicas del Bien</th>
					<th>Serial del Bien</th>
					<th>Valor</th>
					<th>Nombre Almecen</th>
					<th><button id="seleccionar" class="btn btn-primary">Seleccionar</button></th>
				</tr>
			</thead>
			<tbody>
			</tbody>
		</table>
	</div>
	<hr>

	<form method="post">
	<div class="row">
		<h4>Bienes Seleccionados</h4>
	</div>

	<div class="row table-responsive" id="bienes_seleccionados">
		<table class="table table-condensed" id="bien_seleccionados">
			<thead>
				<tr>
					<th>Número de Bien</th>
					<th>Tipo de Bien</th>
					<th>Descripción Bien</th>
					<th>Grupo</th>
					<th>Sub-Grupo</th>
					<th>Sección</th>
					<th>Nombre de la Institución</th>
					<th>Caracteristicas del Bien</th>
					<th>Serial del Bien</th>
					<th>Valor</th>
					<th>Nombre Almecen</th>
				</tr>
			</thead>
			<tbody>
			</tbody>
		</table>
	</div>
	<div class="row">
		<label for="observacion">Observacion:</label>
		<input class="form-control" type="text" name="observacion" id="observacion" value="" maxlength="100" placeholder="Observacion">
	</div>
	<br>
	<div class="row text-center">
		<input type="hidden" name="cedula_empleado_hidden" id="cedula_empleado_hidden" value="">
		<input type="submit" name="submit_asignacion" value="Asignar" class="btn btn-primary">
	</div>
	<?php
		MovimientoController::asignarBienes();
	?>
	</form>	
</div>
