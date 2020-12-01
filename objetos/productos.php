<?php

class productos{

// Declaramos las variables privadas
private $conn;
private $table_name = "productos";


public $productos;
// constructor with $db as database connection
public function __construct($db){
  $this->conn = $db;
}

    // object properties
 
  public $descripcion;
  public $precio;
  public $nombre;
  public $punto; //cuantos puntos recibira por producto (%10)
  public $categoria;
  public $marca;
  public $imagen;
  public $id = $_SESSION['producto_id']; // se recibe por variable global el id del producto 
  


  //Leer
  public function ListarProductos(){
              // select all query
              $query = "SELECT
                        producto_id,
                        producto_descripcion,
                        producto_precio, 
                        producto_nombre,
                        ((producto_punto*10)/100), 
                        producto_categoria,
                        producto_marca, 
                        producto_imagen
                        FROM
                  " . $this->table_name;

          $stmt = $this->conn->query($query);

        
          return $stmt;
  }

  //leer un dato especifico

  public function LeerProductos(){
       // select all query

     $this->id=htmlspecialchars(strip_tags($this->id));
            $query = "SELECT
                      producto_id,
                      producto_descripcion, 
                      producto_precio, 
                      producto_nombre, 
                      producto_punto,
                      producto_categoria,
                      producto_marca
          FROM
           " . $this->table_name. " where producto_id ='$this->id'";

          // prepare query statement
          $stmt = $this->conn->query($query);

          // execute query
          //$stmt->fetch_assoc();

          return $stmt;
  }



  public function CrearProductos(){

       // sanitize
   $this->descripcion=htmlspecialchars(strip_tags($this->descripcion));
   $this->precio=htmlspecialchars(strip_tags($this->precio));
   $this->nombre=htmlspecialchars(strip_tags($this->nombre));
   $this->puntos=htmlspecialchars(strip_tags($this->puntos));
   $this->categoria=htmlspecialchars(strip_tags($this->categoria));
   $this->marca=htmlspecialchars(strip_tags($this->marca));
   $this->imagen=htmlspecialchars(strip_tags($this->imagen));
  
      // select all query
      $query = "INSERT INTO
                      " . $this->table_name . "(
                                 producto_descripcion, 
                                 producto_precio, 
                                 producto_nombre, 
                                 producto_punto,
                                 producto_categoria,
                                 producto_marca
                           )values('$this->descripcion',
                                   '$this->precio', 
                                   '$this->nombre',
                                   '$this->punto',
                                   '$this->categoria',
                                   '$this->marca')";
       
   
   // execute query

   $stmt = $this->conn->query($query);
   if($stmt){
       return true;
   } else{
    
    return false;    
   }

  
  }

  public function EliminarProductos(){
    // select all query
    $producto_id = $_SESSION['producto_id'];
                                                //El producto no se elimina, sino se modifica su estado, para no quedar visible
    $consulta = "UPDATE productos
              SET
              producto_estado = '-1'                    
              WHERE producto_id = '$producto_id'
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

  public function ModificarProductos(){

    // sanitize
    $this->descripcion=htmlspecialchars(strip_tags($this->descripcion));
    $this->precio=htmlspecialchars(strip_tags($this->precio));
    $this->nombre=htmlspecialchars(strip_tags($this->nombre));
    $this->puntos=htmlspecialchars(strip_tags($this->puntos));
    $this->categoria=htmlspecialchars(strip_tags($this->categoria));
    $this->marca=htmlspecialchars(strip_tags($this->marca));
  
  $producto_id = $_SESSION['producto_id'];
   // select all query
   $query = "UPDATE productos
             SET   producto_descripcion = '$this->descripcion',
                   producto_precio = '$this->precio',
                   producto_nombre = '$this->nombre',
                   producto_punto = '$this->puntos',
                   producto_categoria =  '$this->categoria',
                   producto_marca = '$this->marca'
            WHERE  producto_id = '$producto_id'
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