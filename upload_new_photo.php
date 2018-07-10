<?php
    include("connect_to_server.php");
    
    $userID = $_POST['userID'];
    $sqlQuery = $mySQLConnection->prepare("INSERT INTO pendingPhotos(pendingPhotoDirectory, userId) VALUES() WHERE userId = $userID");
    try {
        $sqlQuery->execute();
        echo json_encode(TRUE);
    } catch (Exception $e) {
        echo json_encode(FALSE);
    }
    
    echo json_encode($response);
    header("Content-type:application/json");
?>