<?php

require_once "ConexionModel.php";

class EmpleadosModel
{

	public function consultaCedula($datos)
	{
	    $conexion = ConexionModel::conexion();

	    $cedula = pg_escape_string($datos['cedula']);

	    $query = "SELECT a.*,b.descripcion_gerencia,c.descripcion_cargo,d.nombre_institucion FROM empleados a 
	    		  INNER JOIN gerencias b ON b.id_gerencia = a.id_gerencia
	    		  INNER JOIN cargos c ON c.id_cargo = a.id_cargo
	    		  INNER JOIN institucion d ON d.id_institucion = a.id_institucion 
	    		  WHERE cedula = $cedula";

	    $resultado = pg_query($conexion, $query);

	    return $resultado;
	}

	public function consultaId($cedula)
	{
	    $conexion = ConexionModel::conexion();

	    $query = "SELECT a.*,b.descripcion_gerencia,c.descripcion_cargo,d.nombre_institucion,h.descripcion_coordinacion,
								i.descripcion_estado,j.descripcion_municipio
							FROM empleados a 
							INNER JOIN gerencias b ON b.id_gerencia = a.id_gerencia
							INNER JOIN coordinaciones h ON h.id_coordinacion = a.id_coordinacion
							INNER JOIN cargos c ON c.id_cargo = a.id_cargo
							INNER JOIN institucion d ON d.id_institucion = a.id_institucion 
							INNER JOIN estados i ON i.id_estado = a.id_estado
							INNER JOIN municipios j ON j.id_municipio = a.id_municipio
							WHERE cedula = $cedula";

	    $resultado = pg_query($conexion, $query);

	    return $resultado;
	}

	public function consulta()
	{
		$conexion = ConexionModel::conexion();

		$query = "SELECT a.*,b.descripcion_cargo,c.descripcion_gerencia,d.nombre_institucion,f.descripcion_estado,g.descripcion_municipio, e.* FROM empleados a
				  INNER JOIN cargos b ON a.id_cargo = b.id_cargo
				  INNER JOIN gerencias c ON a.id_gerencia = c.id_gerencia
				  INNER JOIN institucion d ON a.id_institucion = d.id_institucion
				  INNER JOIN coordinaciones e ON a.id_coordinacion = e.id_coordinacion
				  INNER JOIN estados f ON f.id_estado = a.id_estado
				  INNER JOIN municipios g ON g.id_municipio = a.id_municipio";

		$resultado = pg_query($conexion, $query);

		return $resultado;
	}

	public function insert($datos)
	{
		$conexion = ConexionModel::conexion();

		$query = sprintf("INSERT INTO public.empleados
						  (cedula, nombre_empleado, apellido_empleado, correo_empleado, id_cargo, id_gerencia, id_institucion, id_coordinacion, id_estado, id_municipio)
						  VALUES('%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s')",
						  $datos["cedula"],
						  $datos["nombre"],
						  $datos["apellido"],
						  $datos["email"],
						  $datos["cargo"],
						  $datos["gerencia"],
						  $datos["institucion"],
						  $datos["coordinacion"],
						  $datos["estado_empleado"],
						  $datos["municipio_empleado"]
				);

		$resultado = pg_query($conexion, $query);

		return $resultado;
	}	

	public function update($datos)
	{
		$conexion = ConexionModel::conexion();

		$query = sprintf("UPDATE public.empleados
						  SET nombre_empleado='%s', apellido_empleado='%s', correo_empleado='%s', id_cargo='%s', id_gerencia='%s',
						  id_institucion='%s', id_coordinacion='%s', id_estado='%s', id_municipio='%s'
						  WHERE cedula='%s'",
						  $datos["nombre"],
						  $datos["apellido"],
						  $datos["email"],
						  $datos["cargo"],
						  $datos["gerencia"],
						  $datos["institucion"],
						  $datos["coordinacion"],
						  $datos["estado_empleado"],
						  $datos["municipio_empleado"],
						  $datos["cedula"]
				);

		$resultado = pg_query($conexion, $query);

		return $resultado;
	}
}
