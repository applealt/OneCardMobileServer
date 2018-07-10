<?php
    $servername = "localhost";
    $username = "oneca_admin";
    $password = "60r@dAq0";
    $dbname = "onecardm_db";
    
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    
     // Create connection to mySQL server
    $mySQLConnection = new PDO("mysql:dbname=$dbname;host=$servername", $username, $password);
    
    // set the PDO error mode to exception
    $mySQLConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>