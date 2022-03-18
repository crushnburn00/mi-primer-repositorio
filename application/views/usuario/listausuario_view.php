
<div class="container-fluid" id="div-listadosol" >
	

    <div class="col-12 div-encabezado">
        Listado de Usuarios
    </div>

    <div class="col-12 div-botones" >
        <a id="registrar-usuario" title="CREAR NUEVO" href="<?=base_url();?>usuario/registrarUsuario" class="col-5 col-lg-2 btn btn-sm btn-effect-success">
            <span class='icon-pencil'></span> CREAR NUEVO
        </a>
        <a id="busqueda-usuario" title="BÚSQUEDA" href="#" class="col-5 col-lg-2 btn btn-sm btn-effect-fail"><span class='icon-search'></span> BÚSQUEDA</a>
        <a id="buscar-usuario" title="REALIZAR BÚSQUEDA" href="#" class="col-5 col-lg-2 btn btn-sm btn-effect-info hidden"><span class='icon-search'></span> BUSCAR</a>
        <a id="finalizarbus-solicitud" title="FINALIZAR BÚSQUEDA" href="#" class="col-5 col-lg-2 btn btn-sm btn-effect-fail hidden"><span class='icon-search'></span> FINALIZAR BÚSQUEDA</a>
    </div>

    
    <div class="row pre-scrollable-inc">
            <div class="container-fluid form-group" id="div_listado_incidencia">

                <div class="table table-bordered" id="">    

                    <div class="form-group col-12 row2 thead_div" >
                        <div class="col-2 ">Id Usuario</div>
                        <div class="col-2 ">Nombre Personal</div>
                        <div class="col-2 ">Email</div>
                        <div class="col-2 ">Usuario</div>
                        <div class="col-2 ">Tipo Usuario</div>
                        <div class="col-2 ">Usuario Creación</div>
                    </div>
                    <div class="tbus_div d-none" >

                    </div>  
                    <!-- <div class="form-group col-12 row tbody_div" > -->
                    <div class="tbody_div" >
                        <?=$listaUsuario;?>
                    </div>
                 </div>
            </div> 
    </div>


    <div class="row" id="foot_tb_incidencia">
        <div class="col-md-3 row" id="encabezado_tb_incidencia">
                <div class="col-4 col-md-3 text-center div-mostrar" id="" > Mostrar: </div>
                <select name="cboCanFilas" id="canFilas" class="col-4 form-control-sm col-md-3 text-center">
                    <option value="1" selected="selected">25</option>
                    <option value="3">50</option>
                    <option value="4">100</option>
                    <option value="4">150</option>
                    <option value="5">250</option>
                    
                </select>
                <div class="col-4 col-md-4 text-center div-mostrar" id="" > por página </div>
        </div>

        <div class="col-md-4 div-mostrar text-center" id="" >Mostrando del <span id="ini_registro">1</span>  al <span id="fin_registro">25</span> de un total de <span id="total_registros"><?=$pag['TOTALREGISTROS'];?></span> registros</div>
        <nav aria-label="Page navigation" class="col-md-5 text-right" id="nav_paginacion">
                <?=$paginacion;?>
        </nav>
    </div>

</div>



    
</div>


