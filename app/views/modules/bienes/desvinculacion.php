<?php
	require_once "../app/controllers/MovimientosController.php";
?>
<div class="container">
	<div class="row">
		<h2 class="text-center">Desvinculacion de Bienes</h2>
	</div>
	<hr>
	<form method="post">
	<div class="row form-group">
		<div class="col-sm-4">
			<label for="cedula">Cédula Empleado:</label>
			<input class="form-control" type="text" name="cedula" value="" maxlength="8" placeholder="Cédula del Empleado">
		</div>
		<div class="col-sm-2">
			<br>
			<input name="submit_consulta" type="submit" value="Buscar" class="btn btn-primary">
		</div>
	</div>
	<?php
		$empleado = MovimientosController::desvinculacionBienesEmpleado();
	?>
	<div class="row">
		<table id="tabla" class="display nowrap table table-bordered text-center" style="width:100%">
	        <thead>
	            <tr>
	            	<th><label for="checkbox"><input type="checkbox" id="checkbox" value=""></label></th>
	            	<th>Nombre Empleado</th>
	                <th>Cedula Empleado</th>
	            	<th>Tipo Bien</th>
	            	<th>Nombre del Bien</th>
	            	<th>N° Bien</th>
	                <th>Serial</th>
	                <th>Marca</th>
	                <th>Modelo</th>
	                <th>Caracteristicas</th>	               	            	
	                <th>Fecha de Asignación</th>               
	            </tr>
	        </thead>
	        <tbody>
	        	<?php
					while ($row = pg_fetch_assoc($empleado))
					{
				?>
					<tr>
						<td><input type="checkbox" name="desvincular[]" value="<?php echo $row['numero_bien']; ?>"></td>					
						<td><?php echo ucwords(strtolower($row['nombre_empleado']." ".$row['apellido_empleado'])); ?></td>
						<td><?php echo $row['id_cedula_empleado'];?></td>
						<td><?php echo $row['descripcion_tipobien'];?></td>
						<td><?php echo $row['descripcion_bien'];?></td>
						<td><?php echo $row['numero_bien'];?></td>
						<td><?php echo $row['serial_bien'];?></td>
						<td><?php echo $row['marca'];?></td>
						<td><?php echo $row['modelo'];?></td>
						<td><?php echo $row['caracteristicas'];?></td>												
						<td><?php echo $row['fecha_mov'];?></td>
						<input type="hidden" name="cedula_empleado" value="<?php echo $row["id_cedula_empleado"]; ?>">					
					</tr>				
				<?php
					}
				?>
	        </tbody>
	        <tfoot>
	            <tr>
	            	<th><label for="checkbox"><input type="checkbox" id="checkbox" value=""></label></th>
	            	<th>Nombre Empleado</th>
	                <th>Cedula Empleado</th>
	            	<th>Tipo Bien</th>
	            	<th>Nombre del Bien</th>
	            	<th>N° Bien</th>
	                <th>Serial</th>
	                <th>Marca</th>
	                <th>Modelo</th>
	                <th>Caracteristicas</th>	               	            	
	                <th>Fecha de Asignación</th>               
	            </tr>
	        </tfoot>
	    </table>
	</div>
	<hr>
	<div class="row col-12">
		<label for="observacion">Observacion:</label>
		<input class="form-control" type="text" name="observacion" value="" maxlength="50" placeholder="Observacion Desvinculacion">
	</div>
	<br>
	<div class="row">
		<input name="submit_desvinculacion" type="submit" value="Desvincular" class="btn btn-danger">
	</div>
</div>
</form>
  