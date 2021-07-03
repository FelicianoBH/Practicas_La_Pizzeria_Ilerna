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
 <div id ="subtitulo" style="background-color:peachpuff; max-width: 800px; font-size:24px" >
 		 <h3>Entre opción nueva descripción</h3>
 		<form>
  <p>OPCION: <input id="nueva" type="text" name="nombre" size="100"></p>

    <input type="button" style="margin-left:500px; background-color:turquoise; font-size:100%;"; value="Grabar" onclick="grabarOpcion();">
    <input type="button" style="background-color:lightsalmon; font-size:100%;"value="Salir" onclick="location.href='http://localhost/practicas/crudopcion.php';">
  </p>
</form>
<script type="text/javascript">
		
	function  grabarOpcion(){

		var descripcion=document.getElementById("nueva").value;
		
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
				location.href="http://localhost/practicas/nuevaopcion.php";
			}
		}
		xmlhttp.open("GET", "consulta_opciones.php?nueva="+'si'+"&nueva_descripcion="+descripcion, true);

		xmlhttp.send();


	}


</script>
 </div>
</body>
</html>
