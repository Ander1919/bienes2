<?php

require_once "../app/models/MunicipioModel.php";

	class MunicipioController
	{	

		public function consulta()
	    {
	        return MunicipioModel::select();
	    }


 	     public function registrarMunicipio(){

        $date = date('Y-m-d');

        if (isset($_POST["submit_descripcion_municipio"]))
        {

            $datos_municipio = array(
                'estado' => $_POST ['estado'],
                'descripcion_municipio' => $_POST ['descripcion_municipio'],
                'date'        => $date
            );
            
            $descripcion_estado = MunicipioModel::insertarMunicipio($datos_municipio);

            if ($descripcion_estado)
            {
                echo "<script>
                        alert('Municipio Registrado Correctamente');
                        window.location.href = 'index.php?action=admin/municipio';                         
                     </script>";  
            }else
            {
                echo "<script>
                        alert('Error: comuniquese con el administrador!');
                        window.location.href = 'index.php?action=admin/municipio';
                    </script>"; 
           	}	
        }
       
   	 }

     public function actualizarMunicipio(){

        if (isset($_POST["submit_actualizarMunicipio"]))
        {
            $datos_municipio = array(                     
                'nombre_municipio' => pg_escape_string($_POST['nombre_municipio']), 
                'id_estado' => pg_escape_string($_POST['estado']),
                'id_municipio' => pg_escape_string($_POST["id_municipio"]),
            );

            $municipio = MunicipioModel::actualizar($datos_municipio);

            if ($municipio)
            {
                echo "<script>
                        alert('Municipio actualizado Correctamente');
                        window.location.href = 'index.php?action=admin/municipio';                        
                     </script>";  
            }else
            {
                echo "<script>
                        alert('Ha ocurrido un error. Comunicarse con el Administrador!');
                        window.location.href = 'index.php?action=admin/municipio';
                    </script>"; 
            }
        }
        
    }
 
 }
 
