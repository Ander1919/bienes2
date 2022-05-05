<?php

require_once "../app/models/MovimientoModel.php";
require_once "../app/models/InventarioModel.php";
require_once "../app/models/EmpleadosModel.php";

class MovimientoController
{
	public function asignarBienes ()
	{
		if (isset($_POST["submit_asignacion"])) {
		
			$datos = array(
				'cedula' 	  => pg_escape_string($_POST["cedula_empleado_hidden"]),
				'bienes' 	  => $_POST["numero_bien"], 
				'observacion' => pg_escape_string($_POST["observacion"]),
			);

			if ($datos['cedula']==null)  {
				echo '<script type="text/javascript">alert("Debe ingresar la cedula del empleado");</script>';
			}elseif ($datos['bienes']==null)  {
				echo '<script type="text/javascript">alert("Debe seleccionar el bien a asignar");</script>';
			}else{

				$movimiento = MovimientoModel::registroMovDetalle($datos);

				$fila_movimiento = pg_fetch_assoc($movimiento);
				//var_dump(pg_num_rows($id_movimiento));

				if (pg_num_rows($movimiento) == 0) {
					echo '<script>alert("Ocurrio un error al guardar. Comunicarse con el Administrador!");</script>';
				}else{

					foreach ($datos["bienes"] as $bien) {
						//echo "El numero del bien: ".$bien." el numero del movimiento :".$fila_movimiento["id_movimiento"]."<br>";
						
						$resultado = MovimientoModel::registroMovBien($bien, $fila_movimiento["id_movimiento"]);
						
						//var_dump(pg_affected_rows($resultado));
						
						if (pg_affected_rows($resultado) == 0) {

							echo '<script type="text/javascript">alert("Ocurrio un Error al Asignar el Bien"!");window.location.href = "index.php";</script>';
							//echo "ocurrio un error al guardar en movimiento bienes";
							break;

						}else{
							$actualizacion = InventarioModel::actualizarEstatus($bien);

							if (pg_affected_rows($actualizacion) == 0) {
								//echo "error al actualizar";
								echo '<script type="text/javascript">alert("No pudo Actualizar el estatus del bien");window.location.href = "index.php";</script>';
								break;
							}else{

								$empleado = pg_fetch_assoc(EmpleadosModel::consultaId($datos["cedula"]));

								$asignacion_gerencia = pg_fetch_assoc(MovimientoModel::asignacionGerenciaConsulta($bien));
								
								if ($asignacion_gerencia == null) {

									$resultado = MovimientoModel::movimientoGerenciaNuevo($bien, $empleado["id_gerencia"], $empleado["id_coordinacion"]);

								}elseif ($asignacion_gerencia != null && $empleado["id_gerencia"] <> $asignacion_gerencia["id_gerencia"]) {

									MovimientoModel::updateFalseAsignacionGerencia($asignacion_gerencia["id_asignacion_gerencia"]);
									$resultado = MovimientoModel::movimientoGerenciaNuevaGerencia($bien, $empleado["id_gerencia"], $empleado["id_coordinacion"]);

								}elseif ($asignacion_gerencia != null && $empleado["id_coordinacion"] <> $asignacion_gerencia["id_coordinacion"]) {
									
									echo '<script type="text/javascript">alert("Actualizo la coordinacion");</script>';
									$resultado = MovimientoModel::movimientoGerenciaNuevaCoordinacion($asignacion_gerencia["id_asignacion_gerencia"], $empleado["id_coordinacion"]);
								}

								if (pg_result_status($resultado)) {
									echo '<script type="text/javascript">alert("Se asigno exitosamente el bien Nro. '.$bien.'!");</script>';
								}else{
									echo '<script type="text/javascript">alert("No pudo Acturalizar el estatus del bien");</script>';
									break;
								}							
							}
						}
					}

					//echo "<script>window.location.href = 'index.php';</script>";
				}
			}
		}
	}
}

