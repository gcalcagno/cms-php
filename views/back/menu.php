<div class="head col-xs-12 col-sm-12 col-md-12 ol-lg-12" >
          
    <!-- imagen-->
    <div class="header col-xs-12 col-sm-12 col-md-12 ol-lg-12" >
      <h1>ADMINISTRADOR DE CONTENIDOS</h1>
    </div>
    <!-- //imagen-->

    <?php if(isset($_SESSION['usuario'])){?>
    <!-- menu-->    
    <nav class="menu navbar col-xs-12 col-sm-12 col-md-12 ol-lg-12">
        <!-- contenedor -->
        <div class="contenedor">
            
            <!-- boton menu mobile -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <!--// boton menu mobile -->

            
            <!-- Contenido menu-->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                <ul class="nav navbar-nav">

                    <li class="text-uppercase">
                      <div class="bienvenido"><?php echo 'Binvenido '.$_SESSION['usuario'];?></div>
                    </li>

                    <li class="text-uppercase">
                      <a href="index-admin.php">
                          dashboard
                      </a>
                    </li>
                    <li class="text-uppercase">
                      <a href="noticia-admin.php">
                          Noticias
                      </a>
                    </li>
                    <li class="text-uppercase">
                      <a href="categoria-admin.php">
                          Categoria
                      </a>
                    </li>
                    <li class="text-uppercase">
                      <a href="logout.php" class="logout">
                          logout
                      </a>
                    </li>
                   
                </ul>
            </div>
            <!-- //Contenido menu-->
          
        </div>
        <!-- contenedor -->
    </nav> 
    <?php }?>

 </div>