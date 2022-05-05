<?php

require_once "ConexionModel.php";

class MovimientoModel 
{

	public function registroMovDetalle($datos)
	{
	    $conexion = ConexionModel::conexion();
	    $cedula = $datos['cedula'];
	    $observacion = $datos['observacion'];
	    $fecha = date("Y-m-d");

	    $cedula_usuario = $_SESSION["user_id"];

	    $query= "INSERT INTO public.movimientos_detalle (id_cedula_empleado, observacion_bien, fecha_mov, tipo_movimiento, id_estatus, cedula_usuario) 
				VALUES ('$cedula', '$observacion', '$fecha', '1', '2', '$cedula_usuario') RETURNING id_movimiento";

		$resultado = pg_query($conexion, $query);

	    return $resultado;
	}

	public function registroMovBien ($bien, $id_movimiento)
	{
		$conexion = ConexionModel::conexion();

		$query = sprintf("INSERT INTO movimiento_bienes (id_movimiento, numero_bien, estatus_uso)
						  VALUES ('%s', '%s', true)",
						  $id_movimiento,
						  $bien);

		$resultado = pg_query($conexion, $query);

	    return $resultado;
	}

	public function registroMovimientoBienDesvinculacion ($bien, $id_movimiento)
	{
		$conexion = ConexionModel::conexion();

		$query = sprintf("INSERT INTO movimiento_bienes (id_movimiento, numero_bien, estatus_uso)
						  VALUES ('%s', '%s', null)",
						  $id_movimiento,
						  $bien);

		$resultado = pg_query($conexion, $query);

	    return $resultado;
	}

	public function asignacionGerenciaConsulta($bien)
	{
		$conexion = ConexionModel::conexion();

		$query = "SELECT * FROM asignacion_gerencia WHERE numero_bien = $bien AND estatus = true";

		$resultado = pg_query($conexion, $query);

		return $resultado;
	}

	public function movimientoGerenciaNuevo($bien, $gerencia, $coordinacion)
	{
		$conexion = ConexionModel::conexion();

		$query = sprintf("INSERT INTO public.asignacion_gerencia(numero_bien, id_gerencia, fecha_movimiento, cedula_usuario, id_coordinacion, estatus)
	    				 VALUES ('%s','%s','%s','%s','%s',true)",
	    				 $bien,
	    				 $gerencia,
	    				 date("Y-m-d"),
	    				 $_SESSION["user_id"],
	    				 $coordinacion);

		$resultado = pg_query($conexion,$query);

		return $resultado;
	}

	public function updateFalseAsignacionGerencia($id)
	{
		$conexion = ConexionModel::conexion();

		$query = "UPDATE public.asignacion_gerencia
				  SET estatus=false
				  WHERE id_asignacion_gerencia = $id";

		$resultado = pg_query($conexion,$query);

		return $resultado;
	}

	public function movimientoGerenciaNuevaGerencia($bien, $gerencia, $coordinacion)
	{
		$conexion = ConexionModel::conexion();

		$query = sprintf("INSERT INTO public.asignacion_gerencia(numero_bien, id_gerencia, fecha_movimiento, cedula_usuario, id_coordinacion, estatus)
	    				 VALUES ('%s','%s','%s','%s','%s',true)",
	    				 $bien,
	    				 $gerencia,
	    				 date("Y-m-d"),
	    				 $_SESSION["user_id"],
	    				 $coordinacion);

		$resultado = pg_query($conexion,$query);

		return $resultado;
	}

	public function movimientoGerenciaNuevaCoordinacion($id, $coordinacion)
	{
		$conexion = ConexionModel::conexion();

		$query = "UPDATE public.asignacion_gerencia
				  SET id_coordinacion = $coordinacion
				  WHERE id_asignacion_gerencia = $id";

		$resultado = pg_query($conexion,$query);

		return $resultado;
	}

}