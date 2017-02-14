<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <script type="text/javascript" src="jFile.js"></script>
    <title>Home</title>
</head>
<body>
    <p>Welcome...choose wisely..</p>
    
        <form action='addArt.php' method='post' id='home'>
            <button type='submit' onmouseover="hover(this);" onmouseout="unhover(this);">Submit New Art</button>
        </form>
    
        <form action='modArt.php' method='post' id='home'>
            <button type='submit' onmouseover="hover(this);" onmouseout="unhover(this);">Modify Existing Art</button>
        </form>
    
        <form action='changeInfo.php' method='post' id='home'>
            <button type='submit' onmouseover="hover(this);" onmouseout="unhover(this);">Change Account Info</button>
        </form>
    </body>
</html>