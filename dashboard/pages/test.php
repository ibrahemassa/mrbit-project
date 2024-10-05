

<?php  
    
// To Get the Current Filename. 
// To Get the directory name in  
// which file is stored. 
echo substr(end(explode('/', $_SERVER["SCRIPT_NAME"])), 0, -4);
// To Show the Current Filename on Page. 
?>
