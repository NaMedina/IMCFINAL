/**
 * 
 * @ Por Nahum Ramirez Medina
 * @version 1.0
 */


<?php
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
			  		<div><h2 style="text-align: center;">Reportes de Peso de Empleados</h2></div>
			  		<h4 style="padding: 30px">Reporte general del peso de los Empleados</h4>
			  		
			  		<div class="control-group">
			  		<!--<label class="control-label" for="Nombre" style="padding-left:700px; font-size: 15px;">Nombre</label>
						<input type="text" name="Nombre" placeholder="Nombre/Apellido" 
						style="border-radius: 6px; width:210px; height:20px;
						background: #fff; font-size:15px;
						box-shadow: 0 0 2px 0px #B0B0B0;
						color:#343434;
						-moz-box-shadow: 0 0 2px 0px #B0B0B0;
    					-webkit-box-shadow: 0 0 2px 0px #B0B0B0;" />
						</span>
						<button class="btn btn-info" onClick="parent.location='#'" 
						style="height: 30px;
							width: 80px;
							border:0;
							color: white;
							font-size:16px;
							border-radius:4px;
							cursor:pointer;">Buscar</button>
						<div class="controls"></div>-->
					
			  		<br>
			  		<br>
			  		<table  class="table table-striped table-bordered">
	                <thead>
	                  <tr>
	                  <th style="text-align: center;">No.</th>
	                     <th style="text-align: center;"> Nombre </th>
	                     <th style="text-align: center;">Apellido</th>
	                     <th style="text-align: center;">Matricula</th>
	                     <th style="text-align: center;">Peso</th>
	                  </tr>
	                </thead>

	                <tbody>
                  
					<?php	  
						require_once("includes/conexion_database.php");
						$query1 = "SELECT * FROM datos, persona, diagnostico WHERE datos.id_persona=persona.id_persona and diagnostico.num_consulta GROUP BY datos.peso_actual>=0";
						//$resultados = mysql_query ($query);
				      	$resultados = $mysqli->query($query1);
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
			                <td><?php echo $rowTotal["matricula"]; ?> </td>
			                <td><?php echo $rowTotal["peso_actual"]; ?> </td>
			                
			            	<?php 
								$persona=$rowTotal["id_persona"];
								$query2 = "SELECT persona.id_persona, diagnostico.imc  FROM persona, diagnostico WHERE persona.id_persona=diagnostico.id_persona and diagnostico.imc";
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



	                </table><br><br><br>
					</div>

			  	</td>
		</tr>
    </table>
</div>	


<?php require_once("includes/footer.php"); ?>

/**
 * @ Por Nahum Ramirez Medina
 * @version 1.0
 */