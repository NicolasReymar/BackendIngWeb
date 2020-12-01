<?php
include_once 'funcion/db.php';
include_once 'objetos/administradores.php';
include_once 'objetos/usuarios.php';

session_start();

$email   = trim($_POST['email']); // rut y la clave editar la base de dato y validar el rut como segundo id, solo puede intentar hasta 3, agregar un contador, y estado de
$clave   = trim($_POST['clave']);    
  
      $consulta_usuario =  "SELECT 
                    usuario_email, 
                    usuario_clave
                    FROM 
                    usuarios
                    WHERE usuario_email = '$email' 
                    and   usuario_clave = '$clave' 
                    Limit 1" ;


      $rs_cantidad=  mysql_query($consulta_usuario,$conexion);  //ejecutamos la consulta
      $row_cantidad= mysql_fetch_array($rs_cantidad);
      $filas = mysql_num_rows($rs_cantidad); //si devuelve una fila entonces esta bien 
      if( $filas==1){                      //ve cuantas filas devolvio, si devuelve mas de una fila entonces el usuario existe
             
           if(($_SESSION['usuario_estado'] = $row['usuario_estado'])==2){
             echo"bienvenido";
             $_SESSION['usuario_id'] = $row['usuario_id'];
             $_SESSION['usuario_rut'] = $row['usuario_rut'];
             $_SESSION['usuario_nombres'] = $row['usuario_nombres'];
             $_SESSION['usuario_apellidos'] = $row['usuario_apellidos'];
             header("location: ");   // despues redirigir a otra pagina
           }
      }else{
     $consulta_administrador= "SELECT 
                              administrador_email, 
                              administrador_clave
                              FROM 
                              administradores
                              WHERE administrador_email = '$email' 
                              and   administrador_clave = '$clave' 
                              Limit 1" ;

       $rs_cantidad_administrador=  mysql_query($consulta_administrador,$conexion);  //ejecutamos la consulta
       $row_cantidad_administrador= mysql_fetch_array($rs_cantidad_administrador);
       $filas1 = mysql_num_rows($rs_cantidad_administrador);
       if($filas==1){
              header("location: ");   // despues redirigir a otra pagina
       }
             echo"error";
             header("location:");  //despues redirigir a otra pagina
      }

       mysql_free_result($resultado);
       mysql_close ($conexion);
