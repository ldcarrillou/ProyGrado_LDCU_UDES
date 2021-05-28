<?php
    include("datos.php");
    include("funciones.php");
    
    $NombreECL = $_POST['Nombre'];
    $RespECL = $_POST['Resp'];
    $SexoECL = $_POST['Sexo'];
    $NumECL_correctas = $_POST['Num_correctas'];
    $RespECL_correctas = $_POST['Resp_correctas'];
    $RespECL_erradas = $_POST['Resp_erradas'];
    $date = date('Y-m-d H:i:s');

    //$cons_usuario="root";
    //$cons_contra="";
    //$cons_base_datos="BDProyGrado_MySQL";
    //$cons_equipo="127.0.0.1";

    if(isset($_POST['Nombre']) && !empty($_POST['Nombre']) &&
    isset($_POST['Sexo']) && !empty($_POST['Sexo']) /*&&
    isset($_POST['Resp']) && !empty($_POST['Resp']) &&
    isset($_POST['Num_correctas']) && !empty($_POST['Num_correctas'])*/)
    {
        //$obj_conexion = mysqli_connect($cons_equipo,$cons_usuario,$cons_contra,$cons_base_datos) or die ("No se conectó a la BD!");
        $obj_conexion = mysqli_connect($cons_equipo,$cons_usuario,$cons_contra) or die ("No se pudo establecer la conexión: " . mysqli_connect_error () . " !");
        
        // Seleccionar la base de datos
        $Sql = mysqli_select_db($obj_conexion, $cons_base_datos) or die ("Error al seleccionar la Base de datos: " . mysqli_error($obj_conexion));
        if(mysqli_query($obj_conexion, $Sql)) {
        //echo "Base de datos creada con éxito";
        } Else {
            echo "Error al seleccionar la base de datos: " . mysqli_error($obj_conexion);
        } 
        
        $var_insert= "INSERT INTO EvalPostCompet VALUES ('NULL', '$NombreECL', '$SexoECL', CURRENT_TIMESTAMP, 
        '$RespECL', '$RespECL_correctas', '$RespECL_erradas', '$NumECL_correctas')";
        $var_resultado = mysqli_query($obj_conexion, $var_insert);

        mysqli_close($obj_conexion);

        echo "Datos Enviados Correctamente";
        } else {
            echo "Error al Enviar los Datos";
    }
?>