<?php
	require_once "../app/controllers/EmpleadosController.php";
	require_once "../app/controllers/SelectController.php";

	$empleados = EmpleadosController::consulta();
	$cargo = SelectController::selectCargos();
	$gerencia = SelectController::selectGerencia();
	$institucion = SelectController::selectInstitucion();
	$estado = SelectController::selectEstado();
	//var_dump(pg_fetch_assoc($empleados));
?>
<div class="container">
	<div class="row text-center">
		<div class="col-12">
			<h2>Empleados</h2>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="pull-right">
			<button class="create-empleado btn btn-sm btn-success">Registrar</button>
		</div>
	</div>
	<hr>
	<div class="row">
		<!--<table id="tabla" class="display nowrap table table-bordered table-condensed" style="width:100%">-->
		<table id="" class="display nowrap table table-bordered table-condensed" style="width:100%">
			<thead class="text-center">
				<tr>
					<th>Cedula</th>
					<th>Nombre</th>
					<th>Email</th>
					<th>Cargo</th>
					<th>Gerencia</th>
					<th>Coordinacion</th>
					<th>Institucion</th>
					<th>Estado</th>
					<th>Municipio</th>
					<th></th>
				</tr>
			</thead>
			<tbody class="text-center">
			<?php
			while ($empleado = pg_fetch_assoc($empleados)){
			?>
				<tr>
					<td><?php echo $empleado["cedula"] ?></td>
					<td><?php echo ucwords(strtolower($empleado["nombre_empleado"]." ".$empleado["apellido_empleado"])) ?></td>
					<td><?php echo $empleado["correo_empleado"] ?></td>
					<td><?php echo $empleado["descripcion_cargo"] ?></td>
					<td><?php echo $empleado["descripcion_gerencia"] ?></td>
					<td><?php echo $empleado["descripcion_coordinacion"] ?></td>
					<td><?php echo $empleado["nombre_institucion"] ?></td>
					<td><?php echo $empleado["descripcion_estado"] ?></td>
					<td><?php echo $empleado["descripcion_municipio"] ?></td>
					<td><button class="edit-empleado btn btn-sm btn-primary" id="<?php echo $empleado["cedula"];?>">Editar</button></td>
				</tr>
			<?php
			}
			?>
			</tbody>
			<tfoot class="text-center">
				<tr>
					<th>Cedula</th>
					<th>Nombre</th>
					<th>Email</th>
					<th>Cargo</th>
					<th>Gerencia</th>
					<th>Coordinacion</th>
					<th>Institucion</th>
					<th>Estado</th>
					<th>Municipio</th>
					<th></th>
				</tr>
			</tfoot>
		</table>
	</div>
</div>

<div id="create-empleado" class="modal fade">
<form method="POST">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4>Informacion Empleado</h4>
			</div>
			<div class="modal-body">
				<label for="cedula">Cedula</label>
				<input id="cedula_modal" name="cedula_modal" type="text" required pattern="[0-9]{7,8}" maxlength="8" class="form-control" placeholder="e.j. 12852411">
				<label for="nombre">Nombre</label>
				<input id="nombre" name="nombre" type="text" required pattern="[A-Za-z ]{0,15}" maxlength="15" class="form-control" placeholder="e.j. Juan">
				<label for="apellido">Apellido</label>
				<input id="apellido" name="apellido" type="text" required pattern="[A-Za-z ]{0,15}" maxlength="15" class="form-control" placeholder="e.j. Rodriguez">
				<label for="email">Email</label>
				<input id="email" name="email" type="email" class="form-control" maxlength="30" placeholder="juan@conapdis.com"required>
				<label for="cargo">Cargo</label>
				<select name="cargo" id="cargo" class="form-control" required>
					<option value="">Seleccione</option>
					<?php
					while ($row = pg_fetch_assoc($cargo)){
					echo "<option id='".$row['id_cargo']."' value='".$row['id_cargo']."'>".$row['descripcion_cargo']."</option>";
					}
					?>
				</select>
				<label for="gerencia">Gerencia</label>
				<select name="gerencia" id="gerencia-empleado" class="form-control" required>
					<option value="" disabled selected>Seleccione</option>
					<?php
					while ($row = pg_fetch_assoc($gerencia)){
					echo "<option id='".$row['id_gerencia']."' value='".$row['id_gerencia']."'>".$row['descripcion_gerencia']."</option>";
					}
					?>
				</select>
				<label for="coord">Coordinacion</label>
				<select name="coord" id="coord-empleado" class="form-control" required>
					<option value="">Seleccione</option>
				</select>
				<label for="institucion">Institucion</label>
				<select name="institucion" id="institucion" class="form-control" required>
					<option value="">Seleccione</option>
					<?php
					while ($row = pg_fetch_assoc($institucion)){
					echo "<option id='".$row['id_institucion']."' value='".$row['id_institucion']."'>".$row['nombre_institucion']."</option>";
					}
					?>
				</select>
				<label for="estado_empleado">Estado Institución</label>
				<select name="estado_empleado" id="estado_empleado" class="form-control" required>
					<option value="" disabled selected>Seleccione</option>
						<?php
						while ($row = pg_fetch_assoc($estado)){
						echo "<option id='".$row['id_estado']."' value='".$row['id_estado']."'>".$row['descripcion_estado']."</option>";
						}
						?>
				</select>
				<label for="municipio_empleado">Municipio Institución</label>
				<select name="municipio_empleado" id="municipio_empleado" class="form-control" required>
					<option value="">Seleccione</option>
				</select>
			</div>
			<div class="modal-footer">
				<button id="submit" type="submit" name="submit" value="save" class="btn btn-primary btn-sm">Guardar</button>
			</div>
		</div>
	</div>
	<?php
		EmpleadosController::registro();
	?>
</form>
</div>