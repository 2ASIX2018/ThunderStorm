<?php
// Crearem una classe anomenada User
// Aprofitarem la classe per crear les diverses funcions que
// interactuen amb la taula d'usuaris de la base de dades
class WebUser{
    public function validateUser($user, $pass){
        try{
            // Conectem a la base de dades utilitzant les credencials de dbconfig.php
            require_once "dbconfig.php";
            $ConnectionString="mysql:host=".$dbhost["host"].";dbname=".$dbhost['db'];
            $db = new PDO($ConnectionString, $dbhost["user"], $dbhost["password"]);

            $query = $db->prepare('SELECT rol FROM Usuarios WHERE nombre = ? AND password = ?');
            $query->execute(array($user, $pass));
            $role=false;
            while($fila=$query->fetch()){
                $role=$fila[0];
            }
            $db=null;
            return $role;
        }
        catch (Exception $e){
            echo("Error:".$e->getMessage());
            $db=null;
        }
    }
    public function listUsers(){
        try{
            // Conectem a la base de dades utilitzant les credencials de dbconfig.php
            require_once "dbconfig.php";
            $ConnectionString="mysql:host=".$dbhost["host"].";dbname=".$dbhost['db'];
            $db = new PDO($ConnectionString, $dbhost["user"], $dbhost["password"]);

            $query = $db->prepare('SELECT id_usuari, nombre, email, rol FROM Usuarios ORDER BY id_usuari ASC');
            $query->execute();
            $usuarios=array();
            while($fila=$query->fetch()){
                $usuario["id_usuari"]=$fila[0];
                $usuario["nombre"]=$fila[1];
                $usuario["email"]=$fila[2];
                $usuario["rol"]=$fila[3];
                array_push($usuarios, $usuario);
            }
            $db=null;
            return $usuarios;
        }
        catch (Exception $e){
            echo("Error:".$e->getMessage());
            $db=null;
        }
    }
    public function registerUser($user, $email, $pass){
        try{
            // Conectem a la base de dades utilitzant les credencials de dbconfig.php
            require_once "dbconfig.php";
            $ConnectionString="mysql:host=".$dbhost["host"].";dbname=".$dbhost['db'];
            $db = new PDO($ConnectionString, $dbhost["user"], $dbhost["password"]);

            // Preparem i executem una consulta per comprovar si ja existeix un registre
            // amb el mateix nom d'usuari o email a la Base de dades
            $querycheck = $db->prepare('SELECT * FROM Usuarios WHERE nombre = ? OR email = ? LIMIT 1');
            $querycheck->execute(array($user, $email));
            $resultado=$querycheck->fetch();
            
            // Si te valor la variable resultat, és a dir, si ha tingut èxit la consulta
            // i sh'a trobat una coincidencia, ens mostrarà un error
            // Si no ha han coincidencies, entrarà al else i crearà l'usuari
            if ($resultado){
                echo "El usuario o email ya se encuentra registrado";
            }
            else{
                // En un entorn productiu hauríem d'encriptar la contrasenya abans d'inserirla
                // Per a aquesta finalitat podríem utilitzar la funció password_hash() de PHP
                // o la funció PASSWORD() de SQL.

                // Per habilitar l'encriptació, afegir la funció "PASSWORD(?)" tal que així:
                // "VALUES (NULL, ?, ?, ?, 'user')" ==> "VALUES (NULL, ?, ?, PASSWORD(?), 'user')"
                // Obviament, hauríem d'afegir la desencriptació a la funció de login.
                $query = $db->prepare("INSERT INTO `Usuarios` (`id_usuari`, `nombre`, `email`, `password`, `rol`) VALUES (NULL, ?, ?, ?, 'user')");
                $query->execute(array($user, $email, $pass));
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