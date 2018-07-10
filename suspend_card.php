<?php
    include("connect_to_server.php");
    
    $userID = $_POST['userID'];
    $sqlQuery = $mySQLConnection->prepare("UPDATE Cards SET cardStatus = 0 WHERE userId = $userID");
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