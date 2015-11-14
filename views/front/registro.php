<?php include 'views/front/layout.php' ?> 

<?php startblock('contenido') ?> 

    <?php
        if(isset($_POST['enviar']))
        { 
            //valida campos vacíos
            if(
              $_POST['nombreRegistro'] == '' ||
              $_POST['apellidoRegistro'] == '' ||
              $_POST['emailRegistro'] == '' || 
              $_POST['passwordRegistro'] == '' ||
              $_POST['repasswordRegistro'] == ''
              
              ) { 
                echo '<div class="alert alert-danger">Por favor llene todos los campos. </div></br>';
            } else { 
                //valida contraseñas iguales
                if($_POST['passwordRegistro'] != $_POST['repasswordRegistro']){
                  echo '<div class="alert alert-danger">Las contraseñas no son iguales. </div></br>';
                }else{
                    //llama a la clase
                    $UsuarioFront = new UsuarioFront();
                    $resultado = $UsuarioFront->registro($_POST["emailRegistro"], 
                      $_POST["passwordRegistro"], $_POST["nombreRegistro"], $_POST["apellidoRegistro"]);
                }
            }
        }
    ?> 
   
    <!--*** FORM REGISTRO ***-->
    <div class=" bloque">
        <div class="subtitulo titulo-naranja"> 
            <h3>Registro</h3>
        </div>
        <form role="form" action="" method="POST" class="col-lg-6 col-md-6 col-sm-12 ">
          <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" name="nombreRegistro" 
            value="<?php if (isset($_POST['nombreRegistro'])){echo $_POST['nombreRegistro']; }?>">
          </div>
          <div class="form-group">
            <label for="apellido">Apellido</label>
            <input type="text" class="form-control" name="apellidoRegistro"
            value="<?php if (isset($_POST['apellidoRegistro'])){echo $_POST['apellidoRegistro']; }?>">
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="emailRegistro"
            value="<?php if (isset($_POST['emailRegistro'])){echo $_POST['emailRegistro']; }?>">
          </div>
          <div class="form-group">
            <label for="pwd">Password</label>
            <input type="password" class="form-control" name="passwordRegistro"
            value="<?php if (isset($_POST['passwordRegistro'])){echo $_POST['passwordRegistro']; }?>">
          </div>
          <div class="form-group">
            <label for="pwd">Repetir Password</label>
            <input type="password" class="form-control" name="repasswordRegistro">
          </div>
          <button type="submit" name="enviar" value="Registrar" class="btn enviar btn-default text-uppercase">Registrarme</button>
        </form>

    </div>
    <!--*** //FORM REGISTRO ***-->

<?php endblock() ?> 















