<!DOCTYPE html>
<html>
<head>
	<title>OPCIONES DE MENU</title>
</head>
<body>
 <div id ="titulo" style="background-color:lightsalmon; max-width: 220px;" >
		<h1>Ilerna´s Pizzas</h1>
 </div>	
 <div id ="subtitulo" style="background-color:peachpuff; max-width: 800px;">
	<h1>OPCIONES DE MENU</h1>
	<div id="crud" style="font-size:130%;"></div>
 </div>

	<script type="text/javascript">
		var resultado=document.getElementById("crud");
		var xmlhttp;
			if(window.XMLHttpRequest) {
				xmlhttp = new XMLHttpRequest();
				} else {
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
				}
				xmlhttp.onreadystatechange = function () {
				if (this.readyState === 4 && this.status === 200) {
 				resultado.innerHTML = xmlhttp.responseText;
				}
		}
		xmlhttp.open("GET", "consulta_opciones.php?listar="+'si', true);

		xmlhttp.send();

		function borrarOpcion(id) {


			var respuesta = confirm("Estas seguro de borrar esta Opcion?");
			
			if (respuesta ===true ) {

				var xmlhttp;

				if(window.XMLHttpRequest) {
					
					xmlhttp = new XMLHttpRequest();

					} else {

					xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");

					}
				
				xmlhttp.onreadystatechange = function () {

				if (this.readyState === 4 && this.status === 200) {

							var meresponde=xmlhttp.responseText;
							var mensaje=meresponde;
							
							if (mensaje.includes("No ejecutado")) {
								alert(meresponde);
							}
			 				 	location.reload();
						}
				}
			

				xmlhttp.open("GET", "consulta_opciones.php?opcion_borrar="+id,true);
				xmlhttp.send();
		
		 }
	}

	function editarOpcion(id) {

		var menu_idID="MENU_ID"+id;
		var opcionID="OPCION"+id;
		var borrar = "BORRAR" + id;
		var actualizar = "ACTUALIZAR" + id;
		
		var editarmenu_idID=menu_idID+"-editar";
		var editaropcionID=opcionID+"-editar";

		var menu_id=document.getElementById(menu_idID).innerHTML; 
		var opcion=document.getElementById(opcionID).innerHTML;

		var parent= document.querySelector("#" + menu_idID);

		if (parent.querySelector("#" + editarmenu_idID) === null ) {

			document.getElementById(opcionID).innerHTML = '<input type ="text" id="'+editaropcionID+'" value="'+opcion+'">';
			
			document.getElementById(borrar).disabled="true";
			document.getElementById(actualizar).style.background="lightgreen";
			document.getElementById(actualizar).style.display="block";
		}
	}

	function actualizarOpcion(id) {

				var confirmar=confirm("Actualizar Opcion ?");

				if (confirmar) {

				var opcion_actualizada= document.getElementById("OPCION"+id+"-editar").value;

				var xmlhttp;
				if(window.XMLHttpRequest) {
					xmlhttp = new XMLHttpRequest();
				} else {
					xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
				}
				
				xmlhttp.onreadystatechange = function () {

					if (this.readyState === 4 && this.status === 200) {

			 				var meresponde=xmlhttp.responseText;
							var mensaje=meresponde;

							if (mensaje.includes("No ejecutado")) {
								alert(meresponde);
							}
								
			 				 	location.reload();
						}

					}

					xmlhttp.open("GET", "consulta_opciones.php?actualizar="+id+"&nueva_opcion="+opcion_actualizada+"&id_actualizar="+id,true);
					xmlhttp.send();
				} else {
				
					location.reload();
			}
		}

		function nuevaOpcion(){
 			
 			location.href="http://localhost/practicas/nuevaopcion.php";
	}

		function goHome(){

			location.href="http://localhost/practicas/index.php";
		}
		
	</script>
</body>
</html>