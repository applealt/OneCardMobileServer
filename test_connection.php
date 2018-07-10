<?php    
	$response->isConnected = TRUE;
    echo json_encode($response);
    header("Content-type:application/json");
?>