<?php

require_once "../app/models/EstadoFisicoBienModel.php";

    class EstadoFisicoBienController
    {
	
		public function consulta()
	    {
	        return EstadoFisicoBienModel::select();
	    }

	    public function registrar(){

        $date = date('Y-m-d');

        if (isset($_POST["estado_fisico"]))
        {

            $datos = array(

            'descripcion_estado_fisico'=> $_POST ['descripcion_estado_fisico'],
            'date' => $date
            );

            $estado_fisico = EstadoFisicoBienModel::insertar($datos);

            if ($estado_fisico)
            {
                echo "<script>
                        alert('Registro Exitoso');
                        window.location.href = 'index.php?action=admin/estado_fisico_bien';                        
                     </script>";  
            }else
            {
                echo "<script>
                        alert('Error: Registro duplicado');
                        window.location.href = 'index.php?action=admin/crear_estado_fisico_bien';
                    </script>"; 
            }
        }        
    }

    public function actualizar(){

        if (isset($_POST["submit"]))
        {
            $datos = array(
                'id' => pg_escape_string($_POST["id"]),
                'descripcion_estado_fisico' => pg_escape_string($_POST['descripcion_estado_fisico']),                
            );

            $estado_fisico = EstadoFisicoBienModel::actualizar($datos);

            if ($estado_fisico)
            {
                echo "<script>
                        alert('Cargo actualizado Correctamente');
                        window.location.href = 'index.php?action=admin/estado_fisico_bien';                        
                     </script>";  
            }else
            {
                echo "<script>
                        alert('Ha ocurrido un error. Comunicarse con el Administrador!');
                        window.location.href = 'index.php?action=admin/estado_fisico_bien';
                    </script>"; 
            }
        }
        
    }
}