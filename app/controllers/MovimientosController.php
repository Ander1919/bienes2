<?php 
require_once "../app/models/EmpleadosModel.php";
require_once "../app/models/MovimientoDetalleModel.php";
require_once "../app/models/MovimientoBienModel.php";
require_once "../app/models/MovimientoModel.php";
require_once "../app/models/InventarioModel.php";

class MovimientosController{
		
	public function consultaEmpleado()
	{
		if(isset($_POST["submit_consulta"]))
		{
			//Pasamos los datos al array
			$datos = array(
			'cedula' => $_POST['cedula'],
			);
	      	//Llamamos a la Clase y al Metodo
	       	$respuesta = EmpleadosModel::consultaCedula($datos);	 
			if(pg_num_rows($respuesta) > 0)
			{
				$data = MovimientoDetalleModel::consultarBienesEmpleados($datos);

				if (pg_num_rows($data) > 0)
				{
				 	return $data;
				}
				else
				{
					echo "<script>
							alert('El usuario no tiene bienes asignados');														 
						 </script>";
				}
			}
			else
			{
				echo "<script>
							alert('Usuario no existe');													 
					 </script>";
			}
		}	
		
	}

	public function consultaHistoricoBien()
	{
		if (isset($_POST["submit_consulta_bien"]))
		{
			$datos = array(
			'numero_bien' => $_POST['numero_bien'],
			);

			$respuesta = InventarioModel::consultarBien($datos);

			if (pg_num_rows($respuesta)>0)
			{
				$data = MovimientoBienModel::consultaBienHistorico($datos);

				if (pg_num_rows($data)>0)
				{
					return $data;
				}
				else
				{
					echo "<script>alert('El bien nunca se ha asignado');</script>";
				}
				//echo "<script>alert('Bien Consultado correctamente')</script>";
			}
			else
			{
				echo "<script>alert('El Num. de bien no se encuentra registrado');</script>";
			}
		}

	}

	public function consultaBien()
	{
		if (isset($_POST["submit_consulta_bien"]))
		{
			$datos = array(
			'numero_bien' => $_POST['numero_bien'],
			);

			$respuesta = InventarioModel::consultarBien($datos);

			if (pg_num_rows($respuesta)>0)
			{
				$data = MovimientoBienModel::consultaBien($datos);

				if (pg_num_rows($data)>0)
				{
					return $data;
				}
				else
				{
					echo "<script>alert('El bien no se ha asignado a ningun Usuario');</script>";
				}
				//echo "<script>alert('Bien Consultado correctamente')</script>";
			}
			else
			{
				echo "<script>alert('bien no se encuentra registrado');</script>";
			}
		}

	}

	public function desvinculacionBienesEmpleado()
	{

		if(isset($_POST["submit_consulta"])){
			//Pasamos los datos al array
			$datos = array(
			'cedula' => pg_escape_string($_POST['cedula']),
			);
	      	//Llamamos a la Clase y al Metodo
	       	$respuesta = EmpleadosModel::consultaCedula($datos);

	       	//var_dump($respuesta);	 

			if(pg_num_rows($respuesta) > 0){

				$data = MovimientoDetalleModel::consultarBienesActivosEmpleados($datos);
				//var_dump($data);

				if (pg_num_rows($data) > 0){

				 	return $data;

				}else{
					echo "<script>
							alert('El empleado no posee bienes asignados!');
							window.location.href = 'index.php?action=bienes/desvinculacion';							 
						 </script>";
				}
			}else{
				echo "<script>
							alert('El empleado no se encuentra registrado!');
							window.location.href = 'index.php?action=bienes/desvinculacion';							 
					 </script>";
			}
		}elseif (isset($_POST["submit_desvinculacion"])) {

			$datos = array(
				'numero_bien' => $_POST["desvincular"],
				'cedula' 	  => $_POST["cedula_empleado"],
				'observacion' => $_POST["observacion"],
			);

			$resultado = MovimientoDetalleModel::insertDesvinculacion($datos);

			$movimiento = pg_fetch_assoc($resultado);

			//var_dump($movimiento);

			if ($resultado) {
				//Actualizar el Estatus de los Bienes en Uso
				foreach ($datos["numero_bien"] as $bien) {
					$resultado = MovimientoBienModel::actualizacionEstatusUso($bien, $datos["cedula"]);

					if (!$resultado) {
						echo '<script type="text/javascript">alert("Ocurrio un error al guardar. Comunicarse con el Administrador!");</script>';
						break;
					};

					$resultado = InventarioModel::actualizarEstatusDesvinculacion($bien);

					if (!$resultado) {
						echo '<script type="text/javascript">alert("Ocurrio un error al guardar. Comunicarse con el Administrador!");</script>';
						break;
					};
				}

				echo '<script type="text/javascript">alert("Se han desvinculado los Bienes exitosamente!");
							window.location.href = "index.php?action=bienes/desvinculacion";</script>';
			}else{
				echo '<script type="text/javascript">alert("Ocurrio un error al guardar. Comunicarse con el Administrador!");
							window.location.href = "index.php?action=bienes/desvinculacion";</script>';
			}

		}	
		
	}

	public function bienesConsultaDeshabilitar()
	{
		if (isset($_POST["submit"])) {
			$datos = array(
				'deshabilitar' => $_POST["deshabilitar"],
				'observacion'  => pg_escape_string($_POST["observacion"]),
			);
			
			$registro = MovimientoDetalleModel::deshabilitarMovimiento($datos);
			
			if (pg_result_status($registro)) {

				$movimiento = pg_fetch_assoc($registro);

				foreach ($datos["deshabilitar"] as $bien) {

					$resultado = InventarioModel::updateDeshabilitar($bien);

					if (pg_result_status($resultado)) {
						echo '<script type="text/javascript">alert("Se deshabilito el Bien: '.$bien.' exitosamente!");</script>';
					}else{
						MovimientoDetalleModel::eliminarMovimiento($movimiento["id_movimiento"]);
						echo '<script type="text/javascript">alert("Ocurrio un error al guardar. Comunicarse con el Administrador!");window.location.href = "index.php?action=bienes/deshabilitar";</script>';
					}
				}

				echo '<script type="text/javascript">window.location.href = "index.php?action=bienes/deshabilitar";</script>';
			}else{
				echo '<script type="text/javascript">alert("Ocurrio un error al guardar. Comunicarse con el Administrador!");window.location.href = "index.php?action=bienes/deshabilitar";</script>';
			}

		}else{	
			$resultado = InventarioModel::bienesDisponibles();

			if (pg_result_status($resultado)) {
				return $resultado;
			}
		}
	}

	public function bienesConsultaDesincorporar()
	{
		if (isset($_POST["submit"])) {
			$datos = array(
				'desincorporar' => $_POST["desincorporar"],
				'observacion'  => pg_escape_string($_POST["observacion"]),
			);
			
			$registro = MovimientoDetalleModel::desincorporarMovimiento($datos);

			if (pg_result_status($registro)) {

				$movimiento = pg_fetch_assoc($registro);

				foreach ($datos["desincorporar"] as $bien) {

					$resultado = InventarioModel::updateDesincorporar($bien);

					if (pg_result_status($resultado)) {
						echo '<script type="text/javascript">alert("Se desincorporo el Bien: '.$bien.' exitosamente!");</script>';
					}else{
						MovimientoDetalleModel::eliminarMovimiento($movimiento["id_movimiento"]);
						echo '<script type="text/javascript">alert("Ocurrio un error al guardar. Comunicarse con el Administrador!");window.location.href = "index.php?action=bienes/deshabilitar";</script>';
					}
				}

				echo '<script type="text/javascript">window.location.href = "index.php?action=bienes/deshabilitar";</script>';
			}else{
				echo '<script type="text/javascript">alert("Ocurrio un error al guardar. Comunicarse con el Administrador!");window.location.href = "index.php?action=bienes/deshabilitar";</script>';
			}

		}else{	
			$resultado = InventarioModel::bienesDisponiblesDeshabilitados();

			if (pg_result_status($resultado)) {
				return $resultado;
			}
		}
	}

	public function consultaBienesActivoEmpleado()
	{
		if(isset($_POST["submit_consulta_empleado"]))
		{
			//Pasamos los datos al array
			$datos = array(
			'cedula' => $_POST['cedula'],
			);
	      	//Llamamos a la Clase y al Metodo
	       	$respuesta = EmpleadosModel::consultaCedula($datos);	 
			if(pg_num_rows($respuesta) > 0)
			{
				$data = MovimientoDetalleModel::consultarBienesActivosEmpleados($datos);

				if (pg_num_rows($data) > 0)
				{
				 	return $data;
				}
				else
				{
					echo "<script>
							alert('El usuario no tiene bienes asignados');							 
						 </script>";
				}
			}
			else
			{
				echo "<script>
							alert('Empleado no se encuentra registrado');							 
					 </script>";
			}
		}	
		
	}
}