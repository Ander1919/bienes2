<?php
// Array que vincula los IDs de los selects declarados en el HTML con el nombre de la tabla donde se encuentra su contenido
$listadoSelects=array(
"tipo_bien"=>"tipo_bien",
"bienes"=>"bienes",
);

function validaSelect($selectDestino)
{
	// Se valida que el select enviado via GET exista
	global $listadoSelects;
	if(isset($listadoSelects[$selectDestino])) return true;
	else return false;
}

function validaOpcion($opcionSeleccionada)
{
	// Se valida que la opcion seleccionada por el usuario en el select tenga un valor numerico
	if(is_numeric($opcionSeleccionada)) return true;
	else return false;
}

$selectDestino=$_GET["select"]; $opcionSeleccionada=$_GET["opcion"];

if(validaSelect($selectDestino) && validaOpcion($opcionSeleccionada))
{

	$tabla=$listadoSelects[$selectDestino];
	require_once "../app/models/ConexionModel.php";
	$conexion = ConexionModel::conexion();

	$query = "SELECT * FROM $tabla WHERE id_tipo_bien='$opcionSeleccionada'";

	$consulta = pg_query($conexion, $query);
		
	// Comienzo a imprimir el select

	echo "<label for='bienes'>Bien:</label>";
	echo "<select name='".$selectDestino."' id='".$selectDestino."' class='form-control' required>";
	echo "<option value='' disabled selected>Seleccione...</option>";
	while($registro = pg_fetch_row($consulta))
	{
		// Convierto los caracteres conflictivos a sus entidades HTML correspondientes para su correcta visualizacion
		$registro[1]=htmlentities($registro[1]);
		// Imprimo las opciones del select
		echo "<option value='".$registro[0]."'>".$registro[1]."</option>";
	}			
	echo "</select>";
}
?>
