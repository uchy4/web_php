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
    <h1>Contributors:</h1>
    
<?php
//connect to the database
    
//db variables
//try {
$pdo =$_SESSION["db"];
$us = $_SESSION["us"];
$pw = $_SESSION["pw"];
$db = new PDO($pdo,$us.$pw);
    
foreach ($db->query("SELECT id, u_name, access_level FROM contributor") as $row){
    echo "<p><a href=details.php?contributor_id=" . $row['id'] . ">". $row['u_name'] . "</p>";
}
//Issue the query

    
    
    
    
//Display the results
    
?>
    
    </body>
</html>