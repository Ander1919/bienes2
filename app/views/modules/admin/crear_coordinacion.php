<?php
	require_once "../app/controllers/CoordinacionController.php";	
	require_once "../app/controllers/SelectController.php";	

   $gerencia = SelectController::selectGerencia();
?>

<div class="container form-group">
	<form method="post">
	<div class="row">
		<h3>Registrar Nueva Coordinación</h3>
	</div>
	<div class="row">
	    <div class="col-sm-4">
    	    <label for="gerencia">Gerencia:</label>
        	<select class="form-control" name="gerencia" id="gerencia" required>
          		<option value="" disabled selected>Seleccione...</option>
          			<?php
          			  while ($resultado = pg_fetch_assoc($gerencia)){
          			    echo "<option value='".$resultado['id_gerencia']."'>".$resultado['descripcion_gerencia']."</option>";
          			  }
          			?>
        	</select>
      	</div>
     </div>
    <div class="row">
		<div class="col-sm-4">
			<label for="descripcion_coordinacion">Descripción de la Coordinación: </label>
			<input type="text" name="nombre_coordinacion" class="form-control" maxlength="50" pattern="[A-Za-z ]{0,50}" placeholder="Ingrese el Nombre de la Coordinación" required>
			<small>No Admite Caracteres Especiales. Sólo Letras, Hasta 50 Caracteres.</small>
		</div>
	</div>	
	<div class="row">
		<div class="col-sm-2">
			<input type="submit" name="submit_descripcion_coordinacion" value="Registrar" class="btn btn-primary">
		</div>	
	</div>
	<?php
		CoordinacionController::registrarCoordinacion();
	?> 
	</form>
</div>


