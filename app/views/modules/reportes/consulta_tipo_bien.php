<?php
	require_once "../app/controllers/SelectController.php";
	require_once "../app/controllers/TipoBienController.php";

	$tipo_bien = SelectController::selectTipoBien();
	$bienes = SelectController::selectBienes();

?>
<div class="container">
	<div class="row">
		<h2 class="text-center">Consulta por Tipo de Bien</h2>
	</div>
	<hr>
	<form method="post">
	<div class="row form-group">
		<div class="col-sm-4">
			<label for="tipo_bien">Tipo de Bien:</label>
	        <select class="form-control" name="tipo_bien" id="tipo_bien" onChange="cargaContenido(this.id)" required>
	          <option value="" disabled selected>Seleccione...</option>
	          <?php
	            while ($resultado = pg_fetch_assoc($tipo_bien)){
	              echo "<option value='".$resultado['id_tipo_bien']."'>".$resultado['descripcion_tipobien']."</option>";
	            }
	          ?>
	        </select>
		</div>
		<div class="col-sm-2">
			<br>
			<input name="submit_consulta_tipo_bien" type="submit" value="Buscar" class="btn btn-primary">
		</div>
	</div>
	<?php
		$data = TipoBienController::consultaTipoBien();
	?>
	<div>
		<table id="tabla" class="display nowrap table table-bordered text-center" style="width:100%">
	        <thead>
	            <tr>
	            	<th>N° Bien</th>
	            	<th>Descripción del Bien</th>
	            	<th>N° Serial</th>
	            	<th>Grupo</th>
	            	<th>Sub Grupo</th>
	            	<th>Sección</th>
	            	<th>Características</th>
	            	<th>Estatus del Bien</th>
	            </tr>
	        </thead>
	        <tbody>
	        	<?php
					while ($row = pg_fetch_assoc($data))
					{
				?>
					<tr>					
						<td><?php echo $row['numero_bien'];?></td>
						<td><?php echo $row['descripcion_bien'];?></td>
						<td><?php echo $row['serial_bien'];?></td>
						<td><?php echo $row['grupo'];?></td>
						<td><?php echo $row['sub_grupo'];?></td>
						<td><?php echo $row['seccion'];?></td>
						<td><?php echo $row['caracteristicas'];?></td>
						<td><?php echo $row['descripcion_estatus'];?></td>
					</tr>				
				<?php
					}
				?>
	        </tbody>
	        <tfoot>
	            <tr>
	                <th>N° Bien</th>
	            	<th>Descripción del Bien</th>
	            	<th>N° Serial</th>
	            	<th>Grupo</th>
	            	<th>Sub Grupo</th>
	            	<th>Sección</th>
	            	<th>Características</th>
	            	<th>Estatus del Bien</th>
	            </tr>
	        </tfoot>
		</table>
	</div>
<div>