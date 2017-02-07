<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Pixel Art</title>
</head>
<body>
    
<?php
//connect to the database
    
//db variables
$dbUser = 'tester';
$dbPassword = 'tester_password';
$dbName = 'postgres';
$dbHost = 'localhost';
$dbPort = '5432';
    
try {
    $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
}
catch (PDOException $ex){
    //dont issues this while in production
    echo "<p>error connecting to database: $ex</p>\n\n";
    die();
}   
    
$id = "";
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_GET["contributor_id"];
}
//Issue the query
$na = "";
$name = $db->query("SELECT u_name FROM contributor WHERE id = $id");
foreach ($name as $n){
    $na = $n['u_name'];
}

$query = $db->query("SELECT name, address, date, royalty_id, rating, size, description FROM pixelart WHERE contributor_id = $id");
    
//Display the results
//var_dump($query);
echo "<h1>$na's Artwork:</h1>";
foreach ($query as $row){
    echo "<div><div><table><tr><td>temp image @:" .  $row['address'] . "</td></tr></table></div>";
    echo "<div><table><tr><td><b>Name: </b>" . $row['name'] . "</td></tr>" .
        "<tr><td><b>Uploaded: </b>" . $row['date'] . "</td></tr>" . 
        "<tr><td><b>Royalty Level: </b>" . $row['royalty_id'] . "</td></tr>" . 
        "<tr><td><b>Rating: </b>" . $row['rating'] . "</td></tr>" . 
        "<tr><td><b>Size: </b>" . $row['size'] . "</td></tr>" . 
        "<tr><td><b>Description: </b>" . $row['description'] . "</td></tr></table>";
    echo "</div></div>";
}
    
    
    
    
//Display the results
    
?>
    
    </body>
</html>