<?php

require_once "../app/models/CargoModel.php";

	class CargoController
	{
	
		public function consulta()
	    {
	        return CargoModel::select();
	    }

	    public function registrarCargo(){

        $date = date('Y-m-d');

        if (isset($_POST["submit_cargo"])) {

            $datos_cargo = array(

            'descripcion_cargo'=> $_POST ['descripcion_cargo'],
            'date' => $date
            );

            $cargo = CargoModel::insertarCargo($datos_cargo);

            if ($cargo)
            {
                echo "<script>
                        alert('Cargo Registrado Correctamente');
                        window.location.href = 'index.php?action=admin/cargo';                        
                     </script>";  
            }else{
                echo "<script>
                        alert('Error: El cargo ya se Encuentra Registrado');
                        window.location.href = 'index.php?action=admin/crear_cargo';
                    </script>"; 
                }
            }

        }


        public function actualizarCargo(){

        if (isset($_POST["submit"]))
        {
            $datos_cargo = array(
                'id'                 => pg_escape_string($_POST["id"]),
                'descripcion_cargo'  => pg_escape_string($_POST['descripcion_cargo']),                
            );

            $cargo = CargoModel::actualizar($datos_cargo);

            if ($cargo)
            {
                echo "<script>
                        alert('Cargo actualizado Correctamente');
                        window.location.href = 'index.php?action=admin/cargo';                        
                     </script>";  
            }else
            {
                echo "<script>
                        alert('Ha ocurrido un error. Comunicarse con el Administrador!');
                        window.location.href = 'index.php?action=admin/cargo';
                    </script>"; 
            }
        }
        
    }
 
}
