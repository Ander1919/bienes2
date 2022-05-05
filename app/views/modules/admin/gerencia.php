<?php
	require_once "../app/controllers/GerenciaController.php";
	$gerencia = GerenciaController::consulta();
	//var_dump($tipo_bien);
?>
<div class="container">
	<div class="row">
		<div class="text-center"><h3>Listado de Gerencias:</h3></div>
		<div class="pull-right"><a class="btn btn-success" href="index.php?action=admin/crear_gerencia">Registrar</a></div>
	</div>	
	<hr>
	<div class="row">
		<table id="" class="display nowrap table table-bordered text-center" style="width:100%">
			<thead>
				<tr>					
					<th>Descripción</th>
					<th>Acción</th>
				</tr>
			</thead>
			<tbody>
				<?php
				while ($row = pg_fetch_assoc($gerencia)) {
				?>
					<tr>						
						<td><?php echo $row["descripcion_gerencia"] ?></td>
						<td><button id="<?php echo $row["id_gerencia"]?>" class="editar-gerencia btn-sm btn btn-primary">Editar</button></td>
					</tr>
				<?php
				}
				?>
			</tbody>
			<tfoot>
				<tr>					
					<th>Descripción</th>
					<th>Acción</th>
				</tr>
			</tfoot>
		</table>
	</div>
</div>

<div id="gerencia-modal" class="modal fade"> <!--Aqui se define que es un modal -->
	<form method="post">
	<?php
		$objeto = GerenciaController::actualizarGerencia();
			//GerenciaController::actualizarGerencia();
	?>	 
	 <div class="modal-dialog"> <!--Aqui se define que es una ventana de dialogo -->
	 	<div class="modal-content"> <!--Aqui se define el contenido de ese modal -->
	 		<div class="modal-header">
	 			<h3>Actualizar Gerencia</h3>
	 		</div>
	 		<div class="modal-body">
	 			<input type="hidden" name="id_gerencia" id="id_gerencia">
	    	    <label for="nombre_gerencia">Descripción de la Gerencia: </label>
				<input type="text" name="nombre_gerencia" id="nombre_gerencia" class="form-control" maxlength="50" pattern="[A-Za-z ]{0,50}" placeholder="Ingrese el Nombre de la Gerencia" required>
				<small>No Admite Caracteres Especiales. Sólo Letras, Hasta 50 Caracteres.</small>
	 		</div>
	 		<div class="modal-footer">
	 			<button type="submit" name="submit_actualizarGerencia" value="edit" class="btn btn-primary btn-sm">Guardar</button>
	 		</div>
	 	</div>
	 </div>		
	</form>
</div>