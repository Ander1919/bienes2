<?php
	require_once "../app/controllers/UbicacionAlmacenController.php";
	$almacen = UbicacionAlmacenController::consulta();
	//var_dump($tipo_bien);
?>
<div class="container">
	<div class="row">
		<div class="text-center"><h3>Listado de Almacén</h3></div>
		<div class="pull-right"><a class="btn btn-success" href="index.php?action=admin/crear_ubicacion_almacen">Registrar</a></div>
	</div>	
	<hr>
	<div class="row">
		<table id="" class="display nowrap table table-bordered text-center" style="width:100%">
			<thead>
				<tr>					
					<th>Descripción Almacén</th>
					<th>Dirección</th>
					<th>Acción</th>
				</tr>
			</thead>
			<tbody>
				<?php
				while ($row = pg_fetch_assoc($almacen)) {
				?>
					<tr>						
						<td><?php echo $row["nombre_almacen"] ?></td>
						<td><?php echo $row["direccion"] ?></td>
						<td><button id="<?php echo $row["id_ubicacion_almacen"] ?>" class="editar-almacen btn btn-sm btn-primary">Editar</button></td>
					</tr>
				<?php
				}
				?>
			</tbody>
			<tfoot>
				<tr>
					<th>Descripción Almacén</th>
					<th>Dirección</th>
					<th>Acción</th>
				</tr>
			</tfoot>
		</table>
	</div>
</div>

<div id="almacen-modal" class="modal fade">
	<form method="POST">
	<?php
		UbicacionAlmacenController::actualizacion();
	?>
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4>Edicion Registro</h4>
			</div>
			<div class="modal-body">
				<input type="hidden" id="id" name="id">
				<label for="descripcion_almacen">Descripción del Almacén: </label>
				<input type="text" id="descripcion" name="nombre_almacen" class="form-control" maxlength="50" pattern="[A-Za-z ]{0,50}" placeholder="Ingrese el Almacén" required>
				<small>No Admite Caracteres Especiales. Sólo Letras, Hasta 50 Caracteres.</small>
				<br>
				<label for="direccion">Dirección: </label>
				<input type="text" id="direccion" name="direccion" class="form-control" maxlength="50" pattern="[A-Za-z ]{0,50}" placeholder="Ingrese la Dirección del Almacén" required>
				<small>No Admite Caracteres Especiales. Sólo Letras, Hasta 50 Caracteres.</small>
			</div>
			<div class="modal-footer">
				<button type="submit" name="submit" value="edit" class="btn btn-primary btn-sm">Guardar</button>
			</div>
		</div>
	</div>
	</form>	
</div>