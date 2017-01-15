var check = true;
var done = false;
function changeBackground(){
    if (check){
        document.body.style.backgroundImage = "url('boss_spawn.gif')"; 
        document.getElementById("awoken").innerHTML = "YOU HAVE AWOKEN THE BEAST!!!";
        document.getElementById("hidden").style.fontSize = "40px";
        document.getElementById("beast").style.visibility = "hidden";
        document.getElementById("homepage").title = "Mode: Casual";
        
        
        setTimeout( function(){ 
            document.body.style.backgroundImage = "url('boss_spawn.png')";
            document.getElementById("hidden").style.display = "none";
            document.getElementById("showtext").style.display = "block";
            document.getElementById("hidden").style.fontSize = "15px";
            document.getElementById("beast").style.visibility = "visible";
            document.getElementById("awoken").style.display = "none";
            done = true;
          }  , 9000 );
    }
    check = false;
}

function reset(){
    if (done){
        document.body.style.background = "linear-gradient(to right, rgb(37,24,20), rgb(119,108,73), rgb(37,24,20))"; 
        document.body.style.backgroundSize = "cover"; 
        document.getElementById("homepage").title = "Mode: Professional";
        document.getElementById("prof").style.display = "none";
    }
}