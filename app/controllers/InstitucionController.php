<?php

require_once "../app/models/InstitucionModel.php";

class InstitucionController
{

	 public function consulta()
    {
        return InstitucionModel::select();
    }

    public function registrarInstitucion(){

        $date = date('Y-m-d');

        if (isset($_POST["submit_institucion"]))
        {

            $datos_institucion = array(

            'nombre_institucion'=> $_POST ['nombre_institucion'],
            'direccion'=> $_POST ['direccion'],
            'date' => $date
            );

            $institucion = InstitucionModel::insertarInstitucion($datos_institucion);

            if ($institucion)
            {
                echo "<script>
                        alert('Institución Registrada Correctamente');
                        window.location.href = 'index.php?action=admin/institucion';                        
                     </script>";  
            }else
            {
                echo "<script>
                        alert('Error: La Institución ya se Encuentra Registrada');
                        window.location.href = 'index.php?action=admin/crear_institucion';
                    </script>"; 
            }
        }
        
    }

   public function actualizar(){

        if (isset($_POST["submit"]))
        {
            $datos_institucion = array(
                'id'                 => pg_escape_string($_POST["id"]),
                'nombre_institucion' => pg_escape_string($_POST['nombre_institucion']),
                'direccion'          => pg_escape_string($_POST['direccion']),
            );

            $institucion = InstitucionModel::actualizar($datos_institucion);

            if ($institucion)
            {
                echo "<script>
                        alert('Institución actualizada! Correctamente');
                        window.location.href = 'index.php?action=admin/institucion';                        
                     </script>";  
            }else
            {
                echo "<script>
                        alert('Ha ocurrido un error. Comunicarse con el Administrador!');
                        window.location.href = 'index.php?action=admin/institucion';
                    </script>"; 
            }
        }
        
    }
}