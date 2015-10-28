<div class="head col-xs-12 col-sm-12 col-md-12 ol-lg-12" >
    
    <?php

      $uri = $_SERVER['REQUEST_URI'];
      $parte=explode ('/',$uri);
      $i= $parte[3];

    ?>

    <!-- menu-->    

    <nav class="menu navbar navbar-inverse" role="navigation">
      <!-- El logotipo y el icono que despliega el menú se agrupan
           para mostrarlos mejor en los dispositivos móviles -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse"
                data-target=".navbar-ex1-collapse">
          <span class="sr-only">Desplegar navegación</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="admin-dashboard"><img class="logo" src="assets/back/images/logo-white.png" alt=""></a>
      </div>
     
      <!-- Agrupar los enlaces de navegación, los formularios y cualquier
           otro elemento que se pueda ocultar al minimizar la barra -->
      <div class="collapse navbar-collapse navbar-ex1-collapse">
        
        <?php if(isset($_SESSION['usuario'])){ ?>

        <div class="navbar-header pull-right">
          <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
              <?php echo $_SESSION['usuario'];?> <span class="glyphicon glyphicon-cog"></span>
            </button>
            <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
              <li>
                <a href="perfil" class="text-uppercase">
                 <i class="icon-menu icon glyphicon glyphicon-user"></i> PERFIL
                </a>
              </li>
              <li>
                <a href="logout" class="text-uppercase">
                  <i class="icon-menu logout icon glyphicon glyphicon-log-in "></i>logout
                </a>
              </li>
            </ul>
          </div>
        </div>
        <?php } ?>

        <ul class="nav navbar-nav pull-right">

          <li class="text-uppercase <?php if($i == 'noticias'  || $i == ''){echo 'active';} ?>">
            <a href="noticias">
                <i class="icon-menu glyphicon glyphicon-list-alt"></i>Noticias
            </a>
          </li>
          <!--<li class="text-uppercase <?php if($i == 'categorias'){echo 'active';} ?>">
            <a href="categorias">
                <i class="icon-menu icon glyphicon glyphicon-tags"></i>Categorias
            </a>
          </li>-->
          </li>
         
        </ul>
     
      </div>


    </nav>


 </div>