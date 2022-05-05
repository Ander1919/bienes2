<?php

require_once "../app/models/TipoIncorporacionModel.php";

class TipoIncorporacionController
{
	public function consulta()
    {
        return TipoIncorporacionModel::select();
    }

    public function registrarTipoIncorporacion(){

        $date = date('Y-m-d');

        if (isset($_POST["submit_tipo_incorporacion"]))
        {

            $datos_tipoincorporacion = array(

            'tipo_incorporacion'=> $_POST ['tipo_incorporacion'],
            'date' => $date
            );

            $tipo_incorporacion = TipoIncorporacionModel::insertarTipoIncorporacion($datos_tipoincorporacion);

            if ($tipo_incorporacion)
            {
                echo "<script>
                        alert('Tipo de Incorporación Registrado Correctamente');
                            window.location.href = 'index.php?action=admin/tipo_incorporacion';                        
                     </script>";  
            }else
            {
                echo "<script>
                        alert('Error: El Tipo de Incorporación se Encuentra Registrado');
                            window.location.href = 'index.php?action=admin/crear_tipo_incorporacion';
                    </script>"; 
            }
        }
        
    }

    public function actualizacion()
    {
        if (isset($_POST["submit"])) {
            $datos = array(
                'id'          => pg_escape_string($_POST["id"]),
                'descripcion' => pg_escape_string($_POST["descripcion"]),
            );

            $resultado =  TipoIncorporacionModel::actualizar($datos);

            if ($resultado) {
                echo "<script>
                        alert('Tipo de Incorporación actualizado correctamente!');
                            window.location.href = 'index.php?action=admin/tipo_incorporacion';                       
                     </script>";  
            }else{
                echo "<script>
                        alert('Ha ocurrido un error. Comunicarse con el Administrador.');
                            window.location.href = 'index.php?action=admin/tipo_incorporacion';
                    </script>"; 
            }
        }
    }
}