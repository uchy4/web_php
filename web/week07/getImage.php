<?php
session_start();
        //add to db
        error_reporting(E_ALL);
        ini_set('display_errors', 1);

        $dbUser = 'tester';
        $dbPassword = 'tester_password';
        $dbName = 'postgres';
        $dbPort = '5432';
        $dbHost = 'localhost';
        try
        {
        $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
        $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        }
        catch(PDOException $ex)
        {
        echo "ERROR connecting to DB. Details: $ex";
        die();
        }

/////////////////////////////////////////
//var_dump($_FILES);
        
            $statement = $db->prepare("SELECT address FROM pixelart WHERE name = :name");
            $statement->bindValue(':name',$_POST['name'], PDO::PARAM_STR);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        
            $check = $result[0]['name'];
        
            
            header('Content-type: image/png');
            echo pg_unescape_bytea($check);
    
        //}
            
        
        
        
        
        
        
       // header('Location: addArt.php');
    //}
    

?>