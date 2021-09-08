<?php
    $serverName="localhost";
    $userName="root";
    $pwd="";
    $database="rock";    
    $conn=mysqli_connect($serverName, $userName, $pwd, $database);
    if(!$conn){
        die('SREVER NOT RESPONDING, We regret for the inconvenience.');
    }
?>
