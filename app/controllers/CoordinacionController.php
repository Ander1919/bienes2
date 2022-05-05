<?php

require_once "../app/models/CoordinacionesModel.php";

class CoordinacionController
{

     public function consultaCoordinacion()
    {
        return CoordinacionesModel::consultaCoordinacion();
    }

     public function registrarCoordinacion(){

        $date = date('Y-m-d');

        if (isset($_POST["submit_descripcion_coordinacion"]))
        {

            $datos_coordinacion = array(

            'gerencia'=> $_POST['gerencia'],
            'nombre_coordinacion'=> $_POST['nombre_coordinacion'],
            'date' => $date
            );
            
            $descripcion_coordinacion = CoordinacionesModel::insertarCoordinacion($datos_coordinacion);

            //var_dump($descripcion_coordinacion);

            if ($descripcion_coordinacion)
            {
                echo "<script>
                        alert('Coordinación Registrada Correctamente');window.location.href = 'index.php?action=admin/coordinacion';                        
                     </script>";  
            }else
            {
                echo "<script>
                        alert('Error: La Coordinación se Encuentra Registrada');window.location.href = 'index.php?action=admin/crear_coordinacion';
                    </script>"; 
            }
        }
        
    }

    public function actualizarCoordinacion(){

        if(isset($_POST["submit_actualizarCoordinacion"]))
        {

            $datos_coordinacion = array(   
                'gerencia'            => $_POST['gerencia'],
                'nombre_coordinacion' => $_POST['nombre_coordinacion'],
                'id'                  => $_POST['id_coordinacion']
            );   

            $descripcion_coordinacion = CoordinacionesModel::actualizarCoordinacion($datos_coordinacion);

            if($descripcion_coordinacion)
             {
                echo "<script>
                        alert('Coordinación Actualizada Correctamente');window.location.href = 'index.php?action=admin/coordinacion';              
                     </script>";
             }else{
                 echo "<script>
                        alert('Error, comuniquese con el Administrador');window.location.href = 'index.php?action=admin/coordinacion';
                    </script>"; 
             }
        }
    }
   
}