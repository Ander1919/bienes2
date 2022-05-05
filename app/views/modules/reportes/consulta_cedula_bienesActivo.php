<?php
	require_once "../app/controllers/MovimientosController.php";
?>

<div class="container">
	<div class="row">
		<h2 class="text-center">Consulta de Bienes Activos por Usuario</h2>
	</div>
	<hr>
	<form method="post">
	<div class="row form-group">
		<div class="col-sm-4">
			<label for="cedula">Cédula Empleado:</label>
			<input class="form-control" type="text" name="cedula" value="" required pattern="[0-9]{7,8}" maxlength="8" placeholder="N° Cédula del Empleado" title="Solo Números Permitidos. Cantidad Caracteres: 8">
		</div>
		<div class="col-sm-2">
			<br>
			<input name="submit_consulta_empleado" type="submit" value="Buscar" class="btn btn-primary">
		</div>
	</div>
	<?php
		$empleado = MovimientosController::consultaBienesActivoEmpleado();
	?>
	<div class="row">
		<table id="tabla" class="display nowrap table table-bordered text-center" style="width:100%">
	        <thead>
	            <tr>
	            	<th>Tipo Bien</th>
	            	<th>Grupo</th>
	            	<th>Sub-Grupo</th>
	            	<th>Sección</th>
	            	<th>Clasificación del Bien</th>
	            	<th>Marca</th>
	            	<th>Modelo</th>	            	
	            	<th>N° Bien</th>
	                <th>Serial</th>	               
	            	<th>Caracteristicas</th>	            	
	                <th>Cedula Empleado</th>
	                <th>Nombre Empleado</th>
	                <th>Fecha de Asignación</th>               
	            </tr>
	        </thead>
	        <tbody>
	        	<?php
					while ($row = pg_fetch_assoc($empleado))
					{
				?>
					<tr>										
						<td><?php echo $row['descripcion_tipobien'];?></td>
						<td><?php echo $row['grupo'];?></td>
						<td><?php echo $row['sub_grupo'];?></td>
						<td><?php echo $row['seccion'];?></td>
						<td><?php echo $row['descripcion_bien'];?></td>
						<td><?php echo $row['marca'];?></td>
						<td><?php echo $row['modelo'];?></td>
						<td><?php echo $row['numero_bien'];?></td>
						<td><?php echo $row['serial_bien'];?></td>						
						<td><?php echo $row['caracteristicas'];?></td>						
						<td><?php echo $row['id_cedula_empleado'];?></td>
						<td><?php echo ucwords(strtolower($row['nombre_empleado']." ".$row['apellido_empleado'])); ?></td>
						<td><?php echo $row['fecha_mov'];?></td>									
					</tr>				
				<?php
					}
				?>
	        </tbody>
	        <tfoot>
	            <tr>
	            	<th>Tipo Bien</th>
	            	<th>Grupo</th>
	            	<th>Sub-Grupo</th>
	            	<th>Sección</th>
	            	<th>Marca</th>
	            	<th>Modelo</th>
	            	<th>Clasificación del Bien</th>
	            	<th>N° Bien</th>
	                <th>Serial</th>	               
	            	<th>Caracteristicas</th>	            	
	                <th>Cedula Empleado</th>
	                <th>Nombre Empleado</th>
	                <th>Fecha de Asignación</th>               
	            </tr>
	        </tfoot>
	    </table>
	</div>
</div>
</form>