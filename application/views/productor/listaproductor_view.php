
<div class="container-fluid" id="div-listado" >
	

	<div class="col-12 div-encabezado">
		Listado de Productores
	</div>

	<div class="col-12 div-botones" >
		
		<?php
			foreach ($btn as $key => $row) {
				echo '<a id="'.$row['id_modulo'].'" title="'.$row['descripcion'].'" href="'.base_url().$row['enlace'].'" class="col-5 col-lg-2 btn btn-sm '.$row['class'].'">
					  <span class="'.$row['icon'].'"></span> '.$row['descripcion'].'</a>';
			}
		?>

	</div>

		
	<div class="row">
			<div class="container-fluid form-group" id="div_listado_productor">
				
				<div class="table table-bordered" id="">	

					<div class="form-group col-12 row3 thead_div" >
						<div class="col-3 col-md-1">
							<label class="form-control-sm thead_celda div_icon_orden" data="1">
								Codigo 
								<i id="icon-orden-1" class="icon-sort-alpha-desc"></i></a>
							</label>
						</div>
				      	<div class="col-3 col-md-1">
				      		<label class="form-control-sm thead_celda div_icon_orden" data="3">
								Tip.Doc. 
								<i id="icon-orden-3"></i></a>
							</label>
				      	</div>
				      	<div class="col-3 col-md-1">
				      		<label class="form-control-sm thead_celda div_icon_orden" data="5">
								Nro Documento
								<i id="icon-orden-5"></i></a>
							</label>
				      	</div>

				      	<div class="col-3 col-md-2">
				      		<label class="form-control-sm thead_celda div_icon_orden" data="6">
								Apellidos y Nombres / Razon Social
								<i id="icon-orden-6"></i></a>
							</label>
				      	</div>

						<div class="col-1 d-none d-md-block">
							<label class="form-control-sm thead_celda div_icon_orden" data="8">
								Departamento
								<i id="icon-orden-8"></i></a>
							</label>
						</div>
						<div class="col-1 d-none d-md-block">
							<label class="form-control-sm thead_celda div_icon_orden" data="10">
								Provincia
								<i id="icon-orden-10"></i></a>
							</label>
						</div>
						<div class="col-1 d-none d-md-block">
							<label class="form-control-sm thead_celda div_icon_orden" data="12">
								Distrito
								<i id="icon-orden-12"></i></a>
							</label>
						</div>
						<div class="col-2 d-none d-md-block">
							<label class="form-control-sm thead_celda div_icon_orden" data="14">
								Zona
								<i id="icon-orden-14"></i></a>
							</label>
						</div>
						<div class="col-1 d-none d-md-block">
							<label class="form-control-sm thead_celda div_icon_orden" data="15">
								Fec.Registro
								<i id="icon-orden-15"></i></a>
							</label>
						</div>
						<div class="col-1 d-none d-md-block">
							<label class="form-control-sm thead_celda div_icon_orden" data="17">
								Estado
								<i id="icon-orden-17"></i></a>
							</label>
						</div>
					</div>
					<div class="" id="div_bus">
						<?=$busqueda;?>
					</div>	
					<!-- <div class="form-group col-12 row tbody_div" > -->
					<div class="tbody_div row pre-scrollable-tar" >
						<?=$listaProductor;
						?>
					</div>
				 </div>
			</div> 
	</div>


	<div class="row" id="foot_tb_tarea">
		<div class="col-md-3 row" id="encabezado_tb_tarea">
				<div class="col-4 col-md-3 text-center div-mostrar" id="" > Mostrar: </div>
				<select name="cboCanFilas" id="canFilas" class="col-4 form-control-sm col-md-3 text-center">
					<option value="1" selected="selected">20</option>
					<option value="3">50</option>
					<option value="4">100</option>
					<option value="4">150</option>
					<option value="5">250</option>
					
				</select>
				<div class="col-4 col-md-4 text-center div-mostrar" id="" > por página </div>
		</div>

		<div class="col-md-4 div-mostrar text-center" id="" >Mostrando del <span id="ini_registro">1</span>  al <span id="fin_registro">20</span> de un total de <span id="total_registros"><?=$pag['TOTALREGISTROS'];?></span> registros</div>
		<nav aria-label="Page navigation" class="col-md-5 text-right" id="nav_paginacion">
				<?=$paginacion;?>
		</nav>
	</div>

</div>

<div class="row3" id="div-foot" >
		<div class="col-6 col-md-6 col-lg-1 offset-lg-1">
			<div class="social">
		 		<a href="<?=base_url();?>principal" class="social__button icon_pie"><i class="icon-undo2"></i></a>
			</div>
		</div>
		<div class="col-6 col-md-6 col-lg-1 offset-lg-8">
			<?php
				$host= $_SERVER["HTTP_HOST"];
				$url= $_SERVER["REQUEST_URI"];
			?>
			<div class="social">
		 		<a href="http://<?=$host.$url;?>" class="social__button icon_pie"><i class="icon-spinner9"></i></a>
			</div>
		</div>
</div>
	
</div>

