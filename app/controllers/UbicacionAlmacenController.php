<?php

require_once "../app/models/UbicacionAlmacenModel.php";

class UbicacionAlmacenController
{

	 public function consulta()
    {
        return UbicacionAlmacenModel::select();
    }

    public function registrarAlmacen()
    {

        $date = date('Y-m-d');

        if (isset($_POST["submit_almacen"]))
        {

            $datos_almacen = array(

            'nombre_almacen'=> $_POST ['nombre_almacen'],
            'direccion'=> $_POST ['direccion'],
            'date' => $date
            );

            $almacen = UbicacionAlmacenModel::insertarAlmacen($datos_almacen);

            if ($almacen)
            {
                echo "<script>
                        alert('Almacén Registrado Correctamente');
                            window.location.href = 'index.php?action=admin/ubicacion_almacen';                        
                     </script>";  
            }else
            {
                echo "<script>
                        alert('Error: El Almacén ya se Encuentra Registrado');
                            window.location.href = 'index.php?action=admin/crear_ubicacion_almacen';
                    </script>"; 
            }
        }
        
    }

    public function actualizacion()
    {

        if (isset($_POST["submit"])){

            $datos_almacen = array(
                'id'             => pg_escape_string($_POST["id"]),
                'nombre_almacen' => pg_escape_string($_POST ['nombre_almacen']),
                'direccion'      => pg_escape_string($_POST ['direccion']),
            );

            $almacen = UbicacionAlmacenModel::actualizar($datos_almacen);

            if ($almacen){
                echo "<script>
                        alert('Almacén actualizado correctamente');
                            window.location.href = 'index.php?action=admin/ubicacion_almacen';                     
                     </script>";  
            }else{
                echo "<script>
                        alert('Ha ocurrido un error. Comunicarse con el Administrador!');
                            window.location.href = 'index.php?action=admin/ubicacion_almacen';
                    </script>"; 
            }
        }
        
    }

}