<?php    
	include("connect_to_server.php");
    
    $networkId = $_POST['networkId'];
    $sqlQuery = $mySQLConnection->prepare("SELECT tokenString, firstName, lastName, accountTypeId, userId FROM Accounts JOIN Users ON Accounts.userId = Users.userId WHERE networkId = $networkId");
    $sqlQuery->execute();
    $response = $sqlQuery->fetchAll(PDO::FETCH_ASSOC);
    
    echo json_encode($response);
    header("Content-type:application/json");
?>