

<div class="container">

  <div class="row col-md-10 offset-md-1" id="row_login">
    
    <div class="col-12 col-lg-6" id="img_nombre_empresa">
      <img src="../assets/img/nombre_empresa1.png"  >
    </div>
    <div class="col-12 col-lg-6">
      <?= form_open(base_url().'usuario/validarLogin', array(
        'name' => 'form_login',
        'id'=>'form_login',
        'class'=> 'form-signin',
        'role' => 'form'));
      ?>

      <?php if(isset($mensaje)){  ?>
      <?=$mensaje;?>
      <?php }?>
      <?= validation_errors();?>


      <div class="form-group col-12">

        <label class="col-md-12 col-form-label form-signin-heading">Ingrese sus datos</label>


        <div class="col-md-12">
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1"><span class="icon-user"></span></span>
            </div>
            <?= form_input('txtnom',@set_value('txtnom'),
          'id="usuario" placeholder="Usuario" class="form-control" autocomplete="off" required="" autofocus=""');?>
          </div>

          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1"><span class="icon-lock"></span></span>
            </div>
            <?= form_password('txtpass','',
          'id="password" placeholder="Contraseña" class="form-control"  required=""');?>
          <div class="input-group-append">
            <span class="input-group-text"><span class="icon-eye" id="verPassword"></span></span>
          </div>
        </div>          

        </div>
                      <?php
          $formato= array(
              'name' => 'btnIngresar',
              'value' => 'Ingresar',
              'id' => 'btnlogin',
              'class' => 'btn btn-md btn-block btn-login',
          );?>
    

         <div class="col-md-12 div-boton">
          <?= form_submit($formato);?>
         </div>
         
       </div>

      <?= form_close();?>
    </div>


  </div>
</div>