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

    //store session vars
    $_SESSION['user'] = $_POST['user'];
    $_SESSION['password'] = $_POST['password'];
    $_SESSION['email'] = $_POST['email'];

    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $statement = $db->prepare("INSERT INTO contributor(u_name, password, email, access_level) VALUES (:u_name, :password, :email, 1)");
    $statement->bindValue(':u_name',htmlspecialchars($_POST['user']));
    $statement->bindValue(':password',$password);
    $statement->bindValue(':email',htmlspecialchars($_POST['email']));

    $statement->execute();

    header('Location: login.php');
        
?>
    