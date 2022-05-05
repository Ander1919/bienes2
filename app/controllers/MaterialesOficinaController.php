<?php

require_once "../app/models/RegistroMaterialOficinaModel.php";

/**
* 
*/
class MaterialesOficinaController 

{	
	public function registrarBien()
    {
        if (isset($_POST["submit_registrar"]))
        {
            $date = date('Y-m-d');
            $datosBien = array(

                'tipo_bien'=> $_POST['tipo_bien'],
                'bienes' => $_POST['bienes'],
                'fecha_adquisicion' => $_POST['fecha_adquisicion'],
                'marca' => $_POST['marca'],
                'caracteristicas_bien' => $_POST['caracteristicas_bien'],
                'cantidad' => $_POST['cantidad'],
                'unidad_medida' => $_POST['unidad_medida'],
                'unidad_litro' => $_POST['unidad_litro'],
                'procedencia_bien' => $_POST['procedencia_bien'],
                'num_factura' => $_POST['num_factura'],
                'orden_compra' => $_POST['orden_compra'],
				'valor_bien' => $_POST['valor_bien'],
                'ubicacion_almacen' => $_POST['ubicacion_almacen'],
                'observacion' => $_POST['observacion'],                
                'date' => $date,                           
            );

            $bien = RegistroMaterialOficinaModel::insertarBien($datosBien);

            if ($bien)
            {
               echo "<script>
                        alert('Registrado Exitoso')                        
                     </script>";                      
            }
            else
            {
               echo "<script>
                        alert('Error, comuniquese con el administrador')
                    </script>"; 
            }

        }
    }
}