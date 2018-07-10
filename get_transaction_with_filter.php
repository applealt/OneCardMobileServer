<?php
    include("connect_to_server.php");
    
    $userID = $_POST['userID'];
    $fromDate = $_POST['fromDate'];
    $toDate = $_POST['toDate'];
    $includeDeposit = $_POST['includeDeposit'];
    $includeExpense = $_POST['includeExpense'];
    $includeCondorCash = $_POST['includeCondorCash'];
    $includePrintCredit = $_POST['includePrintCredit'];
    
    $sql = "SELECT amount, description, transactionTime, transactionTypeName FROM Transactions JOIN transactionTypes ON Transactions.transactionTypeId = TransactionTypes.transactionTypeId WHERE userId = $userID AND transactionType BETWEEN $fromDate AND $toDate";
    
    if($includeDeposit == TRUE && $includeExpense == FALSE) {
        $sql .= " AND amount >= 0";
    } else if($includeDeposit == FALSE && $includeExpense == TRUE) {
        $sql .= " AND amount < 0";
    }
    
    if($includeCondorCash == TRUE && $includePrintCredit == FALSE) {
        $sql .= " AND transactionTypeName = 'Condor Cash'";
    } else if($includeCondorCash == FALSE && $includePrintCredit == TRUE) {
        $sql .= " AND transactionTypeName = 'Print Credit'";
    }
    $sqlQuery = $mySQLConnection->prepare($sql);
    $sqlQuery->execute();
    $response = $sqlQuery->fetchAll(PDO::FETCH_ASSOC);
    
    echo json_encode($response);
    header("Content-type:application/json");
?>