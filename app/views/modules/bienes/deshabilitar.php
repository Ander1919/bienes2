<?php
	require_once "../app/controllers/MovimientosController.php";
?>
<form method="post">
<div class="container">
	<div class="row text-center">
		<h3>Deshabilitar Bienes</h3>
	</div>
	<hr>
	<div class="row">
		<table id="tabla" class="display nowrap table table-bordered text-center" style="width:100%">
	        <thead>
				<tr>
					<th class="text-center"><label for="deshabilitar"><input type="checkbox" id="checkbox" value=""></label></th>
					<th class="text-center">Numero del Bien</th>
					<th class="text-center">Serial del Bien</th>
					<th class="text-center">Marca</th>
					<th class="text-center">Modelo</th>
					<th class="text-center">Caracteristicas</th>
					<th class="text-center">Estatus</th>
					<th class="text-center">Bien</th>
					<th class="text-center">Tipo de Bien</th>
				</tr>
	        </thead>
	        <tbody>
	        	<?php
	        		$consulta = MovimientosController::bienesConsultaDeshabilitar();
					while ($row = pg_fetch_assoc($consulta))
					{
				?>
					<tr>
						<td><input type="checkbox" name="deshabilitar[]" value="<?php echo $row['numero_bien'];?>"></td>
						<td><?php echo $row['numero_bien'];?></td>
						<td><?php echo $row['serial_bien'];?></td>
						<td><?php echo $row['marca'];?></td>
						<td><?php echo $row['modelo'];?></td>
						<td><?php echo $row['caracteristicas'];?></td>
						<td><?php echo $row['descripcion_estatus'];?></td>
						<td><?php echo $row['descripcion_bien'];?></td>
						<td><?php echo $row['descripcion_tipobien'];?></td>
					</tr>				
				<?php
					}
				?>
	        </tbody>
	        <tfoot>
				<tr>
					<th class="text-center"><label for="deshabilitar"><input type="checkbox" id="checkbox" value=""></label></th>
					<th class="text-center">Numero del Bien</th>
					<th class="text-center">Serial del Bien</th>
					<th class="text-center">Marca</th>
					<th class="text-center">Modelo</th>
					<th class="text-center">Caracteristicas</th>
					<th class="text-center">Estatus</th>
					<th class="text-center">Bien</th>
					<th class="text-center">Tipo de Bien</th>
				</tr>
	        </tfoot>
		</table>
	</div>
	<div class="row col-12">
		<label for="observacion">Observacion:</label>
		<input class="form-control" type="text" name="observacion" value="" maxlength="50" placeholder="Observacion">
	</div>
	<br>
	<div class="row">
		<input name="submit" type="submit" value="Deshabilitar" class="btn btn-danger">
	</div>	
</div>
</form>