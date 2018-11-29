<?php
class Service{
    public function listServices(){
        try{
            // Conectem a la base de dades utilitzant les credencials de dbconfig.php
            require "dbconfig.php";
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
    public function addService($name, $price, $image){
        try{
            require "dbconfig.php";
            $ConnectionString="mysql:host=".$dbhost["host"].";dbname=".$dbhost['db'];
            $db = new PDO($ConnectionString, $dbhost["user"], $dbhost["password"]);

            // Faig una primera consulta per tal de comprovar si ja hi ha un servei
            // a la base de dades amb el nom introduit.
            $checkservice = $db->prepare('SELECT * FROM Servicios WHERE nombre = ? LIMIT 1');
            $checkservice->execute(array($name));
            $existeixnom=$checkservice->fetch();
            
            // Si te valor la variable existeixnom, és a dir, si ha tingut èxit
            // la consulta i sh'a trobat una coincidencia, ens mostrarà un error
            // Si no hi han coincidencies, entrarà al else i crearà el servei
            if ($existeixnom){
                echo "Ya hay un servicio con el nombre introducido";
            }
            else{
                $createservice = $db->prepare("INSERT INTO Servicios (`id_servicio`, `nombre`, `precio_por_slot`, `imagen`) VALUES (NULL, ?, ?, ?)");
                $createservice->execute(array($name, $price, $image));
                header("location: registrationsuccess.php");
            }
            $db=null;
        }
        catch (Exception $e){
            echo("Error:".$e->getMessage());
            $db=null;
        }
    }
}
?>