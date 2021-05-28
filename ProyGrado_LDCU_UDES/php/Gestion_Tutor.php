<?php
    include("datos.php");
    include("funciones.php");
    
    $usuario = $_POST['nnombre'];
    $pass = $_POST['npassword'];

    $cons_usuario="root";
    $cons_contra="";
    $cons_base_datos="BDProyGrado_MySQL";
    $cons_equipo="127.0.0.1";

    header('Content-Type: text/html; charset=utf-8');
    
        echo $usuario;
        echo $pass;
 
    if(empty($usuario) || empty($pass)){
        echo $usuario;
        echo $pass;
        header("Location: ../MT_5_Carrillo_L_Gestion_Tutor.html");
        exit();
    }
 
    $obj_conexion = mysqli_connect($cons_equipo,$cons_usuario,$cons_contra) or die("Error al conectar " . mysqli_connect_error() . " !");
    mysqli_select_db($obj_conexion, $cons_base_datos) or die ("Error al seleccionar la Base de datos: " . mysqli_error($obj_conexion));
 
    $result = mysqli_query($obj_conexion, "SELECT * from tutores where Username='" . $usuario . "'");
 
    if($row = mysqli_fetch_assoc($result)){
        if($row['Password'] == $pass){
            session_start();
            $_SESSION['usuario'] = $usuario;
            header("Location: Contenido_InfEvaluac.php");
            //header("Location: ../MT_5_Carrillo_L_Informac_Tutor.html");
        }else{
            header("Location: ../MT_5_Carrillo_L_Gestion_Tutor.html");
            exit();
        }
    }else{
        header("Location: ../MT_5_Carrillo_L_Gestion_Tutor.html");
        exit();
}
?>
