<?php
class administradores{

  session_start();

  private $conn;
  private $table_name = "administradores";

  public $administradores;

  public function __construct($db){
    $this->conn = $db;
  }

      // object properties
   
    public $nombre;
    public $apellido;
    public $email;
    public $celular;
    public $clave;
    public $rut;
 
    //Leer
    public function ListarAdministradores(){
                // select all query
                $query = "SELECT
                        administrador_id,
                        administrador_nombres,
                        administrador_apellidos,
                        administrador_celular,
                        administrador_clave,
                        administrador_rut,
                        administrador_email
            FROM
             " . $this->table_name;

            // prepare query statement
            $stmt = $this->conn->query($query);

            // execute query
            //$stmt->fetch_assoc();

            return $stmt;
    }

    //leer un dato especifico

    public function LeerAdministradores(){
         // select all query

       $this->email=htmlspecialchars(strip_tags($this->email));
       $this->clave=md5(htmlspecialchars(strip_tags($this->clave)));
              $query = "SELECT
                        administrador_id,
                        administrador_nombres,
                        administrador_apellidos,
                        administrador_celular,
                        administrador_clave,
                        administrador_rut,
                        administrador_email
                
            FROM
             " . $this->table_name. " where administrador_email='$this->email' and administrador_clave='$this->clave'";

            // prepare query statement
            $stmt = $this->conn->query($query);

            // execute query
            //$stmt->fetch_assoc();

            return $stmt;
    }



    public function CrearAdministradores(){

         // sanitize
     $this->nombre=htmlspecialchars(strip_tags($this->nombre));
     $this->apellido=htmlspecialchars(strip_tags($this->apellido));
     $this->rut=htmlspecialchars(strip_tags($this->rut));
     $this->celular=htmlspecialchars(strip_tags($this->celular));
     $this->email=htmlspecialchars(strip_tags($this->email));
     $this->clave=md5(htmlspecialchars(strip_tags($this->clave)));
    
        // select all query
        $query = "INSERT INTO
                        " . $this->table_name . "(
                        administrador_nombres,
                        administrador_apellidos,
                        administrador_celular,
                        administrador_clave,
                        administrador_rut,
                        administrador_email)
                        values('$this->nombre',
                               '$this->apellido',
                               '$this->celular',
                               '$this->clave',
                               '$this->rut',
                               '$this->rut',
                               '$this->email')";
         
     
     // execute query

     $stmt = $this->conn->query($query);
     if($stmt){
         return true;
     }
  
     return false;
}

public function EliminarAdministradores(){
  // select all query
  $administrador_id = $_SESSION['administrador_id'];

  $consulta = "UPDATE administradores
            SET
            administrador_estado = '-1'                    
            WHERE administrador_id = '$administrador_id'
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

public function ModificarAdministradores(){

  // sanitize
$this->nombre=htmlspecialchars(strip_tags($this->nombre));
$this->apellido=htmlspecialchars(strip_tags($this->apellido));
$this->rut=htmlspecialchars(strip_tags($this->rut));
$this->celular=htmlspecialchars(strip_tags($this->celular));
$this->email=htmlspecialchars(strip_tags($this->email));
$this->clave=md5(htmlspecialchars(strip_tags($this->clave)));

$administrador_id = $_SESSION['administrador_id'];
 // select all query
 $query = "UPDATE administradores
           SET   administrador_nombres = '$this->nombre',
                 administrador_apellidos = '$this->apellido',
                 administrador_celular = '$this->celular',
                 administrador_clave = '$this->clave',
                 administrador_rut =  '$this->rut',
                 administrador_email = '$this->email'
          WHERE  administrador_id = '$administrador_id'
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