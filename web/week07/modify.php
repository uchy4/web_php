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


            $statement = $db->prepare("INSERT INTO contributor(u_name, password, email, access_level) VALUES (:u_name, :password, :email, 1)");
            $statement->bindValue(':u_name',htmlspecialchars($_POST['newUser']));
            $statement->bindValue(':password',htmlspecialchars($_POST['newPassword']));
            $statement->bindValue(':email',htmlspecialchars($_POST['email']));

            $statement->execute();

            header('Location: home.php');
        
        ?>
    
    </body>
</html>