<header>
  <nav class="navbar navbar-default navbar-fixed-top" style="background-color: #065362 !important">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a href="index.php"><font color="white">Procuraduría General de La República</font></a>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-right">
          <?php
            if ($_SESSION["logueado"] == true) {
          ?>
          <?php
            if ($_SESSION["user_perfil"] == 1) {
          ?>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Administrador <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li class="dropdown-header">Administración Usuarios</li>
              <li><a href="index.php?action=admin/usuarios_create">Creación Usuarios</a></li>
              <li><a href="index.php?action=admin/usuarios_consulta">Consulta Usuarios</a></li>
              <li class="dropdown-header">Administración Sistema</li>
              <li class="dropdown-submenu">
                <a class="test" tabindex="-1" href="#">Mantenimiento <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="index.php?action=admin/tipo_bien">Tipo de Bien</a></li>
                  <li><a href="index.php?action=admin/descripcion_bien">Bien</a></li>
                  <li><a href="index.php?action=admin/institucion">Institucion</a></li>
                  <li><a href="index.php?action=admin/ubicacion_almacen">Almacen</a></li>
                  <li><a href="index.php?action=admin/tipo_incorporacion">Tipo de Incorporacion</a></li>
                  <li><a href="index.php?action=admin/gerencia">Gerencia</a></li>
                  <li><a href="index.php?action=admin/coordinacion">Coordinación</a></li>
                  <li><a href="index.php?action=admin/cargo">Cargo</a></li>
                  <li><a href="index.php?action=admin/estado_fisico_bien">Estado Fisico Bien</a></li>
                  <li><a href="index.php?action=admin/estado">Estado</a></li>
                  <li><a href="index.php?action=admin/municipio">Municipio</a></li>

                </ul>
              </li>
            </ul>
          </li>
          <?php    
            }
          ?>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Bienes <span class="caret"></span></a>
            <ul class="dropdown-menu">         
              <li><a href="index.php?action=bienes/incorporacion">Incorporación</a></li>
              <li><a href="index.php?action=bienes/asignacion">Asignar</a></li>
              <li><a href="index.php?action=bienes/desvinculacion">Desvincular</a></li>
              <li><a href="index.php?action=bienes/deshabilitar">Deshabilitar</a></li>
              <li><a href="index.php?action=bienes/desincorporar">Enajenación</a></li>
            </ul>
          </li>
          <li><a href="index.php?action=empleados/empleados">Empleados</a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Reportes <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="index.php?action=reportes/consulta_cedula_bienesActivo">Bienes Asignados por Usuario</a></li>
              <li><a href="index.php?action=reportes/consulta_cedula">Historico de Bienes por Usuario</a></li>
              <li><a href="index.php?action=reportes/consulta_bien">Consulta por Num. de Bien</a></li>
              <li><a href="index.php?action=reportes/consulta_historico_bien">Consulta Historico de Bien</a></li>
              <li><a href="index.php?action=reportes/consulta_tipo_bien">Consulta Tipo Bien</a></li>
              <li><a href="index.php?action=reportes/consulta_inventario">Consulta Inventario</a></li>
              <li><a href="index.php?action=reportes/consulta_gerencia">Consulta Gerencia</a></li>
            </ul>
          </li>
          <li><a href="javascript:history.back()">Volver</a></li>      
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION["user_name"] ?> <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="index.php?action=usuarios/perfil">Perfil</a></li>
              <li><a href="index.php?action=logout">Cerrar Sesion</a></li>
            </ul>
          </li>
          <?php    
            }
          ?>
        </ul>
      </div><!--/.nav-collapse -->
    </div>
  </nav>

</header>
