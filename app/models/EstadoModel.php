<?php

require_once "ConexionModel.php";

class EstadoModel{

	public function select() {

	$conexion = ConexionModel::conexion();

	$query = "SELECT * FROM estados order by id_estado asc";

	$resultado = pg_query($conexion, $query);

	return $resultado;

	}

	public function insertarEstado($datos_estado) {

	$conexion = ConexionModel::conexion();

	$query = sprintf ("INSERT INTO public.estados(descripcion_estado, cedula_usuario, fecha_registro)
   				 VALUES ('%s','%s','%s')",

   				 $datos_estado['descripcion_estado'],
				 $_SESSION["user_id"],
				 $datos_estado['date']);

		$resultado = pg_query($conexion, $query);

	    return $resultado;
	}

	public function consultaEstadoID ($id) {

		$conexion = ConexionModel::conexion();

		$query = "SELECT * FROM estados WHERE id_estado = $id";

		$resultado = pg_query($conexion, $query);

		return $resultado;

	}

	public function actualizar($datos_estado){

		$conexion = ConexionModel::conexion();

		$query = sprintf("UPDATE public.estados
   				SET descripcion_estado='%s'
 				WHERE id_estado = '%s'",
 				$datos_estado["descripcion_estado"],
 				$datos_estado["id"]
 		);

 		$resultado = pg_query($conexion, $query);

		return $resultado;
	}
}
