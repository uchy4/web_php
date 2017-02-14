<?php
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
    <body>
        <?php
        

            try{
            $query = $db->query("SELECT u_name, password FROM contributor");
            }
            catch(PDOException $ex){
                
                echo "ERROR connecting to DB. Details: $ex";
                die();
                header('Location: login.php');
            }
        
            foreach ($query as $row){
                if ($_POST['user']==$row['u_name'] and $_POST['password']==$row['password']){
                    echo 'connected';
                    header('Location: home.php');
                }
                else{
                    echo 'not connected';
                }
            }
        
        
        ?>
    
    </body>
</html>