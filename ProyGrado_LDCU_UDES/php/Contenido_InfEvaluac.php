<?php
 
    //session_start();
 
    //echo "Hola " . $_SESSION['usuario'];
 
    //<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"/>   
    
    include("datos.php");
    include("funciones.php");

    $cons_usuario="root";
    $cons_contra="";
    $cons_base_datos="BDProyGrado_MySQL";
    $cons_equipo="127.0.0.1";

    $obj_conexion = mysqli_connect($cons_equipo,$cons_usuario,$cons_contra) or die("Error al conectar " . mysqli_connect_error() . " !");
    mysqli_select_db($obj_conexion, 'BDProyGrado_MySQL') or die ("Error al seleccionar la Base de datos: " . mysqli_error($obj_conexion));
 
    $result = mysqli_query($obj_conexion, "SELECT * from EvalPostCompet");
?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"/>
<head>
    <title>Resultados Evaluaciones Post Competencias y Comprensión de Lectura</title>
    <style TYPE="text/css">
            <!--
            BODY {
                background: #EEECE1;
                color: black;
            }
            
            #navegador ul{
                list-style-type: none;
                text-align: center;
            }
            #navegador li{
                display: inline;
                text-align: center;
                margin: 0 10px 0 0;
            }
            #navegador li a {
                padding: 88px 7px 2px 7px;
                color: #666;
                background-color: #eeeeee;
                border: 1px solid #ccc;
                text-decoration: none;
            }
            #navegador li a:hover{
                background-color: #333333;
                color: #ffffff;
            }
    </style>
<head>
<div class="table-responsive" id="navegador"> 
   
        <center>
        <h3><b>Resultados de Evaluaciones Post Competencias y Comprensión de Lectura</b></h3><br>
 
<table class="table table-bordered table-striped">
 
<thead> 
 
<tr>
              <!-- definimos cabeceras de la tabla --> 
 
<th>Fecha Evaluación</th>
<th>Nombre Estudiante</th>
<th>Nota Evaluación</th>
<th>Número Respuestas Evaluación</th>
<th>Respuestas Correctas</th>
<th>Respuestas Erradas</th>
<th>Sexo Estudiante</th>
 
</tr>
 
</thead>
 
 
<tbody>
	<?php
            //recorremos resultado de la consulta y añadimos el contenido a la tabla
            //if (mysqli_num_rows($result) > 0) {
            if ($result == TRUE) {
            while($row= mysqli_fetch_assoc($result)) 
            {
?>
<tr>
<td><?php echo $row['fecha_evaluac']?></td>
<td><?php echo $row['nombre_est']?></td>
<td><?php echo $row['nota_evaluac']?></td>
<td><?php echo $row['num_resp_evaluac']?></td>
<td><?php echo $row['resp_correct']?></td>
<td><?php echo $row['resp_erradas']?></td>
<td><?php echo $row['sexo_est']?></td>
</tr>
<?php } ?>
<?php } ?>
</tbody>
 
</table>

 
<table class="table table-bordered table-striped">
 
<thead> 
<br>
<br>
<tr>
              <!-- definimos cabeceras de la tabla --> 
 
<th>Fecha Evaluación</th>
<th>Nombre Estudiante</th>
<th>Nota Evaluación</th>
<th>Número Respuestas Evaluación</th>
<th>Respuestas Correctas</th>
<th>Respuestas Erradas</th>
<th>Sexo Estudiante</th>
 
</tr>
 
</thead>
 
<tbody>
	<?php
            $result = mysqli_query($obj_conexion, "SELECT * from EvalComprLect");
            if ($result == TRUE) {
            while($row= mysqli_fetch_assoc($result)) 
            {
?>
<tr>
<td><?php echo $row['fecha_evaluac']?></td>
<td><?php echo $row['nombre_est']?></td>
<td><?php echo $row['nota_evaluac']?></td>
<td><?php echo $row['num_resp_evaluac']?></td>
<td><?php echo $row['resp_correct']?></td>
<td><?php echo $row['resp_erradas']?></td>
<td><?php echo $row['sexo_est']?></td>
</tr>
<?php } ?>
<?php } ?> 
</tbody>
 
</table>

</center>
</div>


