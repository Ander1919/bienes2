<?php
	require_once "../app/controllers/MunicipioController.php";	
	require_once "../app/controllers/SelectController.php";	

   $estado = SelectController::selectEstado();

?>
<div class="container form-group">
	<form method="post">
	<div class="row">
		<h3>Registrar Nuevo Municipio</h3>
	</div>
	<div class="row">
	    <div class="col-sm-4">
    	    <label for="estado">Estado:</label>
        	<select class="form-control" name="estado" id="estado" required>
          		<option value="" disabled selected>Seleccione...</option>
          			<?php
          			  while ($resultado = pg_fetch_assoc($estado)){
          			    echo "<option value='".$resultado['id_estado']."'>".$resultado['descripcion_estado']."</option>";
          			  }
          			?>
        	</select>
      	</div>
     </div>
    <div class="row">
		<div class="col-sm-4">
			<label for="descripcion_municipio">Descripción del Municipio: </label>
			<input type="text" name="descripcion_municipio" class="form-control" maxlength="50" pattern="[A-Za-z ]{0,50}" placeholder="Ingrese el Nombre del Municipio" required>
			<small>No Admite Caracteres Especiales. Sólo Letras, Hasta 50 Caracteres.</small>
		</div>
	</div>	
	<div class="row">
		<div class="col-sm-2">
			<input type="submit" name="submit_descripcion_municipio" value="Registrar" class="btn btn-primary">
		</div>	
	</div>
	<?php
		MunicipioController::registrarMunicipio();
	?> 
	</form>
</div>
