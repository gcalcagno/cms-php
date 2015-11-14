

	<?php 

		//carga todas las clases
   		require_once "config/core.php";
	
		//detecta url
		$uri = $_SERVER['REQUEST_URI'];
		$parte=explode ('/',$uri);
		$i= $parte[1];
		//echo $i;

		$BackController= new BackController;
		$FrontController= new FrontController;


		switch($i)
		{
			case "":
				$FrontController->home();
			break;

			case "home":
				$FrontController->home();
			break;
			
			case "noticias":
				$FrontController->home();
			break;

			case "noticia":
				$FrontController->noticia();
			break;

			case "categorias":
				$FrontController->listadoCategoria();
			break;

			case "registro":
				$FrontController->registro();
			break;

			case "perfil":
				$FrontController->perfil();
			break;

			case "logout":
				$BackController->logout();
			break;

			case "admin":
				$BackController->login();
			break;

			case "admin-dashboard":
				$BackController->dashboard();
			break;

			case "admin-noticia":
				$BackController->listNoticia();
			break;

			case "admin-categoria":
				$BackController->listCategoria();
			break;

			case "admin-noticia-carga":
				$BackController->cargaNoticia();
			break;

			case "admin-categoria-carga":
				$BackController->cargaCategoria();
			break;
			
			case "admin-usuario":
				$BackController->listUsuario();
			break;

			//default, evita error 404, y si ingresa alguna otra url
			default:
				echo 'ERROR 404';
			}

	?>


