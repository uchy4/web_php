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
    
        <form action='getImage.php' method='post' id='home'>
            <input type="text" name="name" id="search" placeholder="search Artwork"><br>
            <button type='submit' onmouseover="hover(this);" onmouseout="unhover(this);">Search Art</button>
        </form>
    </body>
</html>