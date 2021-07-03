<!DOCTYPE html>
<html>
<head>
	<title>LA CARTA</title>
</head>
<body>
 <div id ="titulo" style="background-color:lightsalmon; max-width: 220px;" >
		<h1>Ilerna´s Pizzas</h1>
 </div>	
 <div id ="subtitulo" style="background-color:peachpuff; max-width: 800px;">
	<h1>LA CARTA</h1>
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
		xmlhttp.open("GET", "consulta_platos.php?listar="+'si', true);

		xmlhttp.send();

		function borrarPlato(id) {


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
			

				xmlhttp.open("GET", "consulta_platos.php?opcion_borrar="+id,true);
				xmlhttp.send();
		
		 }
	}

	function editarPlato(id) {
		
		var submenu_idID="SUBMENU_ID"+id;
		var platoID="PLATO"+id;
		var precioplatoID="PRECIOPLATO"+id;
		var id_opcionID="ID_OPCION"+id;

		var borrar = "BORRAR" + id;
		var actualizar = "ACTUALIZAR" + id;
		
		var editarsubmenu_idID=submenu_idID+"-editar";
		var editarplatoID=platoID+"-editar";
		var editarprecioplatoID=precioplatoID+"-editar";
		var editarid_opcionID=id_opcionID+"-editar";

		var submenu_id=document.getElementById(submenu_idID).innerHTML; 
		var plato=document.getElementById(platoID).innerHTML;
		var precioplato=document.getElementById(precioplatoID).innerHTML;
		var id_opcion=document.getElementById(id_opcionID).innerHTML;
		
		var parent= document.querySelector("#" + submenu_idID);

		if (parent.querySelector("#" + editarsubmenu_idID) === null ) {

			document.getElementById(platoID).innerHTML = '<input type ="text" id="'+editarplatoID+'" value="'+plato+'">';
			document.getElementById(precioplatoID).innerHTML = '<input type ="text" id="'+editarprecioplatoID+'" value="'+precioplato+'">';
			document.getElementById(id_opcionID).innerHTML = '<input type ="text" id="'+editarid_opcionID+'" value="'+id_opcion+'">';

			document.getElementById(borrar).disabled="true";
			document.getElementById(actualizar).style.background="lightgreen";
			document.getElementById(actualizar).style.display="block";
		}
	}

	function actualizarPlato(id) {

				var confirmar=confirm("Actualizar Opcion ?");

				if (confirmar) {

				var plato_a= document.getElementById("PLATO"+id+"-editar").value;
				var precio_a= document.getElementById("PRECIOPLATO"+id+"-editar").value;
				var id_opcion_a= document.getElementById("ID_OPCION"+id+"-editar").value;
				
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
					xmlhttp.open("GET", "consulta_platos.php?idplato_a="+id+"&plato_a="+plato_a+"&precio_a="+precio_a+"&id_opcion_a="+id_opcion_a,true);
					xmlhttp.send();
				} else {
				
					location.reload();
			}
		}

		function nuevoPlato(){
 			
 			location.href="http://localhost/practicas/nuevoplato.php";
	}

		function goHome(){

			location.href="http://localhost/practicas/index.php";
		}
		
	</script>
</body>
</html>