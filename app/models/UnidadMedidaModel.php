<?php
require_once "ConexionModel.php";

class UnidadMedidaModel{

	public function select() {

	$conexion = ConexionModel::conexion();

	$query = "SELECT * FROM unidad_medida order by id_uni_medida asc";

	$resultado = pg_query($conexion, $query);

	return $resultado;

	}

}
