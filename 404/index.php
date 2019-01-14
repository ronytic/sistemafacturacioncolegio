<?php
require_once("../configuracion.php");
?>
<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">


	<title>Error 404</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,700" rel="stylesheet">

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="<?php echo (!empty($_SERVER['REQUEST_SCHEME'])?$_SERVER['REQUEST_SCHEME']:'http')."://".$_SERVER['HTTP_HOST']."/"?><?php echo $directory?>404/css/style.css" />

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
</head>

<body>

	<div id="notfound">
		<div class="notfound"><h2>Sistema de Facturación</h2>
			<div class="notfound-404">

				<h1>4<span></span>4</h1>
			</div>
			<h2>Oops! La Página no se Pudo Encontrar</h2>
			<p>Lo sentimos, pero la página que estás buscando no existe, se ha eliminado. el nombre ha cambiado o no está disponible temporalmente
				<br>
				<b>Contactece con el Administrador: Ronald Nina Cel: 591-73230568 </b>
			</p>
			<a href="<?php echo (!empty($_SERVER['REQUEST_SCHEME'])?$_SERVER['REQUEST_SCHEME']:'http')."://".$_SERVER['HTTP_HOST']."/"?><?php echo $directory?>">Volver al Inicio</a>

		</div>
	</div>

</body>
</html>
