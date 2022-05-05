<?php

require_once "ConexionModel.php";

class PerfilesModel{

	public function select () {

	$conexion = ConexionModel::conexion();

	$query = "SELECT * FROM perfiles";

	$resultado = pg_query($conexion, $query);

	return $resultado;

	}

}