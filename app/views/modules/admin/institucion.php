<?php
	require_once "../app/controllers/InstitucionController.php";
	$institucion = InstitucionController::consulta();

	//var_dump($tipo_bien);
?>
<div class="container">
	<div class="row">
		<div class="text-center"><h3>Listado de Instituciones</h3></div>
		<div class="pull-right"><a class="btn btn-success" href="index.php?action=admin/crear_institucion">Registrar</a></div>
	</div>
	<hr>	
	<div class="row">
		<table id="" class="display nowrap table table-bordered text-center" style="width:100%">
			<thead>
				<tr>					
					<th>Descripcion Institución</th>
					<th>Dirección</th>
					<th>Acción</th>
				</tr>
			</thead>
			<tbody>
				<?php
				while ($row = pg_fetch_assoc($institucion)) {
				?>
					<tr>						
						<td><?php echo $row["nombre_institucion"] ?></td>
						<td><?php echo $row["direccion"] ?></td>
						<td><button id="<?php echo $row["id_institucion"]?>" class="editar-institucion btn btn-sm btn-primary">Editar</button></td>
					</tr>
				<?php
				}
				?>
			</tbody>
			<tfoot>
				<tr>					
					<th>Descripción Institución</th>
					<th>Dirección</th>
					<th>Acción</th>
				</tr>
			</tfoot>
		</table>
	</div>
</div>

<div id="institucion-modal" class="modal fade">

<form method="POST">
	<?php
		InstitucionController::actualizar();
	?>
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4>Actualizar</h4>
			</div>
			<div class="modal-body">
				<input type="hidden" name="id" id="id" value="">
				<label for="descripcion_institucion">Descripción de la Institución: </label>
				<input type="text" id="descripcion" name="nombre_institucion" class="form-control" maxlength="50" pattern="[A-Za-z ]{0,50}" placeholder="Ingrese la Institución" required>
				<small>No Admite Caracteres Especiales. Sólo Letras, Hasta 50 Caracteres.</small>
				<br>
				<label for="direccion">Dirección: </label>
				<input type="text" id="direccion" name="direccion" class="form-control" maxlength="50"  pattern="[A-Za-z ]{0,50}" placeholder="Ingrese la Dirección de la Institución" required>
				<small>No Admite Caracteres Especiales. Sólo Letras, Hasta 50 Caracteres.</small>
			</div>
			<div class="modal-footer">
				<button type="submit" name="submit" value="edit" class="btn btn-sm btn-primary">Guardar</button>
			</div>
		</div>
	</div>
</form>
</div>