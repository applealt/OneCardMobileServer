<?php
    include("connect_to_server.php");
    
    $userID = $_POST['userID'];
    $sqlQuery = $mySQLConnection->prepare("SELECT condorBalance, printCredit FROM Balances WHERE userId = $userID");
    $sqlQuery->execute();
    $response = $sqlQuery->fetchAll(PDO::FETCH_ASSOC);
    
    echo json_encode($response);
    header("Content-type:application/json");
?>