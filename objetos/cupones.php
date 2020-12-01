<?php

class cupones{

session_start();

// Declaramos las variables privadas
private $conn;
private $table_name = "cupones";


public $cupones;
// constructor with $db as database connection
public function __construct($db){
  $this->conn = $db;
}

    // object properties
 
  public $nombre;
  public $plata;
  public $id = $_SESSION['cupones_id'];
  
  


  //Leer
  public function ListarCupones(){
              // select all query
              $query = "SELECT
                      cupon_plata,
                      cupon_nombre,
                      cliente_id
          FROM
           " . $this->table_name;

          // prepare query statement
          $stmt = $this->conn->query($query);

          // execute query
          //$stmt->fetch_assoc();

          return $stmt;
  }

  //leer un dato especifico

  public function LeerCupones(){
       // select all query

     $this->id=htmlspecialchars(strip_tags($this->id));
            $query = "SELECT
                      cupon_plata,
                      cupon_nombre,
                      cliente_id
          FROM
           " . $this->table_name. " where cupones_id='$this->id'";

          // prepare query statement
          $stmt = $this->conn->query($query);

          // execute query
          //$stmt->fetch_assoc();

          return $stmt;
  }



  public function CrearCupones(){

       // sanitize
   $this->nombre=htmlspecialchars(strip_tags($this->apellido));
   $this->precio=htmlspecialchars(strip_tags($this->nombre));
   $this->id=htmlspecialchars(strip_tags($this->id));
     
      // select all query
      $query = "INSERT INTO
                      " . $this->table_name . "(cupon_nombre, cupon_precio, cliente_id, cupon_estado)values('$this->nombre','$this->precio', '$this->id', '$this->estado','1')"; //el estado del usuario será de 1 para saber que esta activo
       
   
   // execute query

   $stmt = $this->conn->query($query);
   if($stmt){
       return true;
   }

   return false;
}
 
public function EliminarCupones(){
  // select all query
  $cupon_id = $_SESSION['cupon_id'];

  $consulta = "UPDATE cupones
            SET
            cupon_estado = '-1'                    
            WHERE cupon_id = '$cupon_id'
            ";

// prepare query statement
$stmt = $this->conn->query($consulta);

// execute query
//$stmt->fetch_assoc();

if($stmt){
  return true;
 }else{
  return false;

 }

  
}

public function ModificarCupones(){

  // sanitize
  $this->nombre=htmlspecialchars(strip_tags($this->apellido));
  $this->precio=htmlspecialchars(strip_tags($this->nombre));
  $this->id=htmlspecialchars(strip_tags($this->id));
    

$cupon_id = $_SESSION['cupon_id'];
 // select all query
 $query = "UPDATE administradores
           SET   cupon_nombre = '$this->nombre',
                 cupon_precio = '$this->apellido',
          WHERE  cupon_id = '$cupon_id'
                ";
  

// execute query

$stmt = $this->conn->query($query);
if($stmt){
  return true;
}

return false;
}

}
?>