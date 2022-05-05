<?php

require_once "../app/models/EstadoModel.php";

	class EstadoController
	{
	
		public function consulta()
	    {
	        return EstadoModel::select();
	    }


	    public function registrarEstado(){

        $date = date('Y-m-d');

        if (isset($_POST["submit_estado"])) {

            $datos_estado = array(

            'descripcion_estado'=> $_POST ['descripcion_estado'],
            'date' => $date
            );

            $estado = EstadoModel::insertarEstado($datos_estado);

            if ($estado)
            {
                echo "<script>
                        alert('Estado Registrado Correctamente');
                        window.location.href = 'index.php?action=admin/estado';                        
                     </script>";  
            }else{
                echo "<script>
                        alert('Error: El Estado ya se Encuentra Registrado');
                        window.location.href = 'index.php?action=admin/crear_estado';
                    </script>"; 
                }
            }

        }

        public function actualizarEstado(){

        if (isset($_POST["submit"]))
        {
            $datos_estado = array(                         
                'id' => pg_escape_string($_POST["id"]),      
                'descripcion_estado' => pg_escape_string($_POST['descripcion_estado']),         
            );

            $estado = EstadoModel::actualizar($datos_estado);

            if ($estado)
            {
                echo "<script>
                        alert('Estado actualizado Correctamente');
                        window.location.href = 'index.php?action=admin/estado';                        
                     </script>";  
            }else
            {
                echo "<script>
                        alert('Ha ocurrido un error. Comunicarse con el Administrador!');
                        window.location.href = 'index.php?action=admin/estado';
                    </script>"; 
            }
        }
        
    }
}