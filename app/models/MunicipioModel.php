<?php

require_once "ConexionModel.php";

class MunicipioModel{

	public function select() {

	$conexion = ConexionModel::conexion();

	$query = "SELECT municipios.id_estado, estados.descripcion_estado, municipios.id_municipio,
					 municipios.descripcion_municipio
					from municipios
					INNER JOIN estados on estados.id_estado = municipios.id_estado
					order by id_municipio asc";

	$resultado = pg_query($conexion, $query);

	return $resultado;

	}

	public function insertarMunicipio($datos_municipio) {

	$conexion = ConexionModel::conexion();

	$query = sprintf ("INSERT INTO public.municipios(id_estado, descripcion_municipio, cedula_usuario, fecha_registro)
   				 VALUES ('%s','%s','%s','%s')",

   				 $datos_municipio['estado'],
   				 $datos_municipio['descripcion_municipio'],
				 $_SESSION["user_id"],
				 $datos_municipio['date']);

		$resultado = pg_query($conexion, $query);

	    return $resultado;
	}

	public function consultaID($id)
	{
		$conexion = ConexionModel::conexion();

		$query = "SELECT * FROM municipios WHERE id_municipio = $id";

		$resultado = pg_query($conexion, $query);

		return $resultado;
	}

	public function actualizar($datos_municipio) 
	{
		$conexion = ConexionModel::conexion();

		$query = sprintf("UPDATE public.municipios
   				SET descripcion_municipio='%s',
   				    id_estado='%s'
 				WHERE id_municipio='%s'",
 				$datos_municipio["nombre_municipio"],
 				$datos_municipio["id_estado"],
 				$datos_municipio["id_municipio"]
 			);

		$resultado = pg_query($conexion, $query);

		return $resultado;

	}

	public function consultaEstadoID($id)
	{
		$conexion = ConexionModel::conexion();

		$query = "SELECT * FROM municipios where id_estado = $id";

		$resultado = pg_query($conexion, $query);

		return $resultado;
	}

}
