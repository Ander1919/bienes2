<?php

require_once "../app/models/TipoBienModel.php";

class TipoBienController
{

    public function consultaTipoBien()
    {
        if (isset($_POST["tipo_bien"]))
        {

            //Pasamos los datos al array
            $datos = array(
                'tipo_bien' => $_POST['tipo_bien'],
            );

            //Llamamos a la Clase y al Metodo
            $respuesta = TipoBienModel::consultarTipoBien($datos);

            if (pg_num_rows($respuesta) > 0)
            {
                return $respuesta; 
            }else
            {
                echo "<script>alert('No hay bienes registrados.');       
                    </script>";
            }
        }
    }

    public function consulta()
    {
        return TipoBienModel::consulta();
    }

    public function actualizacion()
    {
        if ($_POST["submit"] == 'edit') {
            $datos = array(
                'id'          => pg_escape_string($_POST["id"]),
                'descripcion' => pg_escape_string($_POST["descripcion"]),
                'grupo' => pg_escape_string($_POST["grupo"]),
                'sub_grupo' => pg_escape_string($_POST["sub_grupo"]),
                'seccion' => pg_escape_string($_POST["seccion"]),
            );

            $respuesta = TipoBienModel::actualizacion($datos);

            if (pg_result_status($respuesta)) {
                echo "<script>
                            alert('Actualizado correctamente!');
                            window.location.href = 'index.php?action=admin/tipo_bien';                           
                         </script>"; 
            }else{
                echo "<script>
                            alert('Ha ocurrido un error. Comunicarse con el Administrador!');
                            window.location.href = 'index.php?action=admin/tipo_bien';
                         </script>";
            }
        }
    }

    public function registrarTipoBien()
    {

        $date = date('Y-m-d');

        if (isset($_POST["submit_tipo_bien"]))
        {

            $datos_tipobien = array(

            'tipo_bien'=> $_POST ['tipo_bien'],
            'grupo'=> $_POST ['grupo'],
            'sub_grupo'=> $_POST ['sub_grupo'],
            'seccion'=> $_POST ['seccion'],
            'date' => $date
            );

            $tipo_bien = TipoBienModel::insertarTipoBien($datos_tipobien);

            if ($tipo_bien)
            {
                echo "<script>
                        alert('Tipo de bien registrado correctamente');
                            window.location.href = 'index.php?action=admin/tipo_bien';                        
                     </script>";  
            }else
            {
                echo "<script>
                        alert('Error: El tipo de bien se encuentra registrado');
                            window.location.href = 'index.php?action=admin/tipo_bien';
                    </script>"; 
            }
        }
        
    }
}
