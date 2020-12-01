<?php

class usuarios{

// Declaramos las variables privadas
private $conn;
private $table_name = "usuarios";


public $usuarios;
// constructor with $db as database connection
public function __construct($db){
  $this->conn = $db;
}

    // object properties
 
  public $nombre;
  public $apellido;
  public $rut;
  public $clave;
  public $direccion;
  public $correo_electronico;
  public $clave;
  


  //Leer
  public function ListarUsuarios(){
              // select all query
              $query = "SELECT
                      usuario_id,
                      usuario_nombres,
                      usuario_apellidos,
                      usuario_clave,
                      usuario_email,
                      usuario_rut,
                      usuario_direccion
          FROM
           " . $this->table_name;

          // prepare query statement
          $stmt = $this->conn->query($query);

          // execute query
          //$stmt->fetch_assoc();

          return $stmt;
  }

  //leer un dato especifico

  public function LeerUsuarios(){
       // select all query

     $this->correo_electronico=htmlspecialchars(strip_tags($this->correo_electronico));
     $this->clave=md5(htmlspecialchars(strip_tags($this->clave)));
            $query = "SELECT
                      usuario_id,
                      usuario_nombre,
                      usuario_apellido,
                      usuario_clave, 
                      usuario_rut,
                      usuario_direccion,
                      usuario_email
          FROM
           " . $this->table_name. " where usuario_email='$this->correo_electronico' and usuario_clave='$this->clave'";

          // prepare query statement
          $stmt = $this->conn->query($query);

          // execute query
          //$stmt->fetch_assoc();

          return $stmt;
  }



  public function CrearUsuarios(){

       // sanitize
   $this->apellido=htmlspecialchars(strip_tags($this->apellido));
   $this->nombre=htmlspecialchars(strip_tags($this->nombre));
   $this->rut=htmlspecialchars(strip_tags($this->rut));
   $this->direccion=htmlspecialchars(strip_tags($this->direccion));
   $this->email=htmlspecialchars(strip_tags($this->email));
   $this->clave=md5(htmlspecialchars(strip_tags($this->clave)));
  
      // select all query
      $query = "INSERT INTO
                      " . $this->table_name . "(usuario_nombre, usuario_apellido, usuario_rut, usuario_direccion, usuario_email,usuario_clave, usuario_estado)values('$this->nombre','$this->apellido', '$this->rut', '$this->direccion','$this->correo_electronico','$this->clave','1')"; //el estado del usuario será de 1 para saber que esta activo
       
   
   // execute query

   $stmt = $this->conn->query($query);
   if($stmt){
       return true;
   }
   return false;
  }


public function EliminarUsuarios(){
  // select all query
  $usuario_id = $_SESSION['usuario_id'];
                                              //El usuario no se elimina, sino se modifica su estado, para no quedar visible
  $consulta = "UPDATE usuarios
            SET
            usuario_estado = '-1'                    
            WHERE usuario_id = '$usuario_id'
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

public function ModificarUsuarios(){

  // sanitize
  $this->apellido=htmlspecialchars(strip_tags($this->apellido));
  $this->nombre=htmlspecialchars(strip_tags($this->nombre));
  $this->rut=htmlspecialchars(strip_tags($this->rut));
  $this->direccion=htmlspecialchars(strip_tags($this->direccion));
  $this->email=htmlspecialchars(strip_tags($this->email));
  $this->clave=md5(htmlspecialchars(strip_tags($this->clave)));

$usuarios_id = $_SESSION['usuarios_id'];
 // select all query
 $query = "UPDATE usuarios
           SET   usuario_apellido = '$this->apellido',
                 usuario_nombre = '$this->nombre',
                 usuario_rut = '$this->rut',
                 usuario_direccion = '$this->direccion',
                 usuario_email =  '$this->email',
                 usuario_clave = '$this->clave'
          WHERE  usuario_id = '$usuario_id'
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