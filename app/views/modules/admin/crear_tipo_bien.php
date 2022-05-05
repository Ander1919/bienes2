<?php
	require_once "../app/controllers/TipoBienController.php";	
?>
<div class="container form-group">
	<form method="post">
	<div class="row">
		<h3>Registrar Nuevo Tipo de Bien</h3>
	</div>
	<br>
	<div class="row">
		<div class="col-sm-6">
			<label for="descripcion_tipo_bien">Descripción Tipo Bien: </label>
			<input type="text" name="tipo_bien" class="form-control" maxlength="50" pattern="[A-Za-z ]{0,50}" placeholder="Ingrese el Tipo de Bien" Title="No Admite Caracteres Especiales, sólo Letras. Máx 50 caracteres." required>
			
		</div>		
	</div>
	<div class="row">
		<div class="col-sm-2">
			<label for="grupo">Grupo: </label>
			<input type="text" name="grupo" class="form-control" maxlength="2" pattern="[0-9]{1,2}" placeholder="Grupo" Title="No Admite Caracteres Especiales, sólo num. Máx 2 caracteres." required>			
		</div>
		<div class="col-sm-2">
			<label for="sub_grupo">Sub-Grupo: </label>
			<input type="text" name="sub_grupo" class="form-control" maxlength="2" pattern="[0-9]{1,2}" placeholder="Sub-Grupo" Title="No Admite Caracteres Especiales, sólo num. Máx 2 caracteres." required>			
		</div>
		<div class="col-sm-2">
			<label for="seccion">Sección: </label>
			<input type="text" name="seccion" class="form-control" maxlength="2" pattern="[0-9]{1,2}" placeholder="Sección" Title="No Admite Caracteres Especiales, sólo num. Máx 3 caracteres." required>			
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col-sm-2">
			<input type="submit" name="submit_tipo_bien" value="Registrar" class="btn btn-primary">
		</div>	
	</div>
	<?php
		TipoBienController::registrarTipoBien();
	?> 
	</form>
</div>