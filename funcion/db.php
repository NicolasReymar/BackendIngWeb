<?php

include("configure.php");

class Conectar{

      //atributos
	  private $hostName;
	  private $usuario;
	  private $clave;
	  private $DBNAME;
	  protected $conexion;

	public function __construct(){  
         $this->hostName=HOTSNAME;
         $this->usuario=USUARIO;
         $this->clave=CLAVE;
         $this->DBNAME=DBNAME;
	}

    public function conexion(){

	  $this->conexion=new mysqli($this->hostName,$this->usuario,$this->clave,$this->DBNAME);

	  try{
	     $this->conexion->query("SET NAMES UTF-8");
      }catch(mysqli_sql_exception $exception){
      	 echo "Error".$exception->getMessage();
      }

	  return $this->conexion;
	  
    }

    

}  

?>