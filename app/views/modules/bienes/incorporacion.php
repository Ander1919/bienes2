<?php
  require_once "../app/controllers/SelectController.php";
  require_once "../app/controllers/BienesController.php";
  
  $tipo_bien = SelectController::selectTipoBien();
  $bienes = SelectController::selectBienes();
  $institucion = SelectController::selectInstitucion();
  $tipo_incorporacion = SelectController::selectTipoIncorporacion();
  $ubicacion_almacen = SelectController::selectUbicacionAlmacen();
  BienesController::registrarBien();
  $estado_fisico_bien = SelectController::selectEstadoFisicoBien();
  //var_dump(pg_fetch_row($bienes));
?>

<br>
<div class="container">
<div class="row">
    <h2 class="text-center">Incorporación de Bienes</h2>
</div>
  <br>
  <hr>
  <form method="post">
  <div class="form-group">
    <div class="row form-group">
      <div class="col-sm-4">
        <label for="tipo_bien">Tipo de Bien:</label>
        <select class="form-control" name="tipo_bien" id="tipo_bien" onChange="cargaContenido(this.id)" required>
          <option value="" disabled selected>Seleccione...</option>
          <?php
            while ($resultado = pg_fetch_assoc($tipo_bien)){
              echo "<option value='".$resultado['id_tipo_bien']."'>".$resultado['descripcion_tipobien']."</option>";
            }
          ?>
        </select>
      </div>
      <div class="col-sm-4">
        <label for="bienes">Clasificación del Bien:</label>
        <select class="form-control" name="bienes" id="bienes" required>
          <option value="">Seleccione...</option>          
        </select>
      </div>
      <div class="col-sm-4">
        <label for="institucion">Institución:</label>
        <select class="form-control" name="institucion" required>
          <option value="">Seleccione...</option>
           <?php
            while ($resultado = pg_fetch_assoc($institucion)){
              echo "<option value='".$resultado['id_institucion']."'>".$resultado['nombre_institucion']."</option>";
            }
          ?>
        </select>
      </div>
    </div>
    <div class="row form-group">
      <div class="col-sm-4">
        <label for="marca">Marca:</label>
        <input class="form-control" type="text" name="marca" value="" required pattern="[A-Za-z0-9 ]{1,20}" maxlength="30" placeholder="Marca" title="No admite caracteres especiales. Solo letras y números, Cantidad Máx. 30">
      </div>
      <div class="col-sm-4">
        <label for="modelo">Modelo:</label>
        <input class="form-control" type="text" name="modelo" value="" required pattern="[A-Za-z0-9 ]{1,20}" maxlength="30" placeholder="Modelo" title="No admite caracteres especiales. Solo letras y números, Cantidad Máx. 30">
      </div>
      <div class="col-sm-4">
        <label for="numero_bien">Número del Bien:</label>
        <input class="form-control" type="numeric" name="numero_bien" value="" placeholder="Num. de Bien" maxlength="6" required>
      </div>     
    </div>
    <div class="row form-group">
     <div class="col-sm-4">
        <label for="serial_bien">Serial del Bien:</label>
        <input class="form-control" type="text" name="serial_bien" value="" required pattern="[A-Za-z0-9 ]{1,20}" maxlength="20" placeholder="Serial del Bien" title="No admite caracteres especiales. Solo letras y números, Cantidad Máx. 20">
      </div>
     <div class="col-sm-8">
        <label for="caracteristicas_bien">Descripción del Bien:</label>
        <input class="form-control" type="text" name="caracteristicas_bien" value="" maxlength="100" required pattern="[A-Za-z0-9 ]{1,100}" placeholder="Caracteristicas del Bien" title="No admite caracteres especiales. Solo letras y números, Cantidad Máx. 100">
      </div>      
    </div>
    <div class="row form-group">
      <div class="col-sm-4"> 
        <label for"estado_fisico_bien">Estado Fisico del Bien</label>
          <select class="form-control" name="estado_fisico_bien" required>
            <option value="">Seleccione...</option>
            <?php
             while ($resultado = pg_fetch_assoc($estado_fisico_bien)){
                echo "<option value='".$resultado['id_estado_fisico_bien']."'>".$resultado['descripcion_estado_fisico']."</option>";
             }
            ?>
          </select>
      </div>      
      <div class="col-sm-4">
        <label for="tipo_incorporacion">Concepto de Incorporación:</label>
        <select class="form-control" name="tipo_incorporacion" required>
          <option value="">Seleccione...</option>
          <?php
            while ($resultado = pg_fetch_assoc($tipo_incorporacion)){
              echo "<option value='".$resultado['id_tipo_incorporacion']."'>".$resultado['descripcion_incorporacion']."</option>";
            }
          ?>
        </select>
      </div>
      <div class="col-sm-4">
        <label for="procedencia_bien">Procedencia del Bien</label>
        <input class="form-control" type="text" name="procedencia_bien" value="" maxlength="20" required pattern="[A-Za-z0-9 ]{1,20}" placeholder="Procedencia Bien" title="No admite caracteres especiales. Solo letras y números, Cantidad Máx. 20">
      </div>            
    </div> 
    <div class="row form-group">
      <div class="col-sm-4">
        <label for="fecha_adquisicion">Fecha de Adquisición:</label>
        <input class="form-control" type="text" id="datepicker" name="fecha_adquisicion" required>
      </div> 
      <div class="col-sm-4">
        <label for"num_factura">Num. Factura / Memo</label>
        <input class="form-control" type="text " name="num_factura" value="" maxlength="20" required pattern="[A-Za-z0-9 ]{1,20}" placeholder="Num. Factura / Memo" title="No admite caracteres especiales. Solo letras y números, Cantidad Máx. 20">
      </div>
      <div class="col-sm-4">
        <label for"orden_compra">Num. Orden de Compras</label>
        <input class="form-control" type="text " name="orden_compra" value="" maxlength="20" required pattern="[A-Za-z0-9 ]{1,20}" placeholder="Num. Orden de Compras" title="No admite caracteres especiales. Solo letras y números, Cantidad Máx. 20">
      </div>              
    </div>
    <div class="row form-group">
      <div class="col-sm-4">
        <label for"valor_bien">Valor del Bien</label>
        <input class="form-control" type="text " name="valor_bien" value="" maxlength="10" required pattern="[0-9]{1,10}" placeholder="Valor del Bien" title="Solo números permitido. Cantidad Máx. 10">
      </div>           
      <div class="col-sm-4">
        <label for"ubicacion_almacen">Ubicación</label>
        <select class="form-control" name="ubicacion_almacen" required>
          <option value="">Seleccione...</option>
          <?php
            while ($resultado = pg_fetch_assoc($ubicacion_almacen)){
              echo "<option value='".$resultado['id_ubicacion_almacen']."'>".$resultado['nombre_almacen']."</option>";
            }
          ?>
        </select>
      </div>      
      <div class="col-sm-4">
        <label for="observacion">Observación</label>
        <textarea class="form-control" name="observacion" maxlength="100" placeholder="Ingrese Observación" style="resize:none" required pattern="[A-Za-z0-9 ]{1,100}"></textarea>      
      </div>       
    </div>         
    <div class="row form-group text-center">      
      <div>
       <button type="submit" name="submit_consulta" class="btn btn-primary">Guardar</button>
      </div>
    </div>  
    <div class="row form-group">    
    </div> 
   </form>
  </div>
</div>
