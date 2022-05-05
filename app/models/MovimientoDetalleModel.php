<?php

require_once "ConexionModel.php";

class MovimientoDetalleModel
{

	public function consultarBienesEmpleados($datos)
	{
	    $conexion = ConexionModel::conexion();

	    $cedula = pg_escape_string($datos['cedula']);

	    $query = "SELECT  
	    		movimientos_detalle.id_cedula_empleado,empleados.nombre_empleado,empleados.apellido_empleado,
				tipo_bien.descripcion_tipobien,bienes.descripcion_bien,movimiento_bienes.numero_bien,inventario.serial_bien,
				inventario.grupo,inventario.sub_grupo,inventario.seccion,inventario.caracteristicas,movimientos_detalle.fecha_mov
					FROM movimientos_detalle
					JOIN movimiento_bienes ON movimiento_bienes.id_movimiento = movimientos_detalle.id_movimiento
					JOIN inventario ON inventario.numero_bien = movimiento_bienes.numero_bien
					JOIN bienes ON bienes.id_bienes = inventario.id_bien
					JOIN tipo_bien ON tipo_bien.id_tipo_bien = bienes.id_tipo_bien
					JOIN empleados ON empleados.cedula = movimientos_detalle.id_cedula_empleado
					WHERE movimientos_detalle.id_cedula_empleado = '$cedula';";

	    $resultado = pg_query($conexion, $query);

	    return $resultado;
	}

	public function consultarBienesActivosEmpleados($datos)
	{
	    $conexion = ConexionModel::conexion();

	    $query = sprintf("SELECT
			    		  movimientos_detalle.id_cedula_empleado,empleados.nombre_empleado,empleados.apellido_empleado,
			    		  tipo_bien.descripcion_tipobien,tipo_bien.grupo,tipo_bien.sub_grupo,tipo_bien.seccion,
			    		  bienes.descripcion_bien,movimiento_bienes.numero_bien,inventario.serial_bien,
			    		  inventario.caracteristicas,inventario.marca,inventario.modelo,movimientos_detalle.fecha_mov
						  FROM movimientos_detalle
						  INNER JOIN movimiento_bienes ON movimiento_bienes.id_movimiento = movimientos_detalle.id_movimiento
						  INNER JOIN inventario ON inventario.numero_bien = movimiento_bienes.numero_bien
						  INNER JOIN bienes ON bienes.id_bienes = inventario.id_bien
						  INNER JOIN tipo_bien ON tipo_bien.id_tipo_bien = bienes.id_tipo_bien
						  INNER JOIN empleados ON empleados.cedula = movimientos_detalle.id_cedula_empleado
						  WHERE id_cedula_empleado = '%s' AND movimiento_bienes.estatus_uso = true",
						  $datos["cedula"]);

	    $resultado = pg_query($conexion, $query);

	    return $resultado;
	}

	public function insertDesvinculacion($datos)
	{
		$conexion = ConexionModel::conexion();

		$query = sprintf("INSERT INTO public.movimientos_detalle (id_cedula_empleado, observacion_bien, fecha_mov, tipo_movimiento, id_estatus, cedula_usuario) 
				 VALUES ('%s', '%s', '%s', '%s', '%s', '%s') RETURNING id_movimiento",
				 $datos["cedula"],
				 $datos["observacion"],
				 date("Y/m/d"),
				 "2",
				 "1",
				 $_SESSION["user_id"]);

		$resultado = pg_query($conexion, $query);

		return $resultado;
	}	

	public function deshabilitarMovimiento($datos)
	{
		$conexion = ConexionModel::conexion();

		$query = sprintf("INSERT INTO public.movimientos_detalle(
			id_cedula_empleado, observacion_bien, cedula_usuario, fecha_mov, id_estatus, tipo_movimiento)
			VALUES ('%s', '%s', '%s', '%s', '%s', '%s') RETURNING id_movimiento",
			0,
			$datos["observacion"],
			$_SESSION["user_id"],
			date("Y-m-d"),
			1,
			3
		);

		$resultado = pg_query($conexion, $query);

		return $resultado;
	}

	public function eliminarMovimiento($id)
	{
		$conexion = ConexionModel::conexion();

		$query = "DELETE FROM public.movimientos_detalle WHERE id_movimiento = $id";

		$resultado = pg_query($conexion, $query);

		return $resultado;
	}

	public function desincorporarMovimiento($datos)
	{
		$conexion = ConexionModel::conexion();

		$query = sprintf("INSERT INTO public.movimientos_detalle(
			id_cedula_empleado, observacion_bien, cedula_usuario, fecha_mov, id_estatus, tipo_movimiento)
			VALUES ('%s', '%s', '%s', '%s', '%s', '%s') RETURNING id_movimiento",
			0,
			$datos["observacion"],
			$_SESSION["user_id"],
			date("Y-m-d"),
			1,
			4
		);

		$resultado = pg_query($conexion, $query);

		return $resultado;
	}

}