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
$target_dir = "uploads/";
$filename = $_FILES["image"]["tmp_name"];
$handle = fopen($filename, "r"); 
$fsize = filesize($filename); 
$contents = fread($handle, $fsize); 
$byteArray = unpack("H*",$contents); 
//$byteArray = addslashes($contents);
fclose($handle);

//$data = pack("H*", pg_unescape_bytea($contents));
// $data;


$binary = file_get_contents($filename);
$base64 = base64_encode($binary);
$base64 = pg_escape_bytea($binary);
//var_dump($base64);

$new = addslashes($contents);
$new = base64_decode($new);

var_dump($new);

//print_r($byteArray); 
for($n = 0; $n < 16; $n++)
{ 
    //echo $byteArray [$n].'<br/>'; 
}
    //$safe_string_to_store = pg_escape_bytea($byteArray);
    

    $check = getimagesize($filename);
    if($check) {
        
            $id = $_SESSION['user_id'];
        
        //if (isset($_SESSION['uploadOk']) and $_SESSION['uploadOk']==1){
            $statement = $db->prepare("INSERT INTO pixelArt(contributor_id,name,address,date,royalty_id,rating,size,description,level) VALUES (:contributor_id,:name,:address::bytea,:date,:royalty_id,:rating,:size,:description,:level)");
            
	      
	        $statement->bindValue(':contributor_id',htmlspecialchars($id));
	        $statement->bindValue(':name',htmlspecialchars($_POST['name']));
	        $statement->bindValue(':address',$new, PDO::PARAM_LOB);
	        $statement->bindValue(':date',htmlspecialchars($_POST['date']));
	        $statement->bindValue(':royalty_id',htmlspecialchars($_POST['royalty_id']));
	        $statement->bindValue(':rating',htmlspecialchars($_POST['rating']));
	        $statement->bindValue(':size',htmlspecialchars(1));
	        $statement->bindValue(':description',htmlspecialchars($_POST['description']));
	        $statement->bindValue(':level',htmlspecialchars(1));
    
            $statement->execute();
    }
    else{
            echo "File is not an image.";
    }
        //}
            
        
        
        
        
        
        
       // header('Location: addArt.php');
    //}
    

?>