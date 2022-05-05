<?php
require_once "../app/controllers/BienesController.php";
?>
<div class="container">
	<div class="row">
		<h2 class="text-center">Consulta Inventario</h2>
	</div>
	<hr>
	<form method="post">
	<div class="row">
	<?php
		$consulta = BienesController::consultaInventario();
	?>
		<table id="tabla" class="display nowrap table table-bordered text-center" style="width:100%">
	        <thead>
				<tr>
					<th>Número de Bien</th>
					<th>Tipo de Bien</th>
					<th>Descripción Bien</th>
					<th>Grupo</th>
					<th>Sub-Grupo</th>
					<th>Sección</th>
					<th>Marca</th>
					<th>Modelo</th>
					<th>Nombre de la Institución</th>
					<th>Caracteristicas del Bien</th>
					<th>Serial del Bien</th>
					<th>Valor</th>
					<th>Nombre Almecen</th>
					<th>Estado Fisico del Bien</th>
					<th>Estatus del Bien</th>
				</tr>
	        </thead>
	        <tbody>
	        	<?php
					while ($row = pg_fetch_assoc($consulta))
					{
				?>
					<tr>					
						<td><?php echo $row['numero_bien'];?></td>
						<td><?php echo $row['descripcion_tipobien'];?></td>
						<td><?php echo $row['descripcion_bien'];?></td>
						<td><?php echo $row['grupo'];?></td>
						<td><?php echo $row['sub_grupo'];?></td>
						<td><?php echo $row['seccion'];?></td>
						<td><?php echo $row['marca'];?></td>
						<td><?php echo $row['modelo'];?></td>
						<td><?php echo $row['nombre_institucion'];?></td>
						<td><?php echo $row['caracteristicas'];?></td>
						<td><?php echo $row['serial_bien'];?></td>
						<td><?php echo $row['valor'];?></td>
						<td><?php echo $row['nombre_almacen'];?></td>
						<td><?php echo $row['descripcion_estado_fisico'];?></td>
						<td><?php echo $row['descripcion_estatus'];?></td>
					</tr>				
				<?php
					}
				?>
	        </tbody>
	        <tfoot>
				<tr>
					<th>Número de Bien</th>
					<th>Tipo de Bien</th>
					<th>Descripción Bien</th>
					<th>Grupo</th>
					<th>Sub-Grupo</th>
					<th>Sección</th>
					<th>Marca</th>
					<th>Modelo</th>
					<th>Nombre de la Institución</th>
					<th>Caracteristicas del Bien</th>
					<th>Serial del Bien</th>
					<th>Valor</th>
					<th>Nombre Almecen</th>
					<th>Estado Fisico del Bien</th>
					<th>Estatus del Bien</th>
				</tr>
	        </tfoot>
		</table>
	</div>	
<div>