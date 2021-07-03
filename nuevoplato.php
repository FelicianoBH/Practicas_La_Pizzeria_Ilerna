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
 <div id ="subtitulo" style="background-color:peachpuff; max-width: 900px; font-size:24px" >
 		 <h3>Nuevo Plato</h3>
 	<form action="ejemplo.php" method="get">
  		<p>Descripcion  : <input id="plato" type="text" name="nombre" size="100"></p>
		<p>Precio plato : <input id="precio" type="text" name="nombre" size="15"></p>
		<p>Núm id gama: <input id="idopcion" type="number" name="nombre" size="15"></p>
   		 <input type="button" style="margin-left:500px; background-color:turquoise; font-size:100%;"; value="Grabar" onclick="grabarPlato();">
    	<input type="button" style="background-color:lightsalmon; font-size:100%;"value="Salir" onclick="location.href='http://localhost/practicas/crudplato.php';">
 		 </p>
	</form>
<script type="text/javascript">
		
	function  grabarPlato(){

		var plato=document.getElementById('plato').value;
		var precio=document.getElementById('precio').value;
		var idopcion=document.getElementById('idopcion').value;
		alert(idopcion);
		var xmlhttp;
			if(window.XMLHttpRequest) {
				xmlhttp = new XMLHttpRequest();
				} else {
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
				}
				xmlhttp.onreadystatechange = function () {
				if (this.readyState === 4 && this.status === 200) {
 				resultado= xmlhttp.responseText;
 				
 				if(resultado=="No ejecutado") {
 					alert(resultado);
 				}
				location.href="http://localhost/practicas/nuevoplato.php";
			}
		}
		xmlhttp.open("GET", "consulta_platos.php?nuevo="+'si'+"&nuevo_plato="+plato+"&nuevo_precio="+precio+"&nueva_idopcion="+idopcion, true);

		xmlhttp.send();


	}


</script>
 </div>
</body>
</html>
