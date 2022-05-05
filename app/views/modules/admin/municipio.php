<?php
	require_once "../app/controllers/MunicipioController.php";
	require_once "../app/controllers/SelectController.php";

	$municipio = MunicipioController::consulta();
	$estado = SelectController::selectEstado();
	
	//var_dump($tipo_bien);
?>
<div class="container">
	<div class="row">
		<div class="text-center"><h3>Listado de Municipios:</h3></div>
		<div class="pull-right"><a class="btn btn-success" href="index.php?action=admin/crear_municipio">Registrar</a></div>
	</div>	
	<hr>
	<div class="row">
		<table id="" class="display nowrap table table-bordered text-center" style="width:100%">
			<thead>
				<tr>	
					<th>Estado</th>				
					<th>Municipio</th>
					<th>Acción</th>
				</tr>
			</thead>
			<tbody>
				<?php
				while ($row = pg_fetch_assoc($municipio)) {
				?>
					<tr>
						<td><?php echo $row["descripcion_estado"]?></td>						
						<td><?php echo $row["descripcion_municipio"] ?></td>
						<td><button id="<?php echo $row["id_municipio"]?>" class="editar-municipio btn btn-sm btn-primary">Editar</button></td>
					</tr>
				<?php
				}
				?>
			</tbody>
			<tfoot>
				<tr>	
					<th>Estado</th>				
					<th>Municipio</th>
					<th>Acción</th>
				</tr>
			</tfoot>
		</table>
	</div>
</div>

<div id="municipio-modal" class="modal fade"> <!--Aqui se define que es un modal -->
	<form method="post">
	<?php
		MunicipioController::actualizarMunicipio();
	 ?>
	 
	 <div class="modal-dialog"> <!--Aqui se define que es una ventana de dialogo -->
	 	<div class="modal-content"> <!--Aqui se define el contenido de ese modal -->
	 		<div class="modal-header">
	 			<h3>Actualizar Municipio</h3>
	 		</div>
	 		<div class="modal-body">
	    	    <label for="estado">Estado:</label>
	        	<select class="form-control" name="estado" id="estado" required>
	          		<option value="" disabled selected>Seleccione...</option>
	          			<?php
	          			  while ($resultado = pg_fetch_assoc($estado)){
	          			    echo "<option value='".$resultado['id_estado']."'>".$resultado['descripcion_estado']."</option>";
	          			  }
	          			?>
	        	</select>
				<label for="nombre_municipio">Descripción del Municipio: </label>
				<input type="text" name="nombre_municipio" id="nombre_municipio" class="form-control" maxlength="50" pattern="[A-Za-z ]{0,50}" placeholder="Ingrese el Nombre del Municipio" required>
				<input type="hidden" name="id_municipio" id="id_municipio">
				<small>No Admite Caracteres Especiales. Sólo Letras, Hasta 50 Caracteres.</small>
	 		</div>
	 		<div class="modal-footer">
	 			<button type="submit" name="submit_actualizarMunicipio" value="edit" class="btn btn-primary btn-sm">Guardar</button>
	 		</div>
	 	</div>
	 </div>		
	</form>
</div>

