<?php 
	
	$mysql_host='localhost';
	$mysql_user='root';
	$mysql_pass='';
	$mysql_db='practicamenu';

	$con = mysqli_connect($mysql_host, $mysql_user, $mysql_pass, $mysql_db);
	if (mysqli_connect_errno()) {

		echo "Error de conexión a la Base de Datos" . mysqli_connect_error();
	}
	@mysqli_query("SET NAMES 'utf8'");

		if (isset($_GET['opcion_borrar'])) {
			$id_borrar=$_GET['opcion_borrar'];

		$resultado=mysqli_query($con, "DELETE FROM menu WHERE id = '$id_borrar'");
		mysqli_close($con);

		} 
	
		if (isset($_GET['listar'])) {

 			
			$resultado = mysqli_query($con, "SELECT * FROM menu ");
			$contador=0;
			$menu_id="MENU_ID";
			$opcion="OPCION";
			$actualizar ="ACTUALIZAR";
			$borrar = "BORRAR";
			$table  ='<table>';
			$table .= '<tr>';
			$table .= '<th>Id</th>';
			$table .= '<th>Opcion</th>';
			$table .= '</tr>';

			if ($resultado) { 

				while ($fila = mysqli_fetch_assoc($resultado)) {
					$contador++;
					$table .= '<tr>';
					$table .= '<td width="30" id="'.$menu_id.$fila['id'].'">'.$fila['id'].'</td>';
					$table .= '<td width="450" id="'.$opcion.$fila['id'].'">' . $fila['opcion'] . '</td>';

		 			$table .= '<td><input id="'.$fila['id'].'" onclick="editarOpcion(this.id)" type = "button" style= "background-color:turquoise; font-size:100%;" value ="Editar" ></td>';

					$table .= '<td><input  id="'.$borrar.$fila['id'].'" onclick="borrarOpcion('.$fila['id'].')"  type = "button" style="background-color:lightsalmon; font-size:100%;" value ="Borrar" ></td>';

					$table .= '<td><input id="'.$actualizar.$fila['id'].'" onclick = "actualizarOpcion('.$fila['id'].')" type = "button"  value ="Actualizar" style="display:none;"></td>';
					$table .= '</tr>';
				}
				$table.= '</table>';
				$table.= '<table>';
				$table.= '<br>';
				$table.= '<button onclick="nuevaOpcion()" style= "background-color:turquoise; font-size:100%; margin-left:500px;">Agregar Opcion</button>';
				$table.= '<button onclick="goHome()" style= "background-color:lightsalmon; font-size:100%; ">Home</button>';
				$table.= '<br>';
				$table.= '</table>';
				
				
		} else { echo "error". mysqli_error($con);
					}
				echo $table;
				mysqli_close($con);
	} 

		if (isset($_GET['actualizar'])) {

			$nueva_opcion=$_GET['nueva_opcion'];
			$id_actualizar=$_GET['id_actualizar'];

			$query="UPDATE menu SET opcion = '$nueva_opcion' WHERE id = '$id_actualizar'";
			if (mysqli_query($con, $query)) {
				echo "correcto";
			} else { 
				echo "No correcto". mysqli_error($con);
			}
			mysqli_close($con); 
	}

	if (isset($_GET['nueva'])) {

	$nueva_descripcion=$_GET['nueva_descripcion'];
	
	$query="INSERT INTO menu (opcion) VALUES ('$nueva_descripcion')";

		if (mysqli_query($con, $query)) {
			
			echo "correcto";
		} else { 
			
			echo "No ejecutado".mysqli_error($con);
		}

		mysqli_close($con);
	}
?>


