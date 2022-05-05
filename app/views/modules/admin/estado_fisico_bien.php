<?php
	require_once "../app/controllers/EstadoFisicoBienController.php";
	$estado_fisico_bien = EstadoFisicoBienController::consulta();
	//var_dump($tipo_bien);
?>
<div class="container">
	<div class="row">
		<div class="text-center"><h3>Estado Fisico del Bien:</h3></div>
		<div class="pull-right"><a class="btn btn-success" href="index.php?action=admin/crear_estado_fisico_bien">Registrar</a></div>
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
				while ($row = pg_fetch_assoc($estado_fisico_bien)) {
				?>
					<tr>						
						<td><?php echo $row["descripcion_estado_fisico"] ?></td>
						<td><button id="<?php echo $row["id_estado_fisico_bien"]?>" class="editar-estadoFisico btn-sm btn btn-primary">Editar</button></td>
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

<div id="estadoFisicoBien-modal" class="modal fade">
<form method="POST">
	<?php
		EstadoFisicoBienController::actualizar();
	?>
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4>Actualizar Registros</h4>
			</div>
			<div class="modal-body">
				<input type="hidden" name="id" id="id" value="">
				<label for="descripcion_estado_fisico">Descripción Estatus Fisico: </label>
				<input type="text" id="descripcion_estado_fisico" name="descripcion_estado_fisico" class="form-control" maxlength="50" pattern="[A-Za-z ]{0,50}" placeholder="Ingrese el Cargo" required>
				<small>No Admite Caracteres Especiales. Sólo Letras, Hasta 50 Caracteres.</small>
			</div>
			<div class="modal-footer">
				<button type="submit" name="submit" value="edit" class="btn btn-sm btn-primary">Guardar</button>
			</div>
		</div>
	</div>
</form>
</div>