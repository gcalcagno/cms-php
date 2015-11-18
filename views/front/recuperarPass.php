<?php include 'views/front/layout.php' ?> 

<?php startblock('contenido') ?> 

    <?php
        if(isset($_POST['recuperar']))
        { 
            //valida campos vacíos
            if( $_POST['email'] == '') { 
                echo '<div class="alert alert-danger">Por favor complete el campo email. </div></br>';
            }else{ 
                $UsuarioFront = new UsuarioFront();
                $resultado = $UsuarioFront->recuperarPass($_POST["email"]);
            }
        }
    ?> 
   
    <!--*** FORM REGISTRO ***-->
    <div class=" bloque">
        <div class="subtitulo titulo-naranja"> 
            <h3>Recuperar Password</h3>
        </div>
        <p>Para recuperar tu contraseña contactate con <strong>info@calcagnogiannina.com.ar</strong></p>
        <!--<form role="form" action="" method="POST" class="col-lg-6 col-md-6 col-sm-12 ">
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email"
            value="<?php// if (isset($_POST['email'])){echo $_POST['email']; }?>">
          </div>
          <button type="submit" name="recuperar" value="enviar" class="btn enviar btn-default text-uppercase">Enviar</button>
        </form>-->

    </div>
    <!--*** //FORM REGISTRO ***-->

<?php endblock() ?> 















