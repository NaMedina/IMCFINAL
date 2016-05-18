<?php

/**
 * @ Por Nahum Ramirez Medina
 * @version 1.0
 */ 

$id_persona = $_GET["person"];
$nombre=$_REQUEST['Nombre'];
$apellido=$_REQUEST['Apellido'];
$email=$_REQUEST['email'];
$edad=$_REQUEST['edad'];
$matricula=$_REQUEST['matricula'];
$talla=$_REQUEST['talla'];
$peso=$_REQUEST['peso'];
$cintura=$_REQUEST['circ_cintura'];
$sexo=$_REQUEST['Sexo'];


// inserto los indices
 include('includes/conexion_database.php');
            /*$persona= "INSERT INTO persona (Nombre, Apellido, Sexo, matricula, email) 
VALUES ('$nombre', '$apellido','$sexo',$matricula, '$email')";*/

$persona= "UPDATE enfermeria.persona SET Nombre = '$nombre', Apellido = '$apellido', Sexo = '$sexo', matricula = '$matricula', email = '$email' WHERE persona.id_persona = $id_persona";
//echo $persona;
            $resultado = $mysqli->query($persona);
		   
		   
		   //require ("../../conf/config.php");
			//$query1 = " SELECT id_persona FROM persona WHERE Nombre='$nombre' and Apellido='$apellido' and Sexo='$sexo' and matricula='$matricula'";
			//$resultados = mysql_query ($query);
			//echo $query1;
      
//	echo  $id_persona;
		   
		   /*$datos= "INSERT INTO datos (peso_actual, talla, edad, circ_cadera, id_persona) 
VALUES ($peso, $talla, $edad, $cintura, $id_persona)";*/
			$datos= "UPDATE enfermeria.datos SET peso_actual = '$peso', talla = '$talla', edad = '$edad', circ_cintura = '$cintura' WHERE datos.id_persona = $id_persona";
         // echo $datos;
		   
				/*$sql= "INSERT INTO diagnostico (imc, ind_cintura, Fecha, id_persona) 
				VALUES ($imc, $cintura, NOW(),$id_persona)";*/

          // $resultado2 = $mysqli->query($sql);

			

// direcionas 


	if ($mysqli->query($datos)){
             header ("Location: content.php");
        } else{
              echo mysql_error();
         }

/**
 * @ Por Nahum Ramirez Medina
 * @version 1.0
 */


?>
