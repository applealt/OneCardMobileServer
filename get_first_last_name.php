<?php    
	include("connect_to_server.php");
    
    $userID = $_POST['userID'];
    $sqlQuery = $mySQLConnection->prepare("SELECT firstName, lastName FROM Users WHERE userId = $userID");
    $sqlQuery->execute();
    $response = $sqlQuery->fetchAll(PDO::FETCH_ASSOC);
    
    echo json_encode($response);
    header("Content-type:application/json");
?>