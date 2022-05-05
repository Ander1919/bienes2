<?php
  require_once "../app/controllers/SelectController.php";
  require_once "../app/controllers/MaterialesOficinaController.php";
  
  $tipo_bien = SelectController::selectTipoBien();
  $bienes = SelectController::selectBienes();
  $uni_medida = SelectController::selectUnidadMedida();
  $ubicacion_almacen = SelectController::selectUbicacionAlmacen();
  MaterialesOficinaController::registrarBien();  
  
?>

<br>
<div class="container">
<div class="row">
    <h2 class="text-center">Registro de Inventario</h2>
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
        <label for="fecha_adquisicion">Fecha de Adquisición:</label>
        <input class="form-control" type="text" id="datepicker" name="fecha_adquisicion" required>
      </div> 
     </div>
    <div class="row form-group">              
    </div>

    <div class="row form-group">
      <div class="col-sm-4">
        <label for="marca">Marca:</label>
        <input class="form-control" type="text" name="marca" value="" required pattern="[A-Za-z0-9 ]{1,20}" maxlength="30" placeholder="Marca" title="No admite caracteres especiales. Solo letras y números, Cantidad Máx. 30">
      </div> 
      <div class="col-sm-8">
        <label for="caracteristicas_bien">Descripción del Bien:</label>
        <input class="form-control" type="text" name="caracteristicas_bien" value="" maxlength="100" required pattern="[A-Za-z0-9 ]{1,100}" placeholder="Caracteristicas del Bien" title="No admite caracteres especiales. Solo letras y números, Cantidad Máx. 100">
      </div>      
    </div>
    <div class="row form-group">
      <div class="col-sm-4">
        <label>Cantidad</label>
        <select class="form-control" name="cantidad" id="cantidad">
          <option value="">Seleccione...</option>
           <option value="1">1</option> 
          <option value="2">2</option>
          <option value="3">3</option>  
        </select>         
      </div>
      <div class="col-sm-4">
        <label>Unidad de Medida</label>
        <select class="form-control" name="unidad_medida" required>
          <option value="">Seleccione...</option>
           <?php
            while ($resultado = pg_fetch_assoc($uni_medida)){
              echo "<option value='".$resultado['id_uni_medida']."'>".$resultado['descripcion']."</option>";
            }
          ?>
        </select>
      </div>
      <div class="col-sm-4">
        <label>Unidad/Litro</label>
        <select class="form-control" name="unidad_litro" id="unidad_litro">
          <option value="">Seleccione...</option>
           <option value="1">1</option> 
          <option value="2">2</option>
          <option value="3">3</option>  
        </select>
      </div>
    </div>
    <div class="row form-group">
      <div class="col-sm-4">
        <label for="procedencia_bien">Procedencia del Bien</label>
        <input class="form-control" type="text" name="procedencia_bien" value="" maxlength="20" required pattern="[A-Za-z0-9 ]{1,20}" placeholder="Procedencia Bien" title="No admite caracteres especiales. Solo letras y números, Cantidad Máx. 20">
      </div>
      <div class="col-sm-4">
        <label for="num_factura">Num. Factura / Memo</label>
        <input class="form-control" type="text " name="num_factura" value="" maxlength="20" required pattern="[A-Za-z0-9 ]{1,20}" placeholder="Num. Factura / Memo" title="No admite caracteres especiales. Solo letras y números, Cantidad Máx. 20">
      </div>
      <div class="col-sm-4">
        <label for="orden_compra">Num. Orden de Compras</label>
        <input class="form-control" type="text " name="orden_compra" value="" maxlength="20" required pattern="[A-Za-z0-9 ]{1,20}" placeholder="Num. Orden de Compras" title="No admite caracteres especiales. Solo letras y números, Cantidad Máx. 20">
      </div>              
    </div>
    <div class="row form-group">
      <div class="col-sm-4">
        <label for="valor_bien">Valor del Bien</label>
        <input class="form-control" type="text " name="valor_bien" value="" maxlength="10" required pattern="[0-9]{1,10}" placeholder="Valor del Bien" title="Solo números permitido. Cantidad Máx. 10">
      </div>           
      <div class="col-sm-4">
        <label for="ubicacion_almacen">Ubicación Almacén</label>
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
       <button type="submit" name="submit_registrar" class="btn btn-primary">Guardar</button>
      </div>
    </div>  
    <div class="row form-group">    
    </div> 
   </form>
  </div>
</div>
