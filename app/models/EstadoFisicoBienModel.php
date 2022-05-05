<?php

require_once "ConexionModel.php";

class EstadoFisicoBienModel{

	public function select()
	{

		$conexion = ConexionModel::conexion();

		$query = "SELECT * FROM estado_fisico_bien order by id_estado_fisico_bien asc";

		$resultado = pg_query($conexion, $query);

		return $resultado;

	}

	public function insertar($datos)

	{

	$conexion = ConexionModel::conexion();

	$query = sprintf ("INSERT INTO public.estado_fisico_bien(descripcion_estado_fisico, cedula_usuario, 
            fecha_registro)
   				 VALUES ('%s','%s','%s')",

   				 $datos['descripcion_estado_fisico'],
				 $_SESSION["user_id"],
				 $datos['date']);

		$resultado = pg_query($conexion, $query);

	    return $resultado;
	}

	public function consultaID($id){

		$conexion = ConexionModel::conexion();

		$query = "SELECT * FROM estado_fisico_bien WHERE id_estado_fisico_bien = $id";

		$resultado = pg_query($conexion, $query);

		return $resultado;
	}

	public function actualizar($datos){

		$conexion = ConexionModel::conexion();

		$query = sprintf("UPDATE public.estado_fisico_bien
   				SET descripcion_estado_fisico='%s'
 				WHERE id_estado_fisico_bien = '%s'",
 				$datos["descripcion_estado_fisico"],
 				$datos["id"]
 		);

 		$resultado = pg_query($conexion, $query);

		return $resultado;
	}
}
