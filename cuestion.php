

<?php

/**
 * @ Por Nahum Ramirez Medina
 * @version 1.0
 */ 
 if (isset($_GET["person"])) {
  $persona_selec = $_GET["person"];
 }
    
 ?>
 <?php include("includes/header.php"); ?>

<div id="cuerpo" style="height: 1520px">
<table id="estructura">
    <tr>
      <td id="menu">
        <ul>
          <a href="content.php" style="color: white">← Volver</a><br><br>
        </ul>
      </td>
          <td id="pagina">
            <div><h2 style="text-align: center;">Cuestionario IMC UNAV</h2></div>



    <div class="main-inner">
    <!--<meta charset="utf-8">-->
        <div class="container">
          <div class="row">
            <div class="span6">
            </div>
        <!-- /span6 -->
        <div class="span6">
        </div>
          
          <!-- /widget -->
          
          <!-- /widget -->
          <div class="widget widget-table action-table" style="width:100%">
            <div class="widget-header"> 
              <i class="icon-th-list"></i>
              <h3>&nbsp;&nbsp;Cuestionario de valoración de Riesgos:</h3>
            </div>
           
            <!-- /widget-header -->
            <div class="widget-content">
            <form method="post" action="guardar_cuest.php?id_per=<?php echo $per; ?>" autocomplete="on">
           
<table class="table table-striped table-bordered">
                <thead>
                  

                  <tr>
                  <th>No.</th>
                    <th align="center"> Preguntas </th>
                    <th align="center">Respuestas</th>
                  </tr>
                </thead>

  <tbody>
                 <?php 
                 //echo "<meta http-equiv="Content-Type" content= "text/html; charset=utf-8" />";                
      require ("includes/conexion_database.php") ;
      
        
      $query1 = "SELECT * FROM  enfermeria.preguntas";
      //$resultados = mysql_query($query);
      $resultados = $mysqli->query($query1);
      if (!$resultados) {
    $message = 'Invalid query: ' . mysql_error() . " ";
    $message .= 'Whole query: ' . $query;
    die($message);
    }



      while ($rowTotal=$resultados->fetch_assoc())
      {
        ?>
  <tr>
          <td><?php echo $preg=$rowTotal["id_preguntas"]; ?></td>
      <td> <?php echo $rowTotal["pregunta"]; ?></td>

  <td>
          
          <?php
                $id_pregunta=$rowTotal["id_preguntas"];
                $query2="SELECT * FROM  enfermeria.respuestas where id_preguntas =$preg";
                $query3="SELECT * FROM  enfermeria.respuestas where id_preguntas = 16";
                //$resultados = mysql_query($query);
                $resultados2 = $mysqli->query($query2);
                while ($rowTotal2 = $resultados2->fetch_assoc())
                  { 
                $resp=$rowTotal2["id_Respuestas"];
          ?>
    <div class="control-group">
           <input name="respuesta<? echo $preg; ?>" type="checkbox" placeholder = "<? echo$resp; ?>" required>
            <?php
                echo $rowTotal2["Respuestas"]; 

             }
         
            ?>
        <input type="hidden"  name="pregunta<? echo $id_pregunta; ?>" value="<? echo $id_pregunta; ?>">
           
    </div>
                  <?php
          
      }
      
      ?>
                  
                
  
              </table>
                
           
              
            </div>
        <div class="form-actions">
        <button class="btn btn-success" name="boton"><i class="icon-medium icon-check"></i> Enviar</button>
          </li>
            </div>
    </form>



            </div>
          <!-- /widget --> 
          
          <!-- /widget -->
        </div>
        <!-- /span6 --> 
      </div>
      <!-- /row --> 
    </div>
    <!-- /container --> 
  </div>

          </td>
    </tr>
  </table>
    </tbody>

<script src="../../js/jquery-1.7.2.min.js"></script>
  
<script src="../../js/bootstrap.js"></script>
<!--<script src="../../js/base.js"></script>-->

 


<?php require_once("includes/footer.php"); 
/**
 * @ Por Nahum Ramirez Medina
 * @version 1.0
 */

?>
   