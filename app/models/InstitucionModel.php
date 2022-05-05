<?php

require_once "ConexionModel.php";

class InstitucionModel{

	public function select ()
	{

		$conexion = ConexionModel::conexion();

		$query = "SELECT * FROM institucion";

		$resultado = pg_query($conexion, $query);

		return $resultado;

	}

	public function insertarInstitucion($datos_institucion)
	{
		$conexion = ConexionModel::conexion();
		
		$query = sprintf ("INSERT INTO public.institucion(nombre_institucion, direccion, cedula_usuario, fecha_registro)
    				VALUES ('%s','%s','%s','%s')",			

    					$datos_institucion['nombre_institucion'],
			    		$datos_institucion['direccion'],
			    		$_SESSION["user_id"],
			    		$datos_institucion["date"]);
			    	
	    $resultado = pg_query($conexion, $query);

	    return $resultado;
	}

	public function consultaInstitucionID ($id)
	{

		$conexion = ConexionModel::conexion();

		$query = "SELECT * FROM institucion WHERE id_institucion = $id";

		$resultado = pg_query($conexion, $query);

		return $resultado;

	}	

	public function actualizar($datos_institucion)
	{
		$conexion = ConexionModel::conexion();

		$query = sprintf("UPDATE public.institucion
    			  SET nombre_institucion='%s', direccion='%s'
    			  WHERE id_institucion = '%s'",
    			  $datos_institucion["nombre_institucion"],
    			  $datos_institucion["direccion"],
    			  $datos_institucion["id"]
    	);

		$resultado = pg_query($conexion, $query);

		return $resultado;
	}
}