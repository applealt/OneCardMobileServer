<?php
    include("connect_to_server.php");
    
    $userID = $_POST['userID'];
    $ammountToAdd = $_POST['ammountToAdd'];
    $sqlQuery = $mySQLConnection->prepare("UPDATE Balances SET condorBalance = condorBalance + $ammountToAdd WHERE userId = $userID");
    try {
        $sqlQuery->execute();
		$response->isSuccessful = TRUE;
        echo json_encode($response);
    } catch (Exception $e) {
		$response->isSuccessful = TRUE;
        echo json_encode($response);
    }
    
    header("Content-type:application/json");
?>