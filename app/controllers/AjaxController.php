<?php
require_once "../../app/models/EmpleadosModel.php";
require_once "../../app/models/InventarioModel.php";
require_once "../../app/models/TipoBienModel.php";
require_once "../../app/models/UsuariosModel.php";
require_once "../../app/models/BienesModel.php";
require_once "../../app/models/InstitucionModel.php";
require_once "../../app/models/UbicacionAlmacenModel.php";
require_once "../../app/models/TipoIncorporacionModel.php";
require_once "../../app/models/GerenciaModel.php";
require_once "../../app/models/CoordinacionesModel.php";
require_once "../../app/models/CargoModel.php";
require_once "../../app/models/EstadoFisicoBienModel.php";
require_once "../../app/models/EstadoModel.php";
require_once "../../app/models/MunicipioModel.php";

class AjaxController
{
	/**
	 *
	 */
	public function consultas ()
	{
		if (isset($_GET["cedula"])) {
			$cedula = pg_escape_string($_GET["cedula"]);
			$valor = EmpleadosModel::consultaId($cedula);
			if (pg_num_rows($valor) > 0) {
				return pg_fetch_assoc($valor);
			}
		}

		if (isset($_GET["numero_bien"])) {
			$numero_bien = pg_escape_string($_GET["numero_bien"]);
			$valor = InventarioModel::consultaId($numero_bien);
			if (pg_num_rows($valor) > 0) {
			return pg_fetch_assoc($valor);
			}
		}

		if (isset($_GET["tipo_bien"])) {
			$tipo_bien = pg_escape_string($_GET["tipo_bien"]);
			$valor = TipoBienModel::consultaId($tipo_bien);
			if (pg_num_rows($valor) > 0) {
				return pg_fetch_assoc($valor);
			}
		}

		if (isset($_GET["suspender"])) {

			$id = pg_escape_string($_GET["suspender"]);

			$resultado = UsuariosModel::suspender($id);

			if (pg_result_status($resultado)) {
				return "Usuario suspendido Exitosamente";
			}else{
				return "Ha ocurrido un error. Comunicarse con el Administrador.";
			}
		}

		if (isset($_GET["activar"])) {

			$id = pg_escape_string($_GET["activar"]);

			$resultado = UsuariosModel::activar($id);

			if (pg_result_status($resultado)) {
				return "Usuario activado Exitosamente";
			}else{
				return "Ha ocurrido un error. Comunicarse con el Administrador.";
			}
		}

		if (isset($_GET["descripcion_bienes"])) {
			
			$id = pg_escape_string($_GET["descripcion_bienes"]);

			$resultado = BienesModel::consultaDescripcionBienId($id);

			if (pg_result_status($resultado)) {
				return pg_fetch_assoc($resultado);
			}

		}

		if (isset($_GET["institucion"])) {
			
			$id = pg_escape_string($_GET["institucion"]);

			$resultado = InstitucionModel::consultaInstitucionID($id);

			if (pg_result_status($resultado)) {
				return pg_fetch_assoc($resultado);
			}

		}
	
		if (isset($_GET["almacen"])) {
			
			$id = pg_escape_string($_GET["almacen"]);

			$resultado = UbicacionAlmacenModel::consultaId($id);

			if (pg_result_status($resultado)) {
				return pg_fetch_assoc($resultado);
			}

		}

		if (isset($_GET["tipo_incorporacion"])) {
			
			$id = pg_escape_string($_GET["tipo_incorporacion"]);

			$resultado = TipoIncorporacionModel::consultaId($id);

			if (pg_result_status($resultado)) {
				return pg_fetch_assoc($resultado);
			}

		}
	
		if (isset($_GET["gerencia"])) {
			
			$id = pg_escape_string($_GET["gerencia"]);

			$resultado = CoordinacionesModel::consultaGerencia($id);

			if (pg_result_status($resultado)) {
				return pg_fetch_all($resultado);
			}

		}

		if (isset($_GET["coordinacion"])){

			 $id = $_GET["coordinacion"];

			 $resultado = CoordinacionesModel::consultaID($id);

			 if(pg_result_status($resultado)){
			 	return pg_fetch_assoc($resultado);
			 }
		}

		if (isset($_GET["gerenciaId"])){

			 $id = $_GET["gerenciaId"];

			 $resultado = GerenciaModel::consultaID($id);

			 if(pg_result_status($resultado)){
			 	return pg_fetch_assoc($resultado);
			 }
		}

		if (isset($_GET["cargo"])) {
			
			$id = pg_escape_string($_GET["cargo"]);

			$resultado = CargoModel::consultaCargoID($id);

			if (pg_result_status($resultado)) {
				return pg_fetch_assoc($resultado);
			}

		}

		if (isset($_GET["estadoFisico"])) {
			
			$id = pg_escape_string($_GET["estadoFisico"]);

			$resultado = EstadoFisicoBienModel::consultaID($id);

			if (pg_result_status($resultado)) {
				return pg_fetch_assoc($resultado);
			}

		}

		if (isset($_GET["estado"])) {
			
			$id = pg_escape_string($_GET["estado"]);

			$resultado = EstadoModel::consultaEstadoID($id);

			if (pg_result_status($resultado)) {
				return pg_fetch_assoc($resultado);
			}

		}

			if (isset($_GET["municipio"])){

			 $id = $_GET["municipio"];

			 $resultado = MunicipioModel::consultaID($id);

			 if(pg_result_status($resultado)){
			 	return pg_fetch_assoc($resultado);
			 }
		}

			if (isset($_GET["tipoBien"])){

			 $id = $_GET["tipoBien"];

			 $resultado = TipoBienModel::consultaId($id);

			 if(pg_result_status($resultado)){
			 	return pg_fetch_assoc($resultado);
			 }			
		}

		if (isset($_GET["estadoEmpleado"])) {
			
			$id = pg_escape_string($_GET["estadoEmpleado"]);

			$resultado = MunicipioModel::consultaEstadoID($id);

			if (pg_result_status($resultado)) {
				return pg_fetch_all($resultado);
			}

		}

	}
}

header('Content-Type: application/json'); 
$respuesta = AjaxController::consultas();
//return json_encode($var);
echo json_encode($respuesta);