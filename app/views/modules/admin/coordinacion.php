<?php
	require_once "../app/controllers/CoordinacionController.php";
	require_once "../app/controllers/SelectController.php";	

	$coordinacion = CoordinacionController::consultaCoordinacion();
	$gerencia = SelectController::selectGerencia();
   	//var_dump($tipo_bien);
?>

<div class="container">
	<div class="row">
		<div class="text-center"><h3>Listado de Coordinaciones</h3></div>
		<div class="pull-right"><a class="btn btn-success" href="index.php?action=admin/crear_coordinacion">Registrar</a></div>
	</div>
	<hr>	
	<div class="row">
		<table id="" class="display nowrap table table-bordered text-center" style="width:100%">
			<thead>
				<tr>
					<th>Gerencia</th>					
					<th>Descripción Coordinación</th>
					<th>Acción</th>
				</tr>
			</thead>
			<tbody>
				<?php
				while ($row = pg_fetch_assoc($coordinacion)) {
				?>
					<tr>
						<td><?php echo $row["descripcion_gerencia"] ?></td>						
						<td><?php echo $row["descripcion_coordinacion"] ?></td>
						<td><button id="<?php echo $row["id_coordinacion"] ?>" class="editar-coordinacion btn-sm btn btn-primary">Editar</button></td>
					</tr>
				<?php
				}
				?>
			</tbody>
			<tfoot>
				<tr>				
					<th>Gerencia</th>					
					<th>Descripción Coordinación</th>
					<th>Acción</th>				
				</tr>
			</tfoot>
		</table>
	</div>
</div>

<div id="coordinacion-modal" class="modal fade"> <!--Aqui se define que es un modal -->
	<form method="post">
	<?php
		$objeto = new CoordinacionController();
		$objeto->actualizarCoordinacion();
	 ?>
	 
	 <div class="modal-dialog"> <!--Aqui se define que es una ventana de dialogo -->
	 	<div class="modal-content"> <!--Aqui se define el contenido de ese modal -->
	 		<div class="modal-header">
	 			<h3>Actualizar Coordinación</h3>
	 		</div>
	 		<div class="modal-body">
	    	    <label for="gerencia">Gerencia:</label>
	        	<select class="form-control" name="gerencia" id="gerencia" required>
	          		<option value="" disabled selected>Seleccione...</option>
	          			<?php
	          			  while ($resultado = pg_fetch_assoc($gerencia)){
	          			    echo "<option value='".$resultado['id_gerencia']."'>".$resultado['descripcion_gerencia']."</option>";
	          			  }
	          			?>
	        	</select>
				<label for="nombre_coordinacion">Descripción de la Coordinación: </label>
				<input type="text" name="nombre_coordinacion" id="nombre_coordinacion" class="form-control" maxlength="50" pattern="[A-Za-z ]{0,50}" placeholder="Ingrese el Nombre de la Coordinación" required>
				<input type="hidden" name="id_coordinacion" id="id_coordinacion">
				<small>No Admite Caracteres Especiales. Sólo Letras, Hasta 50 Caracteres.</small>
	 		</div>
	 		<div class="modal-footer">
	 			<button type="submit" name="submit_actualizarCoordinacion" value="edit" class="btn btn-primary btn-sm">Guardar</button>
	 		</div>
	 	</div>
	 </div>		
	</form>
</div>