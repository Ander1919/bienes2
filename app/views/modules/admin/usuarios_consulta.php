<?php
	require_once "../app/controllers/UsuariosController.php";
	$usuarios = UsuariosController::consulta();
?>
<br>
<div class="container text-center">
	<div class="row text-center">
		<h3>Consulta Usuarios</h3>
	</div>
	<hr>
	<table id="tabla" class="row text-center display nowrap table table-bordered text-center" style="width:100%">
		<thead>
			<tr>
				<th>Cedula</th>
				<th>Nombre Usuario</th>
				<th>Correo</th>
				<th>Perfil</th>
				<th>Estatus</th>
			</tr>
		</thead>
		<tbody>
		<?php
		while ($row = pg_fetch_assoc($usuarios))
		{
		?>
			<tr>					
				<td><?php echo $row['cedula'];?></td>
				<td><?php echo ucwords(strtolower($row['nombre']." ".$row['apellido']));?></td>
				<td><?php echo $row['correo'];?></td>
				<td><?php echo $row['nombre_perfil'];?></td>
				<?php
				if ($row['estatus_usuario'] == 't') {
				?>
				<td><button class="suspender-usuario btn btn-sm btn-danger" id="<?php echo $row["cedula"];?>">Suspender</button></td>
				<?php	
				 }elseif($row['estatus_usuario'] == 'f'){ 
				?>
				<td><button class="activar-usuario btn btn-sm btn-success" id="<?php echo $row["cedula"];?>">Activar</button></td>
				<?php	
				 } 
				?>

			</tr>				
		<?php
		}
		?>
		</tbody>
		<tfoot>
			<tr>
				<th>Cedula</th>
				<th>Nombre Usuario</th>
				<th>Correo</th>
				<th>Perfil</th>
				<th>Estatus</th>
			</tr>
		</tfoot>
	</table>
</div>