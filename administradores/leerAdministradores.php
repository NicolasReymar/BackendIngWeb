<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// database connection will be here

// include database and object files
include_once '../funcion/db.php';
include_once '../objetos/administrador.php';
 
// instantiate database and product object
$database = new Conectar();
$db = $database->conexion();
 
// initialize object
$padministrador = new padministrador($db);
 
// read products will be here
// query products
$stmt = $padministrador->ListarPadministrador();
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
            "administrador_descripcion" => $row["administrador_descripcion"],
            "administrador_precio" => $row["administrador_precio"],
            "administrador_nombre" => $row["administrador_nombre"],
            "administrador_categoria" => $row["administrador_categoria"]
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