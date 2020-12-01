<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// database connection will be here

// include database and object files
include_once '../funcion/db.php';
include_once '../objetos/administradores.php';
 
// instantiate database and product object
$database = new Conectar();
$db = $database->conexion();
 
// initialize object
$usuarios = new administradores($db);

$data = json_decode(file_get_contents("php://input"),true);
// make sure data is not empty
if(
    !empty($data["email"]) &&
    !empty($data["clave"]) && !empty($data["nombre"]) 
){
 
 
// read products will be here
// query productsç
$administradores->nombre = $data["administrador_nombre"];
$administradores->apellido = $data["administrador_apellido"];
$administradores->email = $data["administrador_email"];
$administradores->clave = $data["administrador_clave"];
$stmt = $administradores->CrearAdministradores();


 if($stmt){   

 
    // set response code - 200 OK
    http_response_code(200);
 
    // show products data in json format
    echo json_encode(
        array("message" => "dato creado")
    );
}else{
 
    // set response code - 404 Not found
    http_response_code(404);
 
    // tell the user no products found
    echo json_encode(
        array("message" => "No products found.")
    );
}

}
// tell the user data is incomplete
else{
 
    // set response code - 400 bad request
    http_response_code(400);
 
    // tell the user
    echo json_encode(array("message" => "incompleto campos."));
}