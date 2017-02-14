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

$target_dir = "uploads/";
$target_file = $_FILES["address"]["name"];
$file = fopen($target_file, "wb");


$file = fopen($target_file, "rb");
$contents = fread($file, filesize($filename));
var_dump($file);
var_dump($contents);
fclose($file);

    
    
    //contributor_id,name,address,date,royalty_id,rating,size,description,level
    
    //if ($uploadOk){

        
        
        //if (isset($_SESSION['uploadOk']) and $_SESSION['uploadOk']==1){
            $statement = $db->prepare("INSERT INTO pixelArt(contributor_id,name,address,date,royalty_id,rating,size,description,level) VALUES (1,:name,:address,:date,:royalty_id,:rating,:size,:description,:level)");
            
	      
	        $statement->bindValue(':name',htmlspecialchars($_POST['name']));
	        $statement->bindValue(':address',htmlspecialchars($file));
	        $statement->bindValue(':date',htmlspecialchars($_POST['date']));
	        $statement->bindValue(':royalty_id',htmlspecialchars($_POST['royalty_id']));
	        $statement->bindValue(':rating',htmlspecialchars($_POST['rating']));
	        $statement->bindValue(':size',htmlspecialchars(1));
	        $statement->bindValue(':description',htmlspecialchars($_POST['description']));
	        $statement->bindValue(':level',htmlspecialchars(1));
    
            $statement->execute();
        //}
            
        
        
        
        
        
        
       // header('Location: addArt.php');
    //}
    

?>