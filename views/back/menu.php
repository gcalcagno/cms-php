<div class="head col-xs-12 col-sm-12 col-md-12 ol-lg-12" >

    <?php if(isset($_SESSION['admin'])){

      $uri = $_SERVER['REQUEST_URI'];
      $parte=explode ('/',$uri);
      $i= $parte[1];

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
        <a class="navbar-brand" href="/home">
          <img class="logo" src="/assets/back/images/logo-white.png" alt="">
        </a>
      </div>

      
     
      <!-- Agrupar los enlaces de navegación, los formularios y cualquier
           otro elemento que se pueda ocultar al minimizar la barra -->
      <div class="collapse navbar-collapse navbar-ex1-collapse">

        <div class="navbar-header pull-right">
          <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
              <?php echo $_SESSION['usuario'];?> <span class="glyphicon glyphicon-cog"></span>
            </button>
            <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
              <li>
                <a href="/logout" class="logout text-uppercase">
                  <i class="icon-menu logout icon glyphicon glyphicon-log-in "></i>logout
                </a>
              </li>
            </ul>
          </div>
        </div>
        
        <ul class="nav navbar-nav pull-right">

          <li class="text-uppercase <?php if($i == 'admin-dashboard'){echo 'active';} ?>">
            <a href="/admin-dashboard">
                <i class="icon-menu fa fa-laptop"></i>dashboard
            </a>
          </li>
          <li class="text-uppercase <?php if($i == 'admin-noticia' || $i == 'admin-noticia-carga'){echo 'active';} ?>">
            <a href="/admin-noticia">
                <i class="icon-menu glyphicon glyphicon-list-alt"></i>Noticias
            </a>
          </li>
          <li class="text-uppercase <?php if($i == 'admin-categoria'|| $i == 'admin-categoria-carga'){echo 'active';} ?>">
            <a href="/admin-categoria">
                <i class="icon-menu icon glyphicon glyphicon-tags"></i>Categorias
            </a>
          </li>
          </li>
          <li class="text-uppercase <?php if($i == 'admin-usuario'){echo 'active';} ?>">
            <a href="/admin-usuario">
                <i class="icon-menu icon glyphicon glyphicon-user"></i>Usuarios
            </a>
          </li>
         
        </ul>


        
     
      </div>




    </nav>
    <?php }?>

 </div>