	<div class="container">
		<div class="row text-center">
			<h2>Bienvenido <br> <?php echo $_SESSION["user_name"] ?> <br> al Sistema de Inventario de Bienes!</h2>
		</div>
		<div class="row">
			<div class="boxs">
				<div class="col-md-4">
					<a href="index.php?action=bienes/incorporacion">
						<div class="wow bounceIn" data-wow-offset="0" data-wow-delay="0.8s">
							<div class="align-center">
								 <h4>Incorporación de Bienes</h4>					
								<div class="icon">
									<i class="fa fa-desktop fa-3x"></i>
								</div>
								<p>
								 Registrar los bienes de la institución
								</p>
							</div>
						</div>
					</a>
				</div>
				<div class="col-md-4">
					<a href="index.php?action=bienes/asignacion">
					<div class="wow bounceIn" data-wow-offset="0" data-wow-delay="1.3s">
						<div class="align-center">
							<h4>Asignación de Bienes</h4>				
							<div class="icon">
								<i class="fa fa-code fa-3x"></i>
							</div>
							<p>
							 Asignar los bienes a los usuario 
							</p>
							<div class="ficon">
								<a href="" alt=""></a> 
							</div>
						</div>
					</div>
					</a>
				</div>
				<div class="col-md-4">
					<a href="index.php?action=inventario_material_oficina/registro_inventario">
					<div class="wow bounceIn" data-wow-offset="0" data-wow-delay="1.3s">
						<div class="align-center">
							<h4>Registro de Inventario</h4>					
							<div class="icon">
								<i class="fa fa-location-arrow fa-3x"></i>
							</div>
							<p>
							 Registrar Materiales de Oficina y Limpieza.
							</p>
							<div class="ficon">
								<a href="" alt=""></a> 
							</div>
						</div>
					</div>
					<a href="">
				</div>				
			</div>
		</div>
	</div>