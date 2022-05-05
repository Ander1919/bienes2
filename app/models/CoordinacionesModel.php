<?php

require_once "ConexionModel.php";

class CoordinacionesModel{

	public function select() {

		$conexion = ConexionModel::conexion();

		$query = "SELECT * FROM coordinaciones";

		$resultado = pg_query($conexion, $query);

		return $resultado;
	}

	public function consultaCoordinacion(){

		$conexion = ConexionModel::conexion();

		$query = "SELECT descripcion_gerencia, id_coordinacion, descripcion_coordinacion
			FROM coordinaciones
			INNER JOIN gerencias ON gerencias.id_gerencia = coordinaciones.id_gerencia";

		$resultado = pg_query($conexion, $query);

		return $resultado;

	}

	public function consultaGerencia($id)
	{
		$conexion = ConexionModel::conexion();

		$query = "SELECT * FROM coordinaciones WHERE id_gerencia = $id";

		$resultado = pg_query($conexion, $query);

		return $resultado;
	} 


	public function insertarCoordinacion($datos_coordinacion)
	{
		$conexion = ConexionModel::conexion();
		
		$query = sprintf ("INSERT INTO public.coordinaciones(id_gerencia, descripcion_coordinacion, fecha_registro, cedula_usuario)
    				VALUES ('%s','%s','%s','%s')",			

    					$datos_coordinacion['gerencia'],
			    		$datos_coordinacion['nombre_coordinacion'],			    		
			    		$datos_coordinacion["date"],
			    		$_SESSION["user_id"]);
	

	    $resultado = pg_query($conexion, $query);

	    return $resultado;
	} 

	public function consultaID($id)
	{
		$conexion = ConexionModel::conexion();

		$query = "SELECT * FROM coordinaciones WHERE id_coordinacion = $id";

		$resultado = pg_query($conexion, $query);

		return $resultado;
	} 

	public function actualizarCoordinacion($datos_coordinacion)
	{
		$conexion = ConexionModel::conexion();
		
		$query = sprintf ("UPDATE public.coordinaciones SET descripcion_coordinacion='%s', id_gerencia='%s' 
       					WHERE id_coordinacion = '%s' ",			

			    		$datos_coordinacion['nombre_coordinacion'],	
    					$datos_coordinacion['gerencia'],		    		
			    		$datos_coordinacion["id"]
			    );
			    		
	    $resultado = pg_query($conexion, $query);

	    return $resultado;
	} 

}