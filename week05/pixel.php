<?php 
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Pixel Art</title>
</head>
<body>
    <h1>Login</h1>
    
<?php
//connect to the database

    
$pswd = "";
$user = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST["username"];
    $pswd = $_POST["password"];
}


    //}
    //db variables
    $dbUser = 'tester';
    $dbPassword = 'tester_password';
    $dbName = 'postgres';
    $dbHost = 'localhost';
    $dbPort = '5432';
    $pdo = "pgsql:host=$dbHost;port=$dbPort;dbname=$dbName";
    try {
        $db = new PDO($pdo, $dbUser, $dbPassword);
    }
    catch (PDOException $ex){
        //dont issues this while in production
        echo "<p>error connecting to database: $ex</p>\n\n";
        die();
    }   
    $_SESSION["db"] = $pdo;
    $_SESSION["us"] = $dbUser;
    $_SESSION["pw"] = $dbPassword;

    echo "<p><a href=list.php>List</p>";
    echo "<p><a href=search.php>Search</p>";
    echo "<p><a href=newForm.php>New Form</p>";

    
//Display the results
    
?>
    
    
    </body>
</html>