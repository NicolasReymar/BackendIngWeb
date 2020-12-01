<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// get database connection
include_once '../funcion/db.php';
include_once '../objetos/productos.php';
 
$database = new Conectar();
$db = $database->conexion();
 
$productos = new productos($db);
 
// get posted data
$data = json_decode(file_get_contents("php://input"),true);

// make sure data is not empty
if(
    !empty($data["id"]) 
){
 
    // set product property values
    $productos->descripcion = $data["producto_descripcion"];
    $productos->precio = $data["producto_precio"];
    $productos->nombre = $data["producto_nombre"];
    $productos->marca = $data["producto_marca"];
    $productos->categoria = $data["producto_categoria"];
    $productos->punto = $data["producto_punto"];
  
 
    if($productos->CrearProductos()){
 
        // set response code - 201 created
        http_response_code(201);
 
        // tell the user
        echo json_encode(array("message" => "datos creados"));
    }
 
    // if unable to create the product, tell the user
    else{
 
        // set response code - 503 service unavailable
        http_response_code(503);
 
        // tell the user
        echo json_encode(array("message" => "No se ha podido crear"));
    }
}
 
// tell the user data is incomplete
else{
 
    // set response code - 400 bad request
    http_response_code(400);
 
    // tell the user
    echo json_encode(array("message" => "incompleto campos."));
}
?>