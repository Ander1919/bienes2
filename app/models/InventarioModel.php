<?php

require_once "ConexionModel.php";

class InventarioModel{

	public function insertarBien($datosBien)
	{
	    $conexion = ConexionModel::conexion();

	    $query = sprintf("INSERT INTO public.inventario(
			            id_bien, fecha_registro, 
			            id_institucion, numero_bien, caracteristicas, serial_bien, id_tipo_incorporacion, 
			            fecha_adquisicion, procedencia, valor, id_ubicacion_almacen, 
			            observacion, id_estatus,cedula_usuario, id_gerencia_responsable, nro_referencia, orden_compra, marca, modelo, id_estado_fisico_bien)
			    		VALUES ('%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s')",
			    		$datosBien['bienes'],
			    		//$datosBien['grupo'],
			    		//$datosBien['sub_grupo'],
			    		//$datosBien['seccion'],
			    		$datosBien['date'],
			    		$datosBien['institucion'],
			    		$datosBien['numero_bien'],
			    		$datosBien['caracteristicas_bien'],
			    		$datosBien['serial_bien'],
			    		$datosBien['tipo_incorporacion'],
			    		$datosBien['fecha_adquisicion'],
			    		$datosBien['procedencia_bien'],
			    		$datosBien['valor_bien'],
			    		$datosBien['ubicacion_almacen'],
			    		$datosBien['observacion'],
			    		$datosBien['estatus'],
			    		 $_SESSION["user_id"],
	    				$datosBien['gerencia_responsable'],
	    				$datosBien['num_factura'],
	    				$datosBien['orden_compra'],
	    				$datosBien['marca'],
	    				$datosBien['modelo'],
	    				$datosBien['estado_fisico_bien']
	    				);

	    $resultado = pg_query($conexion, $query);

	    return $resultado;
	}

	public function consultarBien($datos)
	{
		$conexion = ConexionModel::conexion();

		$numero_bien = pg_escape_string($datos['numero_bien']);
		$query = "SELECT * FROM inventario WHERE numero_bien = '$numero_bien';";

		$resultado = pg_query($conexion, $query);

		return $resultado;
	}

	public function consultaId($id)
	{
	    $conexion = ConexionModel::conexion();    				
		
		$query = "SELECT inventario.numero_bien,inventario.id_estatus,tipo_bien.descripcion_tipobien,bienes.descripcion_bien,
				  tipo_bien.grupo,tipo_bien.sub_grupo,tipo_bien.seccion,institucion.nombre_institucion,
				  inventario.caracteristicas,inventario.serial_bien,inventario.valor,ubicacion_almacen.nombre_almacen
				  FROM inventario
				  INNER JOIN bienes ON bienes.id_bienes = inventario.id_bien
				  INNER JOIN tipo_bien ON tipo_bien.id_tipo_bien = bienes.id_tipo_bien
				  INNER JOIN institucion ON institucion.id_institucion = inventario.id_institucion
				  INNER JOIN ubicacion_almacen ON ubicacion_almacen.id_ubicacion_almacen = inventario.id_ubicacion_almacen
				  WHERE inventario.numero_bien = $id AND inventario.id_estatus = 1";

	    $resultado = pg_query($conexion, $query);

	    return $resultado;
	}

	public function consultarTipoBien($datos)
	{
		$conexion = ConexionModel::conexion();

		$tipo_bien = pg_escape_string($datos['tipo_bien']);

		$query = "SELECT inventario.numero_bien,
						bienes.descripcion_bien,
						inventario.serial_bien,
						inventario.grupo,
						inventario.sub_grupo,
						inventario.seccion,
						inventario.caracteristicas,
						estatus.descripcion_estatus
					FROM inventario
					JOIN bienes ON bienes.id_bienes = inventario.id_bien
					JOIN tipo_bien ON tipo_bien.id_tipo_bien = bienes.id_tipo_bien
					JOIN estatus ON estatus.id_estatus = inventario.id_estatus
					WHERE bienes.id_tipo_bien = '$tipo_bien';";

			$resultado = pg_query($conexion, $query);

			return $resultado;
	}
	
	public function actualizarEstatus($bien)
	{
	    $conexion = ConexionModel::conexion();    				
		
		$query = "UPDATE public.inventario SET id_estatus = '2' WHERE numero_bien = '$bien'";

	    $resultado = pg_query($conexion, $query);

	    return $resultado;
	}

	public function consultaInventario()
	{
	    $conexion = ConexionModel::conexion();    				
		
		$query = "SELECT inventario.numero_bien,
						inventario.id_estatus,
						estatus.descripcion_estatus,
						tipo_bien.descripcion_tipobien,
						bienes.descripcion_bien,
						inventario.marca,
						inventario.modelo,
						tipo_bien.grupo,
						tipo_bien.sub_grupo,
						tipo_bien.seccion,
						institucion.nombre_institucion,
						inventario.caracteristicas,
						inventario.serial_bien,
						inventario.valor,
						estado_fisico_bien.descripcion_estado_fisico,
						ubicacion_almacen.nombre_almacen
						FROM inventario
						INNER JOIN bienes ON bienes.id_bienes = inventario.id_bien
						INNER JOIN estatus ON estatus.id_estatus = inventario.id_estatus
						INNER JOIN tipo_bien ON tipo_bien.id_tipo_bien = bienes.id_tipo_bien
						INNER JOIN institucion ON institucion.id_institucion = inventario.id_institucion
						INNER JOIN estado_fisico_bien on inventario.id_estado_fisico_bien = estado_fisico_bien.id_estado_fisico_bien
						INNER JOIN ubicacion_almacen ON ubicacion_almacen.id_ubicacion_almacen = inventario.id_ubicacion_almacen";

	    $resultado = pg_query($conexion, $query);

	    return $resultado;
	}

	public function actualizarEstatusDesvinculacion($bien)
	{
		$conexion = ConexionModel::conexion();

		$query = "UPDATE public.inventario
				  SET id_estatus = 1
				  WHERE numero_bien = $bien";

	    $resultado = pg_query($conexion, $query);

	    return $resultado;
	}

	public function bienesDisponibles()
	{
		$conexion = ConexionModel::conexion();

		$query = "SELECT a.id_incorporacion,a.id_bien,a.numero_bien,a.serial_bien,a.caracteristicas,a.marca,a.modelo,b.descripcion_estatus,c.descripcion_bien,d.descripcion_tipobien 
		FROM inventario a 
		INNER JOIN estatus b ON a.id_estatus = b.id_estatus 
		INNER JOIN bienes c ON c.id_bienes = a.id_bien
		INNER JOIN tipo_bien d ON d.id_tipo_bien = c.id_tipo_bien		
		WHERE a.id_estatus = 1";

	    $resultado = pg_query($conexion, $query);

	    return $resultado;
	}

	public function updateDeshabilitar($bien)
	{
		$conexion = ConexionModel::conexion();

		$query = "UPDATE public.inventario
				  SET id_estatus = 3
				  WHERE numero_bien = $bien";

	    $resultado = pg_query($conexion, $query);

	    return $resultado;
	}

	public function updateDesincorporar($bien)
	{
		$conexion = ConexionModel::conexion();

		$query = "UPDATE public.inventario
				  SET id_estatus = 4
				  WHERE numero_bien = $bien";

	    $resultado = pg_query($conexion, $query);

	    return $resultado;
	}

	public function bienesDisponiblesDeshabilitados()
	{
		$conexion = ConexionModel::conexion();

		$query = "SELECT a.id_incorporacion,a.id_bien,a.numero_bien,a.serial_bien,a.caracteristicas,a.marca,a.modelo,b.descripcion_estatus,c.descripcion_bien,d.descripcion_tipobien 
		FROM inventario a 
		INNER JOIN estatus b ON a.id_estatus = b.id_estatus 
		INNER JOIN bienes c ON c.id_bienes = a.id_bien
		INNER JOIN tipo_bien d ON d.id_tipo_bien = c.id_tipo_bien		
		WHERE a.id_estatus = 1 OR a.id_estatus = 3";

	    $resultado = pg_query($conexion, $query);

	    return $resultado;
	}
}