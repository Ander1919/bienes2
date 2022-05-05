<?php
	require_once "../app/controllers/TipoIncorporacionController.php";
	$tipo_incorporacion = TipoIncorporacionController::consulta();
	//var_dump($tipo_bien);
?>
<div class="container">
	<div class="row">
		<div class="text-center"><h3>Listado Tipo de Incorporación</h3></div>
		<div class="pull-right"><a class="btn btn-success" href="index.php?action=admin/crear_tipo_incorporacion">Registrar</a></div>
	</div>	
	<hr>
	<div class="row">
		<table id="" class="display nowrap table table-bordered text-center" style="width:100%">
			<thead>
				<tr>
					<th>Descripción</th>
					<th>Acción</th>
				</tr>
			</thead>
			<tbody>
				<?php
				while ($row = pg_fetch_assoc($tipo_incorporacion)) {
				?>
					<tr>						
						<td><?php echo $row["descripcion_incorporacion"] ?></td>
						<td><button id="<?php echo $row["id_tipo_incorporacion"] ?>" class="editar-tipo-incorporacion btn btn-sm btn-primary">Editar</button></td>
					</tr>
				<?php
				}
				?>
			</tbody>
			<tfoot>
				<tr>
					<th>Descripción</th>
					<th>Acción</th>
				</tr>
			</tfoot>
		</table>
	</div>
</div>
<div id="tipo-incorporacion-modal" class="modal fade">
	<form method="POST">
	<?php
		TipoIncorporacionController::actualizacion();
	?>
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4>Edicion Registro</h4>
			</div>
			<div class="modal-body">
				<label>ID</label>
				<input type="text" name="id" id="id" readonly value="" class="form-control">
				<label>Descripcion</label>
				<input type="text" name="descripcion" id="descripcion" value="" class="form-control" maxlength="50" pattern="[A-Za-z ]{0,50}" placeholder="Ingrese el Tipo de Incorporación" required>
				<small>No Admite Caracteres Especiales. Sólo Letras, Hasta 50 Caracteres.</small>
			</div>
			<div class="modal-footer">
				<button type="submit" name="submit" value="edit" class="btn btn-primary btn-sm">Guardar</button>
			</div>
		</div>
	</div>
	</form>	
</div>