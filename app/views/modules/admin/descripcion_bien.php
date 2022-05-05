<?php
	require_once "../app/controllers/DescripcionBienController.php";
	require_once "../app/controllers/SelectController.php";	

	$bien = DescripcionBienController::consultaDescripcionBien();
    $tipo_bien = SelectController::selectTipoBien();
	//var_dump($tipo_bien);
?>

<div class="container">
	<div class="row">
		<div class="text-center"><h3>Listado de Bienes</h3></div>
		<div class="pull-right"><a class="btn btn-success" href="index.php?action=admin/crear_descripcion_bien">Registrar</a></div>
	</div>
	<hr>	
	<div class="row">
		<table class="display nowrap table table-bordered text-center" style="width:100%">
			<thead>
				<tr>
					<th>Tipo Bien</th>	
					<th>Grupo</th>
					<th>Sub Grupo</th>
					<th>Sección</th>				
					<th>Clasificación del Bien</th>
					<th>Acción</th>
				</tr>
			</thead>
			<tbody>
				<?php
				while ($row = pg_fetch_assoc($bien)) {
				?>
					<tr>
						<td><?php echo $row["descripcion_tipobien"] ?></td>	
						<td><?php echo $row["grupo"] ?></td>
						<td><?php echo $row["sub_grupo"] ?></td>	
						<td><?php echo $row["seccion"] ?></td>							
						<td><?php echo $row["descripcion_bien"] ?></td>
						<td><button id="<?php echo $row["id_bienes"] ?>" class="editar-descripcion-bien btn-sm btn btn-primary">Editar</button></td>
					</tr>
				<?php
				}
				?>
			</tbody>
			<tfoot>
				<tr>
					<th>Tipo Bien</th>	
					<th>Grupo</th>
					<th>Sub Grupo</th>
					<th>Sección</th>				
					<th>Clasificación del Bien</th>
					<th>Acción</th>
				</tr>
			</tfoot>
		</table>
	</div>
</div>

<div id="descripcion-bien-modal" class="modal fade">
<form method="POST">
	<?php
		DescripcionBienController::actualizar();
	?>
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4>Actualizar</h4>
			</div>

			<div class="modal-body">
				<input type="hidden" id="id_bienes" name="id_bienes" value="">
	    	    <label for="tipo_bien">Tipo de Bien:</label>
	        	<select class="form-control" name="tipo_bien" id="tipo_bien" required>
	          		<option value="" disabled selected>Seleccione...</option>
	          			<?php
	          			  while ($resultado = pg_fetch_assoc($tipo_bien)){
	          			    echo "<option value='".$resultado['id_tipo_bien']."'>".$resultado['descripcion_tipobien']."</option>";
	          			  }
	          			?>
	        	</select>
				<label for="descripcion_bien">Descripción del Bien: </label>
				<input type="text" id="nombre_bien" name="nombre_bien" class="form-control" maxlength="50" pattern="[A-Za-z ]{0,50}" placeholder="Ingrese el Nombre de Bien" required>
				<small>No Admite Caracteres Especiales. Sólo Letras, Hasta 50 Caracteres.</small>
			</div>

			<div class="modal-footer">
				<button type="submit" name="submit" value="edit" class="btn btn-sm btn-primary">Guardar</button>
			</div>
		</div>
	</div>
</form>
</div>
