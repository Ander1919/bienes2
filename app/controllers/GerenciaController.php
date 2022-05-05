<?php

require_once "../app/models/GerenciaModel.php";

class GerenciaController
{
	public function consulta()
    {
        return GerenciaModel::select ();
    }

	public function registrarGerencia()
	{
		$date = date('Y-m-d');

        if (isset($_POST["submit_gerencia"]))
        {

            $datos_gerencia = array(

            'gerencia'=> $_POST ['gerencia'],
            'date' => $date
            );

            $gerencia = GerenciaModel::insertarGerencia($datos_gerencia);

            if ($gerencia)
            {
                echo "<script>
                        alert('Gerencia Registrada Correctamente');window.location.href = 'index.php?action=admin/gerencia';                        
                     </script>";  
            }else
            {
                echo "<script>
                        alert('Error: La Gerencia ya se encuentra Registrada');window.location.href = 'index.php?action=admin/crear_gerencia';
                    </script>"; 
            }
        }
	}

    public function actualizarGerencia()
    {
           $datosGerencia = array(

            'nombre_gerencia'=> $_POST ['nombre_gerencia'],
            'id_gerencia' => $_POST ['id_gerencia']
            );

       if (isset($_POST['submit_actualizarGerencia']))
       {

        $gerencia = GerenciaModel::actualizarGerencia($datosGerencia);

        //var_dump($gerencia);

        if($gerencia)

        {
            echo "<script>
                    alert('Gerencia Actuliazada Correctamente');
                    window.location.href = 'index.php?action=admin/gerencia';                        
                 </script>";  
        }else
        {
            echo "<script>
                    alert('Error: Ha ocurrido un error. Comunicarse con el Administrador!');
                    window.location.href = 'index.php?action=admin/gerencia';
                </script>"; 
        }

       }

    }
}
