-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-11-2015 a las 01:58:10
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `gcmaster_cms`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
`id` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` longtext COLLATE utf8_unicode_ci NOT NULL,
  `activo` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id`, `nombre`, `descripcion`, `activo`) VALUES
(1, 'Desarrolladores', 'Las mejores noticias sobre desarrollo web', '1'),
(2, 'Web', 'Novedades del mercado web', '1'),
(3, 'generales', 'Noticias de interés general', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorianoticia`
--

CREATE TABLE IF NOT EXISTS `categorianoticia` (
`id` int(11) NOT NULL,
  `idNoticia` int(11) NOT NULL,
  `idCategoria` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=318 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `categorianoticia`
--

INSERT INTO `categorianoticia` (`id`, `idNoticia`, `idCategoria`) VALUES
(74, 158, 1),
(76, 158, 3),
(206, 116, 1),
(207, 116, 2),
(208, 116, 3),
(230, 157, 1),
(231, 157, 3),
(232, 159, 1),
(233, 159, 3),
(274, 164, 1),
(275, 164, 2),
(276, 164, 3),
(293, 112, 1),
(294, 112, 2),
(295, 112, 3),
(297, 111, 1),
(298, 111, 3),
(315, 1, 1),
(316, 1, 2),
(317, 1, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagennoticia`
--

CREATE TABLE IF NOT EXISTS `imagennoticia` (
`id` int(11) NOT NULL,
  `nombre` longtext COLLATE utf8_unicode_ci NOT NULL,
  `idNoticia` int(11) NOT NULL,
  `activo` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=92 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `imagennoticia`
--

INSERT INTO `imagennoticia` (`id`, `nombre`, `idNoticia`, `activo`) VALUES
(19, 'laravel.png', 112, '1'),
(20, 'laravel-vs-symfony.jpg', 116, '1'),
(61, 'square_odd9l7.png', 157, '1'),
(62, 'DESLAN01_big.gif', 159, '1'),
(89, 'original.jpg', 1, '1'),
(90, 'javascript.png', 111, '1'),
(91, 'w3schools.com_.png', 164, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticia`
--

CREATE TABLE IF NOT EXISTS `noticia` (
`id` int(11) NOT NULL,
  `titulo` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `texto` longtext COLLATE utf8_unicode_ci NOT NULL,
  `descarga` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fecha` date NOT NULL,
  `activo` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=165 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `noticia`
--

INSERT INTO `noticia` (`id`, `titulo`, `texto`, `descarga`, `fecha`, `activo`) VALUES
(1, '20 años de Java: ¿En qué quedó el sueño de programar una vez, ejecutar en cualquier lugar?', 'Java cumple hoy 20 años. El 23 de Mayo de 1995 vió la luz de forma pública, durante la conferencia SunWorld ¡Qué tiempos! La compañía Sun Microsystems presentó el lenguaje en el que había estado trabajando durante más de cinco años de forma interna el equipo de James Gosling (el padre de la criatura). Un auténtico lenguaje moderno concebido para funcionar en cualquier dispositivo, esa fue la idea.\r\nPara acompañar el anuncio de esa fecha, el pelotazo fue que se integraría con el navegador Netscape, el nacimiento de los Applets de Java. La web empezaba a asomar su potencial e hizo virar el rumbo del lenguaje. Dándole popularidad y cierta omnipresencia en cualquier navegador y sistema operativo.\r\nEs el principal lenguaje en el que ha desarrollado su carrera profesional muchos programadores.Java, sin duda, es uno de los lenguajes más populares de la actualidad. Desde 2010 es propiedad de Oracle, el gigante tecnologico que aglutina toda su tecnología. Su influencia es tremenda en distintos ámbitos de programación. Representa una pieza fundamental en el negocio de muchas compañías, debido a su fuerte presencia gracias a sus numerosas herramientas empresariales, tanto en la cara más front de web, de aplicaciones en el cliente o en el servidor.\r\nEs el principal lenguaje en el que ha desarrollado su carrera profesional muchos programadores. Seguro que tú estás entre ellos. Así que tenemos mucho que agradecerle, aunque alguna vez nos cabree.\r\nY como usuario, no creas que no te toca tu parte: Java ha sido ese componente presente en muchos navegadores hasta hace bien poco. Los applets que comentamos eran “la moda” y muchas páginas web de su tiempo te exigían instalarlo para ejecutar cierta funcionalidad. Hasta entonces imposibles de otro modo. Y, por supuesto, infinidad de aplicaciones de escritorio que necesita la JRE (el entorno de ejecución de Java para funcionar), casi todos como usuarios nos ha tocado instalar para ejecutar alguno de esos programas. También fue fundamental para posibilitar las primeras aplicaciones en esos móviles que admitían J2ME. Y por supuesto, es la pieza fundamental sobre el se sustenta Android, aunque algunos quieran matarlo de forma precipitada.', NULL, '2015-09-03', '1'),
(111, 'Como habilitar JavaScript en tu navegador', 'Hoy en día casi todas las páginas web contienen JavaScript, un lenguaje de programación que se ejecuta en el navegador web del visitante. JavaScript permite crear funcionalidades específicas en las páginas web y si por alguna razón es deshabilitado, el contenido o la funcionalidad de la página puede quedar limitada o no disponible. Aquí puedes encontrar las instrucciones sobre cómo habilitar (activar) JavaScript en cinco de los navegadores más utilizados.', '', '2015-10-11', '1'),
(112, 'Conociendo Laravel: el framework que revolucionó PHP', 'Si siguen ahí después de leer el título quiere decir que todavía no perdieron las esperanzas de encontrar un buen Framework en PHP.\r\nLa discusión entre “framework si” o “framework no” es larga y creo que los fundamentos más fuertes de los detractores se basan en las opciones disponibles de hoy en día. Pero en algún momento nos vemos en la necesidad de no reinventar la rueda, sobretodo cuando tenemos que implementar acciones comunes (friendly URLs, manejo de sesiones, manejo de base de datos, etc).\r\nEs por eso que quería hablar de Laravel, un framework que viene tomando mucha fuerza en los últimos meses largos y con el lanzamiento de su version número 4 se posiciona como una opción más que interesante para explorar.\r\nEn esta nota vamos a repasar sus puntos fuertes y en notas posteriores ver algunos ejemplos prácticos de como usarlo y los beneficios que tiene.\r\nThe basics\r\nEl framework posee lo que ya nos imaginamos: Router, Models, Layouts, Views, Controllers, etc. Para los templates utiliza un engine propio que se llama Blade, que tiene algunos helpers copados.\r\nArtisan\r\nCliente de consola que nos permite ejecutar comandos propios del framework. Es muy versátil, potente e incluso nos permite extenderlo creando nuestras propias tareas para que estén disponibles desde este cliente.\r\nComposer\r\nDesde la última versión, la 4, está disponible directamente desde Composer el nuevo gestor de paquetes y de dependencias de PHP. Esto nos permite modificar y agregar los paquetes que querramos incluso permitiéndonos generar paquetes nuestros, configurarlos en el composer.json e incluirlos en nuestra aplicación con un composer update. Tal es el uso y los beneficios de Composer que Laravel utiliza muchos paquetes de otros frameworks como Symfony (Artisan es una extensión de su consola) entre otros.\r\nMigrations\r\nA esta altura todos utilizamos algún sistema de control de versiones para nuestro código (y si no lo hacemos, ya es hora). Lo que incorpora Laravel es la posibilidad de llevar un control de versiones también de nuestra base de datos. Esto, combinado con un sistema de seeding nos permite tener nuestra aplicación descargada y funcionando en unos pocos comandos. Ejemplo:\r\n$git clone https://github.com/laravel/laravel.git\r\n$composer update\r\nY para configurar la base de datos:\r\n$php artisan migrate\r\n$php artisan db:seed\r\nListo! ya tenemos nuestra aplicación descargada, instalada y con su base de datos configurada.\r\nResources\r\nDesde esta última versión, se incorpora el concepto de resource permitiéndonos programar nuestros controladores como si fueran un API Rest y que sean consumidos de la misma forma. Es decir que para agregar un elemento hacemos un POST /resource, para obtener un listado un GET /resource, para obtener un elemento GET /resource/{id}, etc. Esto nos permite liberar y consumir nuestra aplicación como un API sin tener que modificar nada, y dándonos la posibilidad de integrarla y de que sea integrada por otros sistemas.\r\nEloquent ORM\r\nObject-Relational Mapping para nuestra base de datos. Nos permite interactuar con nuestra base de datos como si cada tabla fuera un Modelo, respetando más fielmente la división MVC. Es muy fácil de usar, y por sobre todas las cosas maneja una sintaxis muy expresiva para facilitar su lectura y comprensión.\r\nGenerators\r\nUna de las cosas que más me gustan por el tiempo que ahorran. Están basados en un paquete que creó Jeffrey Way y que se puede agregar al composer.json para que lo descargue automáticamente al iniciar el desarrollo de nuestra aplicación. Lo que debemos hacer es agregarlo como required:\r\n"require": {\r\n    "laravel/framework": "4.0.*",\r\n    "way/generators": "dev-master"\r\n}\r\nDespués de un composer update estamos listos para usarlo. Esto nos va a permitir generar un template de cualquiera de los elementos que necesitemos, ya sea un Model, Controller, Seed, View, Migration, etc.\r\nUn ejemplo práctico para entender la comodidad de usarlo: vamos a crear un resource para gestionar los usuarios de nuestra aplicación:\r\n$php artisan generate:resource usuario --fields="nombre:string,apellido:string,username:string,password:string"\r\nEl resultado del comando crea lo siguiente:\r\nVistas para el listado, el detalle, la edición, y el alta\r\nLayout general (lo crea si es la primera vez que lo ejecutamos)\r\nModelo del Resource (Usuario)\r\nControlador del Resource con todos sus métodos\r\nMigración para crear la tabla con todos sus métodos de gestión.\r\nModifica el archivo routes.php (que contiene el mappeo de todas las rutas) para agregar el resource\r\nCrea la clase para hacer el Unit Testing.\r\nEn resumen, una vez que lo terminemos, podemos acceder a http://localhost/usuarios y vamos a tener un ABM absolutamente funcional para extenderlo y/o modificarlo de la forma que querramos. Esta es una excelente forma de acortar los tiempos iniciales de desarrollo sobretodo para cuando necesitamos testear la implementación de forma rápida para poder tomar mejores decisiones.\r\nY mucho más\r\nQuedaron muchas cosas interesantes afuera, como que viene con un driver para utilizar storage Redis, soporte para Unit Testing, Validations, etc. Esto es solo un muestreo de algunas de las features. Pueden ver el resto de la magia en la documentación oficial.', '', '2015-10-19', '1'),
(116, 'Laravel vs Symfony', 'Como podemos ver, sin lugar a dudas, el framework más prometedor es Laravel, creado en 2011 y ampliamente influenciado por Ruby on Rails, se alza sobre el resto de sus competidores con más de un cuarto de los votos.\r\n\r\nY, en segundo lugar pero no menos importante: Synfony2. Ésta es la tercera opción de los votantes; y es que, este framework, usado por el CMS Drupal 8, ofrece unas opciones de reutilización difíciles de igualar.\r\n\r\nVamos a conocer un poco más de ellos,\r\n\r\nLaravel: Como hemos comentado anteriormente, este framework tiene una gran influencia de Ruby on Rails. Fue creado en 2011 y es de código abierto. Una de las principales características de Laravel es su facilidad de aprendizaje y su potencia, permitiendo un amplio abanico de opciones. Una de los puntos más destacables de Laravel es la facilidad con la que se puede crear un RESTful Service en muy poco tiempo, si es un servicio sencillo en pocos minutos se puede tener listo sin problemas.\r\n\r\nSymfony2: Es muy parecido a Laravel, o más bien, al revés: Laravel es parecido a él. Este framework, al igual que el primero que encabeza esta lista, presenta una potencia y facilidad sorprendentes. Symfony2 rompe totalmente con las versiones anteriores, permitiendo que sea hasta 3 veces más rápido  requiriendo hasta 2 veces menos memoria. Es muy valorado a la hora de realizar proyectos grandes, y además, a la hora de realizar bundles, la reutilización de funcionalidades es realmente sencilla, por lo que aligeraremos los siguientes desarrollos.\r\n\r\nBueno, con este pequeño análisis, esperamos aclarar un poco que framework elegir a la hora de realizar vuestros proyectos. Y, sin lugar a dudas, debemos tener en cuenta que, a la hora de elegir framework, no hay ninguno mejor que otro sino que tenemos que elegir el que mejor se adapte a lo que necesitamos. En nuestro laboratorio hemos estado probándolos y, cada uno en su cometido, sin duda están a la altura de su popularidad.', '', '2015-10-26', '1'),
(157, '¿Qué es AngularJS? ', 'AngularJS es un framework MVC de JavaScript para el Desarrollo Web Front End que permite crear aplicaciones SPA (Single-Page Applications). Entra dentro de la familia de frameworks como BackboneJS o EmberJS.\r\n\r\nCon tanta oferta de frameworks se nos hace difícil elegir cuál usar en nuestras aplicaciones, qué ventajas tienen unos frente a otros, etc. En esta entrada voy a comentar que hace a AngularJS diferente al resto y unos cuantos enlaces a recursos online donde aprender a usar este framework y coger soltura. Allá vamos.\r\n\r\nAnteriormente en la parte Front-End de las aplicaciones web sólo teníamos a jQuery (además de otras librerías parecidas como Mootools, Prototype,…) para ayudarnos con el código JavaScript del cliente. Podíamos manipular el DOM de una forma más sencilla, añadir efectos, llamadas AJAX, etc… pero no teníamos un patrón a seguir. Todo el código JS iba en funciones que íbamos creando según necesitáramos, lo que provocaba que con el tiempo el código fuera difícilmente manejable y se convirtiese en el temido Spaguetti Code.\r\n\r\nPor suerte surgieron frameworks que implementaban el patrón MVC (Modelo, Vista, Controlador) y nos ayudaban a separar conceptos. El más conocido es BackboneJS, que surgió en 2010 creada por Jeremy Ashkenas (Creador también de CoffeeScript) y depende de otras 2 librerías: jQuery y Underscore.js Es usado por múltiples Start-ups como Pinterest, Foursquare, AirBnB, Trello, etc…\r\n\r\nSin embargo AngularJS está pisando fuerte. Aunque su primera versión es de 2009, se ha hecho muy popular a finales de 2012 y ahora en 2013 está en pleno auge. Tanto que ya se habla de una nueva technology stack como antes era LAMP (Linux + Apache + MySQL + PHP) ahora la tendencia es MEAN (MongoDB/Mongoose + ExpressJS + AngularJS + NodeJS), lo que también se traduce a aplicaciones JavaScript End-to-End. AngularJS está mantenido por Google y bastante comunidad. También como punto a su favor está lo sencillo que crear Tests unitarios y End-to-End con Jasmine y Karma, algo que suele ser un poco costoso al principio.\r\n\r\nBackboneJS te permite crear tu app rápidamente aunque en ocasiones es complicado de utilizar. La mayoría de los desarrolladores eligen BackboneJS porque parece la opción más segura, lleva más tiempo entre nosotros, hay mucha documentación sobre él y está mantenido por una gran comunidad.', '', '2015-10-26', '1'),
(158, 'Twitter Bootstrap', 'Twitter Bootstrap es un framework o conjunto de herramientas de software libre para diseño de sitios y aplicaciones web. Contiene plantillas de diseño con tipografía, formularios, botones, cuadros, menús de navegación y otros elementos de diseño basado en HTML y CSS, así como, extensiones de JavaScript opcionales adicionales.\r\n\r\nEs el proyecto más popular en GitHub1 y es usado por la NASA y la MSNBC junto a demás organizaciones.\r\n\r\nBootstrap es modular y consiste esencialmente en una serie de hojas de estilo LESS que implementan la variedad de componentes de la herramienta. Una hoja de estilo llamada bootstrap.less incluye los componentes de las hojas de estilo. Los desarrolladores pueden adaptar el mismo archivo de Bootstrap, seleccionando los componentes que deseen usar en su proyecto.\r\n\r\nLos ajustes son posibles en una medida limitada a través de una hoja de estilo de configuración central. Los cambios más profundos son posibles mediante las declaraciones LESS.\r\n\r\nEl uso del lenguaje de hojas de estilo LESS permite el uso de variables, funciones y operadores, selectores anidados, así como clases mixin.\r\n\r\nDesde la versión 2.0, la configuración de Bootstrap también tiene una opción especial de "Personalizar" en la documentación. Por otra parte, los desarrolladores eligen en un formulario los componentes y ajustes deseados, y de ser necesario, los valores de varias opciones a sus necesidades. El paquete consecuentemente generado ya incluye la hoja de estilo CSS pre-compilada.', '', '2015-10-27', '1'),
(159, 'Redes Inalámbricas y alámbricas', 'Una conexión alámbrica es aquella en la que los sistemas se basan en la transmisión de información a través de un conductor que transporta corriente eléctrica, mientras que una conexión inalámbrica es aquella en la que la información viaja en forma de impulsos eléctricos o en forma de luz (ondas electromagnéticas).\r\n\r\n– DIFERENCIAS:\r\n– En la conexión inalámbrica se da la presencia de menos cables, utilizando un módem que tiene una tarjeta para el ordenador, mientras que en el caso de la alámbrica se da una utilización mayor de cables.\r\n– Las redes inalámbricas permiten una mayor movilidad y menor coste de mantenimiento respecto a la alámbrica.\r\n– En las redes alámbricas se da una lenta instalación respecto a la inalámbrica, que no necesita la utilización de cableado.', '', '2015-10-29', '1'),
(164, 'W3schools Tutoriales Online', ' Si buscas un portal para aprender los estándares web, W3Schools es tu sitio. No sólo contiene excelentes tutoriales paso a paso de HTML, CSS y Javascript, sino que también dispone de sus correspondientes referencias, completas y actualizadas.\r\n\r\nTambién existen tutoriales sobre otras tecnologías como XML, SQL, PHP, etc. Eso sí, en mi opinión se pueden encontrar mejores tutoriales.\r\n\r\nEl único fallo es que está inglés, pero el nivel es muy sencillo y fácil de comprender.\r\n\r\nhttp://www.w3schools.com/php/default.asp', '', '2015-11-03', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuariocategoria`
--

CREATE TABLE IF NOT EXISTS `usuariocategoria` (
`id` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idCategoria` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuariocategoria`
--

INSERT INTO `usuariocategoria` (`id`, `idUsuario`, `idCategoria`) VALUES
(1, 20, 1),
(2, 20, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
`id` int(11) NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `apellido` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tipo` set('admin','user') COLLATE utf8_unicode_ci NOT NULL,
  `activo` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `password`, `nombre`, `apellido`, `tipo`, `activo`) VALUES
(19, 'admin@admin.com', '123', 'admin', 'admin', 'admin', '1'),
(20, 'info@calcagnogiannina.com.ar', '123456', 'Giannina', 'Calcagno', 'user', '1'),
(26, 'gcalcagno14@gmail.com', '123456', 'giannina', 'calcagno', 'user', '1');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categorianoticia`
--
ALTER TABLE `categorianoticia`
 ADD PRIMARY KEY (`id`), ADD KEY `idNoticia` (`idNoticia`), ADD KEY `idNoticia_2` (`idNoticia`), ADD KEY `idCategoria` (`idCategoria`);

--
-- Indices de la tabla `imagennoticia`
--
ALTER TABLE `imagennoticia`
 ADD PRIMARY KEY (`id`), ADD KEY `idNoticia` (`idNoticia`);

--
-- Indices de la tabla `noticia`
--
ALTER TABLE `noticia`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuariocategoria`
--
ALTER TABLE `usuariocategoria`
 ADD PRIMARY KEY (`id`), ADD KEY `idUsuario` (`idUsuario`), ADD KEY `idUsuario_2` (`idUsuario`), ADD KEY `idUsuario_3` (`idUsuario`), ADD KEY `idUsuario_4` (`idUsuario`), ADD KEY `idCategoria` (`idCategoria`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT de la tabla `categorianoticia`
--
ALTER TABLE `categorianoticia`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=318;
--
-- AUTO_INCREMENT de la tabla `imagennoticia`
--
ALTER TABLE `imagennoticia`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=92;
--
-- AUTO_INCREMENT de la tabla `noticia`
--
ALTER TABLE `noticia`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=165;
--
-- AUTO_INCREMENT de la tabla `usuariocategoria`
--
ALTER TABLE `usuariocategoria`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `categorianoticia`
--
ALTER TABLE `categorianoticia`
ADD CONSTRAINT `categorianoticia_ibfk_1` FOREIGN KEY (`idNoticia`) REFERENCES `noticia` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `categorianoticia_ibfk_2` FOREIGN KEY (`idCategoria`) REFERENCES `categoria` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `imagennoticia`
--
ALTER TABLE `imagennoticia`
ADD CONSTRAINT `imagennoticia_ibfk_1` FOREIGN KEY (`idNoticia`) REFERENCES `noticia` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuariocategoria`
--
ALTER TABLE `usuariocategoria`
ADD CONSTRAINT `usuariocategoria_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `usuariocategoria_ibfk_2` FOREIGN KEY (`idCategoria`) REFERENCES `categoria` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
