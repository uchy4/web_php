
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <script type="text/javascript" src="jFile.js"></script>
    <script type="text/javascript" src="js/bootstrap-filestyle.min.js"> </script>
    <title>addArt</title>
</head>
    <body>
        
    
        <form action='upload.php' method='post' id='addArt' enctype="multipart/form-data">
            <input type="text" name='name' placeholder=title required><br>
            <input type="file"  name='image' class="filestyle" data-classButton="btn btn-primary" data-input="false" data-classIcon="icon-plus" data-buttonText="image" required><br>
            <input type="date" name='date' pattern="(19|20)\d\d[-](0[1-9]|1[012])[-](0[1-9]|[12][0-9]|3[01])" placeholder=date required><br>
            <input type="text" name='royalty_id' pattern="[1-4]{1}" placeholder=royalty_status required><br>
            <input type="text" name='rating' pattern="[1-4]{1}" placeholder=rating required><br>
            <textarea name='description' pattern="[a-z]*." placeholder=description required></textarea><br>
            <button type='submit' name="submit">Submit</button><br>
        </form>
    </body>
</html>

<?php
/*
function data_uri($file, $mime) 
{  
  $contents = file_get_contents($file);
  $base64   = base64_encode($contents); 
  return ('data:' . $mime . ';base64,' . $base64);
}*/
?>

<!--<img src="<?php //echo data_uri('elephant.png','image/png'); ?>" alt="An elephant" />-->