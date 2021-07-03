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

		$resultado=mysqli_query($con, "DELETE FROM submenu WHERE idplato = '$id_borrar'");
		
		if (mysqli_query($con, $query)) {
				
				echo "correcto";
			} else { 
				echo "No correcto". mysqli_error($con);
			}
			mysqli_close($con); 
		} 
	
		if (isset($_GET['listar'])) {

 			
			$resultado = mysqli_query($con, "SELECT * FROM submenu ");
			$contador=0;

			$submenu_id="SUBMENU_ID";
			$plato="PLATO";
			$precioplato="PRECIOPLATO";
			$id_opcion="ID_OPCION";

			$actualizar ="ACTUALIZAR";
			$borrar = "BORRAR";
			$table  ='<table>';
			$table .= '<tr>';
			$table .= '<th>Id </th>';
			$table .= '<th>Plato</th>';
			$table .= '<th>Precio</th>';
			$table .= '<th>Id Opcion</th>';
			$table .= '</tr>';

			if ($resultado) { 

				while ($fila = mysqli_fetch_assoc($resultado)) {
					$contador++; 
					$table .= '<tr>';
					$table .= '<td width="30" id="'.$submenu_id.$fila['idplato'].'">'.$fila['idplato'].'</td>';
					$table .= '<td width="450" id="'.$plato.$fila['idplato'].'">' . $fila['plato'] . '</td>';
					$table .= '<td width="450" id="'.$precioplato.$fila['idplato'].'">' . $fila['precioplato'] . '</td>';
					$table .= '<td width="450" id="'.$id_opcion.$fila['idplato'].'">' . $fila['idopcion'] . '</td>';
		 			$table .= '<td><input id="'.$fila['idplato'].'" onclick="editarPlato(this.id)" type = "button" style= "background-color:turquoise; font-size:100%;" value ="Editar" ></td>';

					$table .= '<td><input  id="'.$borrar.$fila['idplato'].'" onclick="borrarPlato('.$fila['idplato'].')"  type = "button" style="background-color:lightsalmon; font-size:100%;" value ="Borrar" ></td>';

					$table .= '<td><input id="'.$actualizar.$fila['idplato'].'" onclick = "actualizarPlato('.$fila['idplato'].')" type = "button"  value ="Actualizar" style="display:none;"></td>';
					$table .= '</tr>';
				}
				$table.= '</table>';
				$table.= '<table>';
				$table.= '<br>';
				$table.= '<button onclick="nuevoPlato()" style= "background-color:turquoise; font-size:100%; margin-left:500px;">Agregar Plato</button>';
				$table.= '<button onclick="goHome()" style= "background-color:lightsalmon; font-size:100%; ">Home</button>';
				$table.= '<br>';
				$table.= '</table>';
				
		} else { echo "error". mysqli_error($con);
					}
				echo $table;
				mysqli_close($con);
	} 

		if (isset($_GET['idplato_a'])) {

			
			$idplato_a=$_GET['idplato_a'];
			$plato_a=$_GET['plato_a'];
			$precio_a=$_GET['precio_a'];
			$id_opcion_a=$_GET['id_opcion_a'];

			$query="UPDATE submenu SET plato = '$plato_a', precioplato = '$precio_a', idopcion = '$id_opcion_a' WHERE idplato = '$idplato_a'";
			
			if (mysqli_query($con, $query)) {
				
				echo "correcto";
			} else { 
				echo "No correcto". mysqli_error($con);
			}
			mysqli_close($con); 
	}

	if (isset($_GET['nuevo'])) {

		$nuevo_plato=$_GET['nuevo_plato'];
		$nuevo_precio=$_GET['nuevo_precio'];
		$nueva_idopcion=$_GET['nueva_idopcion'];
	
		$query="INSERT INTO submenu (plato, precioplato, idopcion) VALUES ('$nuevo_plato', '$nuevo_precio', '$nueva_idopcion')";

		if (mysqli_query($con, $query)) {
			
			echo "correcto";
		} else { 
			
			echo "No ejecutado".mysqli_error($con);
		}

		mysqli_close($con);
	}
?>


