


<?php
/**
 * 
 * @ Por Nahum Ramirez Medina
 * @version 1.0
 */
require_once("includes/conexion_database.php");
?>
 <?php
 	//require_once ("includes/functions.php");

 	?>
 <?php include("includes/header.php"); ?>
 <div id="cuerpo">
	<table id="estructura">
		<tr>
			<td id="menu" style="height: 750px">
			  <ul>
			  	<a href="reportes.php" style="color: white">← Volver</a><br><br>
			  </ul>
			</td>
			  	<td id="pagina">
			  		<div><h2 style="text-align: center;">Reportes de Diabetes</h2></div>
			  		<h4 style="padding: 30px">Adultos con sobrepeso (IMC de 25 o superior) que tengan otros factores de riesgo.</h4>
			  		
			  		<div class="control-group">
			  		
					</div>
			  		<br>
			  		<br>
			  		<table  class="table table-striped table-bordered">
	                <thead>
	                  <tr>
	                  <th style="text-align: center;">No.</th>
	                     <th style="text-align: center;"> Nombre </th>
	                     <th style="text-align: center;">Apellido</th>
	                     <th style="text-align: center;">Sexo</th>
	                     <th style="text-align: center;">Matricula</th>
	                     <th style="text-align: center;">Diagnostico</th>
	                  </tr>
	            </thead></td>
	                <tbody>
                  
					<?php	  
						require_once("includes/conexion_database.php");
						$query1 = "SELECT * FROM datos, persona, diagnostico WHERE datos.id_persona=persona.id_persona and diagnostico.num_consulta GROUP BY diagnostico.imc";
						//$resultados = mysql_query ($query);
				      	$resultados = $mysqli->query($query1);


				      	// condicion de error
							if (!$resultados) { $message = 'Invalid query: ' . mysql_error() . " ";
							$message .= 'Whole query: ' . $query; die($message);
						}

						while ($rowTotal = $resultados->fetch_assoc())
						{
					?>

		                <tr>
			                <td><?php echo $rowTotal["id_persona"]; ?></td>
							<td> <?php echo $rowTotal["Nombre"]; ?></td>
			                <td><?php echo $rowTotal["Apellido"]; ?> </td>
			                <td><?php echo $rowTotal["Sexo"]; ?> </td>
			                <td><?php echo $rowTotal["matricula"]; ?> </td>
			                <td><?php echo $rowTotal["imc"]; ?> </td>
			                
			                
			            	<?php 
								$persona=$rowTotal["id_persona"];
								// consulta a datos y persona
								$query2 = "SELECT persona.id_persona, persona.Nombre, persona.Apellido, persona.Sexo, persona.matricula, diagnostico.imc  FROM persona, diagnostico WHERE persona.id_persona=diagnostico.id_persona and diagnostico.imc GROUP BY diagnostico.imc<=25";
						        //$resultados = mysql_query ($query);
			                    $resultados2 = $mysqli->query($query2);
								 $rowTotal2 = $resultados->num_rows;
								
								if ($rowTotal2 == 0)
								{
								?>
								
								<?php
								}
								else
								{
								?>
								<?php
								}
								?>
								
							</td>
			                     
			                     
		                </tr>
		                    

		                    <?php
							
								}
					?>
				

			  		<?php //include("graficas/grafi1.php"); ?>

		</tbody>

			</table>
                
	   </table>
</div>

<?php require_once("includes/footer.php"); 


/**
 * @ Por Nahum Ramirez Medina
 * @version 1.0
 */
 ?>
