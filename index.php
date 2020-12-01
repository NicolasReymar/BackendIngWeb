<?
include_once 'funcion/db.php';

$ metodo = $ _SERVER [ 'REQUEST_METHOD' ];

cambiar ( $ metodo ) {
    caso  'OBTENER' :
        header ( 'Ubicación: usuarios / leer.php' );
    romper ;

    caso  'POST' :
        header ( 'Ubicación: usuarios / crear.php' );
    romper ;

    caso 

    


}

?>