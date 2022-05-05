<?php

require_once "ConexionModel.php";

class UbicacionAlmacenModel{

	public function select (){

	$conexion = ConexionModel::conexion();

	$query = "SELECT * FROM ubicacion_almacen";

	$resultado = pg_query($conexion, $query);

	return $resultado;

	}
	
	public function insertarAlmacen($datos_almacen)
	{
		$conexion = ConexionModel::conexion();
		
		$query = sprintf ("INSERT INTO public.ubicacion_almacen(nombre_almacen, direccion, cedula_usuario,fecha_registro)
    				VALUES ('%s','%s','%s','%s')",			

    					$datos_almacen['nombre_almacen'],
			    		$datos_almacen['direccion'],
			    		$_SESSION["user_id"],
			    		$datos_almacen["date"]);
			    	
	    $resultado = pg_query($conexion, $query);

	    return $resultado;
	}	

	public function actualizar($datos)
	{
		$conexion = ConexionModel::conexion();
		
		$query = sprintf("UPDATE public.ubicacion_almacen
						  SET nombre_almacen = '%s', direccion = '%s'
						  WHERE id_ubicacion_almacen = '%s'",			
    					 $datos['nombre_almacen'],
			    		 $datos['direccion'],
			    		 $datos["id"]);
			    	
	    $resultado = pg_query($conexion, $query);

	    return $resultado;
	}
	public function consultaId($id)
	{
		$conexion = ConexionModel::conexion();

		$query = "SELECT * FROM ubicacion_almacen WHERE id_ubicacion_almacen = $id";

		$resultado = pg_query($conexion, $query);

		return $resultado;
	}
}