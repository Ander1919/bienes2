<?php

require_once "ConexionModel.php";

class RegistroMaterialOficinaModel{

	public function insertarBien($datosBien)
	{
	    $conexion = ConexionModel::conexion();

	    $query = sprintf("INSERT INTO public.registro_material_oficina(id_bienes, fecha_adquisicion,
	    				marca, descripcion_bien, cantidad, id_unidad_medida, unidad_litro, procedencia_bien,
	    				num_factura_memo, num_orden_compra, valor, id_ubicacion_almacen, observacion, fecha_registro, 
            			cedula_usuario)
			    		VALUES ('%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s')",
			    		$datosBien['bienes'],
			    		$datosBien['fecha_adquisicion'],
			    		$datosBien['marca'],
			    		$datosBien['caracteristicas_bien'],
			    		$datosBien['cantidad'],
			    		$datosBien['unidad_medida'],
			    		$datosBien['unidad_litro'],			    		
			    		$datosBien['procedencia_bien'],
			    		$datosBien['num_factura'],
			    		$datosBien['orden_compra'],
			    		$datosBien['valor_bien'],
			    		$datosBien['ubicacion_almacen'],
 			    		$datosBien['observacion'],
 			    		$datosBien['date'],
	    				$_SESSION["user_id"]
	    				);

	    $resultado = pg_query($conexion, $query);

	    return $resultado;
	}

}
      