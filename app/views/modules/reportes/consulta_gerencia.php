<?php
	require_once "../app/controllers/SelectController.php";
	require_once "../app/controllers/BienesController.php";

	$gerencias = SelectController::selectGerencia();
?>
<div class="container">
	<div class="row">
		<h2 class="text-center">Consulta Bienes por Gerencia</h2>
	</div>
	<hr>
	<form method="post">
	<div class="row form-group">
		<div class="col-sm-4">
			<label for="gerencia">Gerencia:</label>
	        <select class="form-control" name="gerencia" id="gerencia" onChange="cargaContenido(this.id)" required>
	          <option value="" disabled selected>Seleccione...</option>
	          <?php
	            while ($resultado = pg_fetch_assoc($gerencias)){
	              echo "<option value='".$resultado['id_gerencia']."'>".$resultado['descripcion_gerencia']."</option>";
	            }
	          ?>
	        </select>
		</div>
		<div class="col-sm-2">
			<br>
			<input name="submit" type="submit" value="Buscar" class="btn btn-primary">
		</div>
	</div>
	<?php
		$data = BienesController::consultaBienesGerencia();
	?>
	<div>
		<table id="tabla" class="display nowrap table table-bordered text-center" style="width:100%">
	        <thead>
	            <tr>
	            	<th>Numero Bien</th>
	            	<th>Tipo de Bien</th>
	            	<th>Descripcion del Bien</th>
	            	<th>Gerencia</th>
	            	<th>Coordinacion</th>
	            	<th>Fecha de Asignación</th>
	            </tr>
	        </thead>
	        <tbody>
	        	<?php
					while ($row = pg_fetch_assoc($data))
					{
				?>
					<tr>					
						<td><?php echo $row["numero_bien"];?></td>
						<td><?php echo $row["descripcion_tipobien"];?></td>
						<td><?php echo $row["descripcion_bien"];?></td>
						<td><?php echo $row["descripcion_gerencia"];?></td>
						<td><?php echo $row["descripcion_coordinacion"];?></td>
						<td><?php echo $row["fecha_movimiento"];?></td>
					</tr>				
				<?php
					}
				?>
	        </tbody>
	        <tfoot>
	                <tr>
	            	<th>Numero Bien</th>
	            	<th>Tipo de Bien</th>
	            	<th>Descripcion del Bien</th>
	            	<th>Gerencia</th>
	            	<th>Coordinacion</th>
	            	<th>Fecha de Asignación</th>
	            </tr>
	        </tfoot>
		</table>
	</div>
<div>