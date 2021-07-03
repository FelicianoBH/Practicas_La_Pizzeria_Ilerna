<!DOCTYPE html>
<html>
<head>
	<title>Ilerna Le Piezerie</title>
</head>
<body>
<div id ="menu">
 <div id ="titulo" style="background-color:lightsalmon; max-width: 400px;" >
		<h1>Ilerna Le Piezerie</h1>
 </div>	
 <div id ="subtitulo" style="background-color:peachpuff; max-width: 800px;" >
 		 <h3>Plato Elegido:</h3>
 		<h2> <?php echo $_GET['plato'].' de precio: '.$_GET['precio'];?></h2>
 </div>
</body>
</html>
