<?php 

class accesoBD {

   
   
     function conectar() {

        $this->errormsg ="";
        $db_host="localhost";
        $db_nombre="ong"; //Nombre de la BD en phpmyadmin
        $db_usuario="root"; //usuario y contraseña       por defecto apache de xampp
        $db_contra="";

        $this->conexion = mysqli_connect($db_host, $db_usuario, $db_contra, $db_nombre) or die("Error de conexion con MySQL Server");
        if (!$this->conexion) {
            $this->errormsg = "Fallo al conectar a MySQL: " . mysqli_connect_error();
            echo $this->errormsg;
        }

        $_SESSION['conexion'] = $this;

        return $this;
	}
  

  
//-----------------------------------------------------------------------------------------
//							 PUBLICAS	
//----------------------------------------------------------------------------------------- 


    /**
     * @return _accesoBD
     * Si ya existe la conexion la obtiene, sino la crea y la almacena en sesion
     */
    public static function obtener(){
        //unset($_SESSION['conexion']);
        $db_host = "localhost";
        $db_nombre = "ong"; //Nombre de la BD en phpmyadmin
        $db_usuario = "root"; //usuario y contraseña       por defecto apache de xampp
        $db_contra = "";

        if(!isset($_SESSION['conexion']) || $_SESSION['conexion'] == null || $_SESSION['conexion']->conexion == false) {
            //echo "Nueva<br/>";
            $con = new accesoBD($db_nombre ,$db_usuario, $db_contra, $db_host);

        } else {
            //echo "Cargando<br/>";
            $con = $_SESSION['conexion'];

        }

        /*if($_SERVER['REMOTE_ADDR'] == "213.60.3.3") {
            echo "<pre>";print_r($con);echo "</pre>";
        }*/

        return $con;
    }

    /**
     * @param $sql
     * @return bool|mysqli_result
     */
    public function _EjecutarQuery($sql) {
    	
        if($resultado = mysqli_query($this->idconexion,$sql)){
            //echo "Query OK. FIlas: "; echo $resultado->num_rows;
            return $resultado;

        } else {

            $this->errormsg = "Error Mysql: ".mysqli_error($this->idconexion);
            return false;
        }
    }


    /**
	 * @param $query_id
	 * @param $class_name string
	 * @param $params mixed
	 * @return object|stdClass
	 */
	public function fetch_object($query_id, $class_name = null, $params = null)
	{
		// $this->record = mysql_fetch_object($query_id);zz
        if ($class_name == null)
			return $query_id->fetch_object();
        else return $query_id->fetch_object($class_name, $params);

	}


    /**
     * @param $result
     * @return int
     */
    public function num_rows($result)
	{
		return ($result) ? $result->num_rows : 0;
	}



    public  function ultimoInsertado(){
        return $this->idconexion->insert_id;
    }



} // Fin _cAccesoBD

?>