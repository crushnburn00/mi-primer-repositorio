
<div class="container-fluid" id="div-listado" >
	
	<div class="col-12 div-encabezado">
		Listado de Fincas
	</div>


	<div class="form-group row div-encabezado1" id="">
		<div class="form-control-sm col-md-2" >
			CODIGO DE SOCIO: 
		</div>
		<div class="form-control-sm col-md-4 lbl_encabezado">
			<?=$socio['codigo'];?>
		</div>	
		<div class="form-control-sm col-md-2">
			NOMBRE / RAZON SOCIAL: 
		</div>
		<div class="form-control-sm col-md-4 lbl_encabezado">
			<?=$socio['nombre_razon'];?>
		</div>
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
			<div class="container-fluid form-group" id="div_listado_socio">

				<div class="table table-bordered" id="">	

					<div class="form-group col-12 row3 thead_div" >
						<div class="col-md-1">
							<label class="form-control-sm col-md-8" id="">Id</label>
							<label class="form-control-sm col-md-2 icon- col-md-1" id="codigo_ord"></label>
						</div>

						<div class="col-md-2">
							<label class="form-control-sm col-md-8" id="">Nombre</label>
							<label class="form-control-sm col-md-2 icon- col-md-1" id="codigo_ord"></label>
						</div>
						<div class="col-2">
							<label class="form-control-sm col-md-8" id="">Departamento</label>
							<label class="form-control-sm col-md-2 icon- col-md-1" id="departamento_ord"></label>
						</div>
						<div class="col-2">
							<label class="form-control-sm col-md-8" id="">Provincia</label>
							<label class="form-control-sm col-md-2 icon- col-md-1" id="provincia_ord"></label>
						</div>
						<div class="col-2 ">
							<label class="form-control-sm col-md-8" id="">Distrito</label>
							<label class="form-control-sm col-md-2 icon- col-md-1" id="distrito_ord"></label>
						</div>
						<div class="col-2 ">
							<label class="form-control-sm col-md-8" id="">Zona</label>
							<label class="form-control-sm col-md-2 icon- col-md-1" id="zona_ord"></label>
						</div>
						<div class="col-1 ">
							<label class="form-control-sm col-md-8" id="">Estado</label>
							<label class="form-control-sm col-md-2 icon- col-md-1" id="estado_ord"></label>
						</div>
					</div>
					<div class="" id="div_bus">
						<?=$busqueda;?>
					</div>	
					<!-- <div class="form-group col-12 row tbody_div" > -->
					<div class="tbody_div row pre-scrollable-tar" >
						<?=$lista;
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
		 		<a href="<?=base_url();?>socio" class="social__button icon_pie"><i class="icon-undo2"></i></a>
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

