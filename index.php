<?php 
require_once 'conexion.php';
require_once 'menu.php';
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Ilerna Le Piezerie</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php 
	$menu = new Menu();

 ?>
 <div id ="titulo" style="background-color:lightsalmon; max-width: 220px;" >
		<h1>Ilerna´s Pizzas</h1>
 		
 </div>
 <div id="subtitulo" style="background-color:peachpuff; max-width: 800px;">	
 	
 	<ul class="nav">
 		<h2>Mantenimiento</h2>	
 		<li>
 			<ul>
 				<a style='text-decoration: none;color:black; font-size:24px;' href="crudopcion.php">Fichero de Opciones</a>
 			</ul>
 		</li>
 		<li>
 			<ul>
 				<a style='text-decoration: none;color:black; font-size:24px;' href="crudplato.php">Fichero de Platos</a>
 			</ul>
 		</li>
 		<h2>Nuestro Menu</h2>
 		<?php foreach($menu->getMenu() as $m): ?>
 		<li style='font-size:24px; color:crimson;'>
 			<?php echo $m['opcion']; ?>
	 		<ul>
	 			<?php foreach($menu->getSubMenu($m['id']) as $s): ?>
	 			<li><a style='text-decoration: none;color:darkred; font-size:24px;' href="<?php echo 'http://localhost/practicas/plato.php?op='.$s['idplato'].'+&plato='.$s['plato'].'+&precio='.$s['precioplato']; ?>"><?php echo $s['plato']; ?></a></li>
	 			<?php endforeach; ?>
	 		</ul>
 		</li>
 		<?php endforeach; ?>
 	</ul>

 </div>


</body>
</html>