<?php

class EnlacesController{

  //Llamada a la Plantilla
  public function pagina()
  {
    include "../app/views/template.php";
  }

  //Enlaces a Paginas de la Aplicacion
  public function enlacesPaginaController()
  {
    if (isset($_GET["action"])) {
      $enlaces = $_GET["action"];
    }

    $paginas = new Paginas();
    $respuesta = $paginas->enlacesPaginaModel($enlaces);
    include $respuesta;
  }

}
