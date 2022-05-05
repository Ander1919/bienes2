<?php

require_once "ConexionModel.php";

class CargoModel{

	public function select() {

	$conexion = ConexionModel::conexion();

	$query = "SELECT * FROM cargos order by id_cargo asc";

	$resultado = pg_query($conexion, $query);

	return $resultado;

	}

	public function insertarCargo($datos_cargo) {

	$conexion = ConexionModel::conexion();

	$query = sprintf ("INSERT INTO public.cargos(descripcion_cargo, cedula_usuario, fecha_registro)
   				 VALUES ('%s','%s','%s')",

   				 $datos_cargo['descripcion_cargo'],
				 $_SESSION["user_id"],
				 $datos_cargo['date']);

		$resultado = pg_query($conexion, $query);

	    return $resultado;
	}

	public function consultaCargoID ($id) {

		$conexion = ConexionModel::conexion();

		$query = "SELECT * FROM cargos WHERE id_cargo = $id";

		$resultado = pg_query($conexion, $query);

		return $resultado;

	}

	public function actualizar($datos_cargo){

		$conexion = ConexionModel::conexion();

		$query = sprintf("UPDATE public.cargos
   				SET descripcion_cargo='%s'
 				WHERE id_cargo = '%s'",
 				$datos_cargo["descripcion_cargo"],
 				$datos_cargo["id"]
 		);

 		$resultado = pg_query($conexion, $query);

		return $resultado;
	}

}