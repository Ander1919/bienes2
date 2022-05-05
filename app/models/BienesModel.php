<?php

require_once "ConexionModel.php";

class BienesModel{

	/*
	 *
	 */
	public function select ()
	{
		$conexion = ConexionModel::conexion();

		$query = "SELECT id_bienes, descripcion_bien FROM bienes;";

		$resultado = pg_query($conexion, $query);

		return $resultado;
	}

	public function ConsultarBien($bien)
	{
	    $conexion = ConexionModel::conexion();
		$bien = pg_escape_string($bien['numero_bien']);

		$sql = "SELECT inventario.numero_bien, inventario.id_estatus, tipo_bien.descripcion_tipobien,bienes.descripcion_bien,
				inventario.grupo,inventario.sub_grupo,inventario.seccion,institucion.nombre_institucion,
				inventario.caracteristicas,inventario.serial_bien,inventario.valor,ubicacion_almacen.nombre_almacen
					FROM inventario
					 JOIN bienes ON bienes.id_bienes = inventario.id_bien
					 JOIN tipo_bien ON tipo_bien.id_tipo_bien = bienes.id_tipo_bien
					 JOIN institucion ON institucion.id_institucion = inventario.id_institucion
					 JOIN ubicacion_almacen ON ubicacion_almacen.id_ubicacion_almacen = inventario.id_ubicacion_almacen
					WHERE numero_bien = $bien";

		$query = pg_query($conexion, $sql);

		return $query; 

	}

	public function consultaDescripcionBien()
	{
		$conexion = ConexionModel::conexion();

		$query = "SELECT descripcion_tipobien, grupo, sub_grupo, seccion, id_bienes, descripcion_bien
					FROM public.bienes
				    INNER JOIN tipo_bien ON bienes.id_tipo_bien = tipo_bien.id_tipo_bien
				    order by tipo_bien.id_tipo_bien asc;";

		$resultado = pg_query($conexion, $query);

		return $resultado;
	}
	

	public function insertarDescripcionBien($datos_bien)
	{
		$conexion = ConexionModel::conexion();
		
		$query = sprintf ("INSERT INTO public.bienes(descripcion_bien, id_tipo_bien, cedula_usuario, fecha_registro)
    				VALUES ('%s','%s','%s','%s')",			

    					$datos_bien['nombre_bien'],
			    		$datos_bien['tipo_bien'],
			    		$_SESSION["user_id"],
			    		$datos_bien["date"]);
			    	
	    $resultado = pg_query($conexion, $query);

	    return $resultado;
	}

	public function consultaDescripcionBienId($id)
	{
		$conexion = ConexionModel::conexion();
		
		$query = "SELECT * FROM bienes WHERE id_bienes = $id";
			    	
	    $resultado = pg_query($conexion, $query);

	    return $resultado;
	}

	public function actualizarDescripcionBien($datos)
	{
		$conexion = ConexionModel::conexion();
		
		$query = sprintf("UPDATE public.bienes
						  SET descripcion_bien = '%s', id_tipo_bien = '%s'
						  WHERE id_bienes = '%s'",
						  $datos["descripcion"],
						  $datos["id_tipo"],
						  $datos["id"]);
			    	
	    $resultado = pg_query($conexion, $query);

	    return $resultado;
	}
 	public function consultaGerencia($id)
 	{
 		$conexion = ConexionModel::conexion();
 		
 		$query = "SELECT DISTINCT a.*,b.descripcion_gerencia,c.descripcion_coordinacion,d.descripcion_bien,e.descripcion_tipobien,f.descripcion_estatus 
				  FROM asignacion_gerencia a
				  INNER JOIN gerencias b ON a.id_gerencia = b.id_gerencia
				  INNER JOIN coordinaciones c ON a.id_coordinacion = c.id_coordinacion
				  INNER JOIN inventario i ON a.numero_bien = i.numero_bien
				  INNER JOIN bienes d ON i.id_bien = d.id_bienes
				  INNER JOIN tipo_bien e ON d.id_tipo_bien = e.id_tipo_bien
				  INNER JOIN estatus f ON i.id_estatus = f.id_estatus
				  INNER JOIN movimiento_bienes mb ON a.numero_bien = mb.numero_bien
				  INNER JOIN movimientos_detalle md ON mb.id_movimiento = md.id_movimiento
				  WHERE a.id_gerencia = '$id'
				  AND a.estatus = true";

 		$resultado = pg_query($conexion, $query);

 		return $resultado;
 	}

}