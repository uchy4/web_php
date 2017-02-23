<?php
    session_start();
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
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <script type="text/javascript" src="jFile.js"></script>
    <title>modArt</title>
</head>
    <body>
        
        
        <?php
            
            $user = $_SESSION['user'];
        
        
            
        try{
            $statement = $db->prepare("SELECT id FROM contributor WHERE u_name = :user_name");
            $statement->bindValue(':user_name',$user, PDO::PARAM_STR);
            $statement->execute();
            $result1 = $statement->fetchAll(PDO::FETCH_ASSOC);

            //var_dump($result);
            $check = $result1[0]['id'];
        }
        catch(PDOException $ex)
        {
        echo "ERROR connecting to DB. Details: $ex";
        die();
        }
        


        
            $statement = $db->prepare("SELECT id,name,address,date,royalty_id,rating,size,description,level FROM pixelart WHERE contributor_id = :id");
            $statement->bindValue(':id',$check, PDO::PARAM_STR);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        
        //var_dump($result);
        
            if ($result){
                foreach ($result as $r){
                    echo "
                    <form action='change.php' method='post' id='addArt' enctype='multipart/form-data'>
                        <input type='none' name='id' value='" . $r['id'] . "' style='display:none;'>
                        <input type='text' name='name' placeholder=title value='" . $r['name'] . "' required><br>
                        <input type='file' name='image' placeholder=image value='" . $r['address'] . "' required><br>
                        <input type='date' name='date' pattern='(19|20)\d\d[-](0[1-9]|1[012])[-](0[1-9]|[12][0-9]|3[01])' placeholder=date value='" . $r['date'] . "' required><br>
                        <input type='text' name='royalty_id' pattern='[1-4]{1}' placeholder=royalty_status value='" . $r['royalty_id'] . "' required><br>
                        <input type='text' name='rating' pattern='[1-4]{1}' placeholder=rating value='" . $r['rating'] . "' required><br>
                        <textarea name='description' placeholder=description value='" . $r['description'] . "' required></textarea><br>
                        <button type='submit' name='submit'>Submit</button><br><br><br>
                    </form>";
                }
            }
            else{
                echo "you have no contributions. srry.";
            }
            
        
?>
        
    
    </body>
</html>