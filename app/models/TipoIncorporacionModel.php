<?php

require_once "ConexionModel.php";

class TipoIncorporacionModel{

	public function select (){

	$conexion = ConexionModel::conexion();

	$query = "SELECT id_tipo_incorporacion, descripcion_incorporacion FROM tipo_incorporacion;";

	$resultado = pg_query($conexion, $query);

	return $resultado;

	}

	public function insertarTipoIncorporacion($datos_tipoincorporacion)
	{
		$conexion = ConexionModel::conexion();
		
		$query = sprintf ("INSERT INTO public.tipo_incorporacion(descripcion_incorporacion, cedula_usuario, fecha_registro)
    				VALUES ('%s','%s','%s')",
			    		
			    		$datos_tipoincorporacion['tipo_incorporacion'],
			    		$_SESSION["user_id"],
			    		$datos_tipoincorporacion['date']);
			    	
	    $resultado = pg_query($conexion, $query);

	    return $resultado;
	}

	public function consultaId ($id)
	{

		$conexion = ConexionModel::conexion();

		$query = "SELECT * FROM tipo_incorporacion WHERE id_tipo_incorporacion = $id";

		$resultado = pg_query($conexion, $query);

		return $resultado;

	}	

	public function actualizar($datos)
	{
		$conexion = ConexionModel::conexion();

		$query = sprintf("UPDATE public.tipo_incorporacion
						  SET descripcion_incorporacion = '%s' 	
						  WHERE id_tipo_incorporacion = '%s'",
						  $datos["descripcion"],
						  $datos["id"]);

		$resultado = pg_query($conexion, $query);

		return $resultado;
	}
}