<?php
class Service{
    public function listServices(){
        try{
            // Conectem a la base de dades utilitzant les credencials de dbconfig.php
            require_once "dbconfig.php";
            $ConnectionString="mysql:host=".$dbhost["host"].";dbname=".$dbhost['db'];
            $db = new PDO($ConnectionString, $dbhost["user"], $dbhost["password"]);

            // Preparem i executem la consulta
            $query = $db->prepare('SELECT id_servicio, nombre, precio_por_slot, imagen FROM Servicios ORDER BY nombre ASC');
            $query->execute();

            // L'array services serà el que rebrà totes les dades
            $services=array();
            while($fila=$query->fetch()){
                $service["id_servicio"]=$fila[0];
                $service["nombre"]=$fila[1];
                $service["precio_por_slot"]=$fila[2];
                $service["imagen"]=$fila[3];
                array_push($services, $service);
            }
            $db=null;
            return $services;
        }
        catch (PDOException $e){
            echo("Error:".$e->getMessage());
            $dbCon=null;
        }
    }
}
?>