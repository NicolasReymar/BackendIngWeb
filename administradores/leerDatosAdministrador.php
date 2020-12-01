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
$administradores = new administradores($db);

$data = json_decode(file_get_contents("php://input"),true);
// make sure data is not empty
if(
    !empty($data["email"]) &&
    !empty($data["clave"]) 
){
 
 
// read products will be here
// query products
$administradores->email = $data["email"];
$administradores->clave = $data["clave"];
$stmt = $administradores->Leer();
$num = $stmt->num_rows;
 
// check if more than 0 record found
if($num>0){
 
    // products array
    $products_arr=array();
    $products_arr["records"]=array();
 
    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch_assoc()){
        // extract row
        // this will make $row['name'] to
        // just $name only
    
        $product_item=array(
            "administrador_id" => $row["administrador_id"],
            "administrador_apellido" => $row["administrador_apellido"],
            "administrador_nombre" => $row["administrador_nombre"],
            "administrador_email" => $row["administrador_email"]
        );
 
        array_push($products_arr["records"], $product_item);
    }
 
    // set response code - 200 OK
    http_response_code(200);
 
    // show products data in json format
    echo json_encode($products_arr);
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