<?php
	require_once "../app/controllers/DescripcionBienController.php";	
	require_once "../app/controllers/SelectController.php";	

   $tipo_bien = SelectController::selectTipoBien();

?>
<div class="container form-group">
	<form method="post">
	<div class="row">
		<h3>Registrar Nuevo Bien</h3>
	</div>	
	<div class="row"> 
	   	<div class="col-sm-6">
	   		<br>
	   		<label>Tipo de Bienes</label>
	   		<select class="form-control" name="tipo_bien" id="tipo_bien" required>
       		   		<option value="" disabled selected>Seleccione...</option>
       		   			<?php
       		   			  while ($resultado = pg_fetch_assoc($tipo_bien)){
       		   			    echo "<option value='".$resultado['id_tipo_bien']."'>".$resultado['descripcion_tipobien']."</option>";
       		   			  }
       		   			?>
       		</select>
       	</div>
    </div>
    <div class="row">
    	<div class="col-sm-2">
       		<label for="grupo">Grupo</label>
       		<input class="form-control" type="text" id="grupo" name="grupo">       		
       	</div>
		<div class="col-sm-2">
			<label for="sub_grupo">Sub-Grupo</label>
       		<input class="form-control" type="text" id="sub_grupo" name="sub_grupo">
       	</div>
       	<div class="col-sm-2">
       		<label for="seccion">Sección</label>
       		<input class="form-control" type="text" id="seccion" name="seccion">   
       	</div>   		
	</div>
    <div class="row">
		<div class="col-sm-6">
			<label for="descripcion_bien">Descripción del Bien: </label>
			<input type="text" name="nombre_bien" class="form-control" maxlength="50" pattern="[A-Za-z ]{0,50}" placeholder="Ingrese el Nombre de Bien" required>
			<small>No Admite Caracteres Especiales. Sólo Letras, Hasta 50 Caracteres.</small>
		</div>
	</div>	
	<br>
	<div class="row">
		<div class="col-sm-2">
			<input type="submit" name="submit_descripcion_bien" value="Registrar" class="btn btn-primary">
		</div>	
	</div>
	<?php
		DescripcionBienController::registrarDescripcionBien();
	?> 
	</form>
</div>
