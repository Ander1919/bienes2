<?php

require_once "../app/models/BienesModel.php";
require_once "../app/models/EmpleadosModel.php";
require_once "../app/models/InventarioModel.php";

class BienesController
{

    public function consultaCedula()
    {
        if (isset($_POST["submit_consulta"]))
        {

            //Pasamos los datos al array
            $datos = array(
                'cedula' => $_POST['cedula'],
            );

            //Llamamos a la Clase y al Metodo
            $respuesta = EmpleadosModel::consultaCedula($datos);

            if (pg_num_rows($respuesta) > 0)
            {
                return pg_fetch_assoc($respuesta); 
            }else
            {
                return null;
            }
        }
    }


    public function registrarBien()
    {
        if (isset($_POST["submit_consulta"]))
        {
            $date = date('Y-m-d');
            $datosBien = array(

                'tipo_bien'=> $_POST['tipo_bien'],
                'bienes' => $_POST['bienes'],
                'institucion' => $_POST['institucion'],
                //'grupo' => $_POST['grupo'],
                //'sub_grupo' => $_POST['sub_grupo'],
                //'seccion' => $_POST['seccion'],
                'marca' => $_POST['marca'],
                'modelo' => $_POST['modelo'],
                'numero_bien' => $_POST['numero_bien'],
                'caracteristicas_bien' => $_POST['caracteristicas_bien'],
                'serial_bien' => $_POST['serial_bien'],
                'estado_fisico_bien' => $_POST['estado_fisico_bien'],
                'tipo_incorporacion' => $_POST['tipo_incorporacion'],
                'fecha_adquisicion' => $_POST['fecha_adquisicion'],
                'num_factura' => $_POST['num_factura'],
                'orden_compra' => $_POST['orden_compra'],
                'procedencia_bien' => $_POST['procedencia_bien'],
                'valor_bien' => $_POST['valor_bien'],
                'ubicacion_almacen' => $_POST['ubicacion_almacen'],
                'observacion' => $_POST['observacion'],
                'date' => $date,
                'estatus' => 1,
                'gerencia_responsable' => 5,                             
            );

            $incorporacion = InventarioModel::insertarBien($datosBien);

            if ($incorporacion)
            {
               echo "<script>
                        alert('Bien Registrado Correctamente')                        
                     </script>";                      
            }
            else
            {
               echo "<script>
                        alert('El Num de Bien ya se Encuentra Registrado')
                    </script>"; 
            }

        }
    }

    public function consultaInventario()
    {
        $resultado = InventarioModel::consultaInventario();
        return $resultado;
    }

    public function consultaBienesGerencia()
    {
        if (isset($_POST["submit"])) {
            $id = pg_escape_string($_POST["gerencia"]);

            $respuesta = BienesModel::consultaGerencia($id);

            if (pg_result_status($respuesta) && pg_num_rows($respuesta) > 0) {
                return $respuesta;
            }elseif (pg_result_status($respuesta) && pg_num_rows($respuesta) == 0) {
               echo "<script>alert('La Gerencia seleccionada no contiene Bienes asignados!')</script>"; 
            }else{
               echo "<script>
                        alert('Ha ocurrido un Error. Contacte al Administrador!');                       
                     </script>"; 
            }
        }
    }
}