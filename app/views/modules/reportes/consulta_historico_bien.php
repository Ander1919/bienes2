<?php
	require_once "../app/controllers/MovimientosController.php";
?>
<div class="container">
	<div class="row">
		<h2 class="text-center">Consulta Historico de Bienes</h2>
	</div>
	<hr>
	<form method="post">
	<div class="row form-group">
		<div class="col-sm-4">
			<label for="cedula">Número de Bien:</label>
			<input class="form-control" type="text" name="numero_bien" value="" maxlength="6" placeholder="N° de Bien">
		</div>
		<div class="col-sm-2">
			<br>
			<input name="submit_consulta_bien" type="submit" value="Buscar" class="btn btn-primary">
		</div>
	</div>
	<?php
		$num_bien = MovimientosController::consultaHistoricoBien();
	?>
	<div>
		<table id="tabla" class="display nowrap table table-bordered text-center" style="width:100%">
	        <thead>
	            <tr>
	            	<th>N° Bien</th>
	            	<th>Tipo Bien</th>
	            	<th>Descripción Bien</th>
	            	<th>Caracteristicas</th>
	            	<th>Tipo Mov</th>
	            	<th>C.I</th>
	            	<th>Nombre y Apellido Empleado</th>
	            	<th>Fecha de Asignación</th>
	            	<th>Estatus del Bien</th>
	            </tr>
	        </thead>
	        <tbody>
	        	<?php
					while ($row = pg_fetch_assoc($num_bien))
					{
				?>
					<tr>					
						<td><?php echo $row['numero_bien'];?></td>
						<td><?php echo $row['descripcion_tipobien'];?></td>
						<td><?php echo $row['descripcion_bien'];?></td>
						<td><?php echo $row['caracteristicas'];?></td>
						<td><?php echo $row['nombre_mov'];?></td>
						<td><?php echo $row['id_cedula_empleado'];?></td>
						<td><?php echo ucwords(strtolower($row['nombre_empleado']." ".$row['apellido_empleado']));?></td>
						<td><?php echo $row['fecha_mov'];?></td>
						<td><?php echo $row['descripcion_estatus']?></td>
						
					</tr>				
				<?php
					}
				?>
	        </tbody>
	        <tfoot>
	            <tr>
	               <th>N° Bien</th>
	            	<th>Tipo Bien</th>
	            	<th>Descripción Bien</th>
	            	<th>Caracteristicas</th>
	            	<th>Tipo Mov</th>
	            	<th>C.I</th>
	            	<th>Nombre y Apellido Empleado</th>
	            	<th>Fecha de Asignación</th>
	            	<th>Estatus del Bien</th>
	            </tr>
	        </tfoot>
		</table>
	</div>
<div>