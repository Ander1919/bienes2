<?php
	require_once "../app/controllers/TipoBienController.php";
	$tipo_bien = TipoBienController::consulta();
	//var_dump($tipo_bien);
?>
<div class="container">
	<div class="row">
		<div class="text-center"><h3>Listado de Tipos de Bienes</h3></div>
		<div class="pull-right"><a class="btn btn-success" href="index.php?action=admin/crear_tipo_bien">Registrar</a></div>
	</div>	
	<hr>
	<div class="row">
		<table id="" class="display nowrap table table-bordered text-center" style="width:100%">
			<thead>
				<tr>
					<th>Id</th>
					<th>Descripción</th>
					<th>Grupo</th>
					<th>Sub-Grupo</th>
					<th>Sección</th>
					<th>Acción</th>
				</tr>
			</thead>
			<tbody>
				<?php
				while ($row = pg_fetch_assoc($tipo_bien)) {
				?>
					<tr>
						<td><?php echo $row["id_tipo_bien"] ?></td>
						<td><?php echo $row["descripcion_tipobien"] ?></td>
						<td><?php echo $row["grupo"] ?></td>
						<td><?php echo $row["sub_grupo"] ?></td>
						<td><?php echo $row["seccion"] ?></td>
						<td><button class="editTipoBien btn btn-sm btn-primary" id="<?php echo $row["id_tipo_bien"];?>">Edit</button></td>
					</tr>
				<?php
				}
				?>
			</tbody>		
		</table>
	</div>
</div>

<div id="edit_modal" class="modal fade">
	<form method="POST">
	<?php
		TipoBienController::actualizacion();
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
				<input type="text" name="descripcion" id="descripcion" value="" class="form-control" maxlength="50" pattern="[A-Za-z ]{0,50}" placeholder="Ingrese el Tipo de Bien" Title="No Admite Caracteres Especiales, sólo Letras. Máx 50 caracteres." required>
				<label>Grupo</label>
				<input type="text" name="grupo" id="grupo" value "" class="form-control" maxlength="2" pattern="[0-9]{1,2}" placeholder="Grupo" Title="No Admite Caracteres Especiales, sólo num. Máx 2 caracteres." required>
				<label>Sub-Grupo</label>
				<input type="text" name="sub_grupo" id="sub_grupo" value "" class="form-control" maxlength="2" pattern="[0-9]{1,2}" placeholder="Sub-Grupo" Title="No Admite Caracteres Especiales, sólo num. Máx 2 caracteres." required>
				<label>Sección</label>
				<input type="text" name="seccion" id="seccion" value "" class="form-control" maxlength="2" pattern="[0-9]{1,2}" placeholder="Sección" Title="No Admite Caracteres Especiales, sólo num. Máx 2 caracteres." required>
			</div>
			<div class="modal-footer">
				<button type="submit" name="submit" value="edit" class="btn btn-primary btn-sm">Guardar</button>
			</div>
		</div>
	</div>
	</form>	
</div>