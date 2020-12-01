<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// database connection will be here

// include database and object files
include_once '../funcion/db.php';
include_once '../objetos/cupones.php';
 
// instantiate database and product object
$database = new Conectar();
$db = $database->conexion();
 
// initialize object
$cupones = new cupones($db);
 
// read products will be here
// query products
$stmt = $cupones->ListarCupones();
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
            "cupon_nombre" => $row["cupon_nombre"],
            "cupon_precio" => $row["cupon_precio"]
            
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