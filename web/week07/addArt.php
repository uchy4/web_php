
<!DOCTYPE html>
<html>
    <body>
        
    
        <form action='upload.php' method='post' id='addArt'>
            <input type="text" name='name' placeholder=name required>
            <input type="file" name='image' placeholder=image required>
            <input type="date" name='date' pattern="(19|20)\d\d[-](0[1-9]|1[012])[-](0[1-9]|[12][0-9]|3[01])" placeholder=date required>
            <input type="text" name='royalty_id' pattern="[1-4]{1}" placeholder=royalty_status required>
            <input type="text" name='rating' pattern="[1-4]{1}" placeholder=rating required><br>
            <input type="textbox" name='description' pattern="[a-z]*." placeholder=description required>
            <button type='submit' name="submit">Submit</button>
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