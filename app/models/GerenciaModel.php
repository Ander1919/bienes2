<?php

require_once "ConexionModel.php";

class GerenciaModel{

	public function select () {

	$conexion = ConexionModel::conexion();

	$query = "SELECT * FROM gerencias";

	$resultado = pg_query($conexion, $query);

	return $resultado;

	}
	
	public function insertarGerencia($datos_gerencia)
	{
		$conexion = ConexionModel::conexion();
		
		$query = sprintf ("INSERT INTO public.gerencias(descripcion_gerencia, cedula_usuario, fecha_registro)
    				VALUES ('%s','%s','%s')",

    					$datos_gerencia['gerencia'],
			    		$_SESSION["user_id"],
			    		$datos_gerencia['date']);
    	/*$query = sprintf ("INSERT INTO public.gerencias(descripcion_gerencia, cedula_usuario, fecha_registro)
    				VALUES ('%s','%s','%s','%s')",			
			    		
			    	$datos_gerencia['gerencia'],
			    	$_SESSION["user_id"],
			    	$datos_gerencia['date']);
    				$piso['piso']*/

	    	
	    $resultado = pg_query($conexion, $query);

	    return $resultado;
	}

	public function consultaID($id)
	{
		$conexion = ConexionModel::conexion();

		$query = "SELECT * FROM gerencias WHERE id_gerencia = $id";

		$resultado = pg_query($conexion, $query);

		return $resultado;
	} 

	public function actualizarGerencia($datosGerencia){

		$conexion = ConexionModel::conexion();

		$query = sprintf("UPDATE public.gerencias SET descripcion_gerencia='%s' 
 					WHERE id_gerencia = '%s' ",

 					$datosGerencia['nombre_gerencia'],
 					$datosGerencia['id_gerencia']);

		$resultado = pg_query($conexion, $query);

		return $resultado;
	}

}


