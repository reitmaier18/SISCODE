<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<!-- Bootstrap core CSS -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
  	<!-- Material Design Bootstrap -->
  	<link href="css/mdb.min.css" rel="stylesheet">
	<!-- Your custom styles (optional) -->
	<link rel="stylesheet" type="text/css" href="css/est_principal.css">
	<link rel="stylesheet" type="text/css" href="css/est_login.css">
	<title></title>
</head>
<body>
	<div class="header-logo">
		<img src="img/logo2.png">	
	</div>
	<div class="header">
		<!--img src="img/logo2.png"-->
		<h1>Jurisdicción Disciplinaria Judicial</h1>
	</div>
	<div class="login-wallpaper">
		<img src="img/wallpaper2.jpg">
	</div>
	<div class="login-box">
		<div class="login-icon">
			<img src="img/icon1.png">
		</div>
		<h2>Iniciar Sesión</h2>
		
		<form action="main.php" method="POST">
			<div class="textbox">
				<img src="img/icon2.png">
				<input type="text" name="user" placeholder="Usuario" id="bloquear" onkeyup="javascript:this.value=this.value.toUpperCase();" onkeypress="return check(event)">
			</div>
			<div class="textbox">
				<img src="img/icon3.png">
				<input type="password" name="password" placeholder="Contraseña" id="bloquearb" onkeyup="javascript:this.value=this.value.toUpperCase();" onkeypress="return check(event)">
			</div>
			<input id="send" type="button" value="Iniciar">
		</form>
	</div>
	<script type="text/javascript" src="js/seguridad.js"></script>
</body>
</html>