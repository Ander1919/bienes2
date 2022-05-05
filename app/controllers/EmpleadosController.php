<?php

require_once "../app/models/EmpleadosModel.php";

class EmpleadosController
{

    public function consulta()
    {
        $resultado = EmpleadosModel::consulta();
        return $resultado;
    }

    public function registro()
    {
        if (isset($_POST["submit"])) {
            $datos = array(
                'cedula'      => pg_escape_string($_POST["cedula_modal"]),
                'nombre'      => pg_escape_string($_POST["nombre"]),
                'apellido'    => pg_escape_string($_POST["apellido"]),
                'email'       => pg_escape_string($_POST["email"]),
                'cargo'       => pg_escape_string($_POST["cargo"]),
                'gerencia'    => pg_escape_string($_POST["gerencia"]),
                'coordinacion'=> pg_escape_string($_POST["coord"]),
                'institucion' => pg_escape_string($_POST["institucion"]),
                'estado_empleado' => pg_escape_string($_POST["estado_empleado"]),
                'municipio_empleado' => pg_escape_string($_POST["municipio_empleado"]),
            );

            if ($_POST["submit"] == 'save') {
                
                $respuesta = EmpleadosModel::insert($datos);
                
                if (pg_result_status($respuesta)) {
                    echo "<script>
                            alert('Registrado correctamente!');
                            window.location.href = 'index.php?action=empleados/empleados';
                        </script>";
                }else{
                    echo "<script>
                            alert('Ha ocurrido un error. Comunicarse con el Administrador.');
                            window.location.href = 'index.php?action=empleados/empleados';
                        </script>";
                }

            }elseif ($_POST["submit"] == 'edit') {

                $respuesta = EmpleadosModel::update($datos);
                
                if (pg_result_status($respuesta)) {
                    echo "<script>alert('Actualizado correctamente!');window.location.href = 'index.php?action=empleados/empleados';</script>";
                }else{
                    echo "<script>alert('Ha ocurrido un error. Comunicarse con el Administrador.');window.location.href = 'index.php?action=empleados/empleados'  ;</script>";
                }
            }
        }
    }
}


