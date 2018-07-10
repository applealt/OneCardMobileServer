<?php
    include("connect_to_server.php");
    
    $userID = $_POST['userID'];
    $sqlQuery = $mySQLConnection->prepare("SELECT * FROM Transactions WHERE userId = $userID ORDER BY transactionTime DESC LIMIT 10");
    $sqlQuery->execute();
    $response = $sqlQuery->fetchAll(PDO::FETCH_ASSOC);
    
    echo json_encode($response);
    header("Content-type:application/json");
?>