<?php
session_start();
error_reporting(E_ERROR | E_PARSE);
//error_reporting(E_ALL);

require_once "../app/models/EnlacesModel.php";
require_once "../app/controllers/EnlacesController.php";


EnlacesController::pagina();


