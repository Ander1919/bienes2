<?php

require_once "../app/models/BienesModel.php";

class DescripcionBienController
{

     public function consultaDescripcionBien()
    {
        return BienesModel::consultaDescripcionBien();
    }


    public function registrarDescripcionBien(){

        $date = date('Y-m-d');

        if (isset($_POST["submit_descripcion_bien"]))
        {

            $datos_bien = array(
                'nombre_bien' => $_POST ['nombre_bien'],
                'tipo_bien'   => $_POST ['tipo_bien'],
                'date'        => $date
            );
            
            $descripcion_bien = BienesModel::insertarDescripcionBien($datos_bien);

            if ($descripcion_bien)
            {
                echo "<script>
                        alert('Bien Registrado Correctamente');
                        window.location.href = 'index.php?action=admin/descripcion_bien';                         
                     </script>";  
            }else
            {
                echo "<script>
                        alert('Error: El Bien se Encuentra Registrado');
                        window.location.href = 'index.php?action=admin/crear_descripcion_bien';
                    </script>"; 
            }
        }
        
    }

    public function actualizar()
    {
        $datos = array(
            'id'          => pg_escape_string($_POST["id_bienes"]),
            'descripcion' => pg_escape_string($_POST["nombre_bien"]),
            'id_tipo'     => pg_escape_string($_POST["tipo_bien"]),
        );
        if (isset($_POST["submit"])) {
            
            $resultado = BienesModel::actualizarDescripcionBien($datos);

            if (pg_result_status($resultado)){
                echo "<script>
                        alert('Bien actualizado Correctamente');
                        window.location.href = 'index.php?action=admin/descripcion_bien';             
                     </script>";  
            }else{
                echo "<script>
                        alert('Ha ocurrido un error. Comunicarse con el Administrador!');
                        window.location.href = 'index.php?action=admin/descripcion_bien';
                    </script>"; 
            }

        }
    }

}