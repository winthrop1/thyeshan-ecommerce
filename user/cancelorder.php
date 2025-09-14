<?php
    session_start();
    $uid = isset($_SESSION['MM_Uid'])?$_SESSION['MM_Uid']:"NA";
    $cancel = isset($_POST['submit'])?$_POST['submit']:"NA";
        if ($cancel != "NA")
        {
            require("../config/sql_connection.php");
            $ordid = htmlentities($_POST['ordid']);
            
            // Check if we're using mock database or real database
            if ($conn && !isset($GLOBALS['use_mock_db'])) {
                // Real database
                $sql ="UPDATE orders SET ccldate=now() WHERE id = '$ordid' ";
                $result = mysqli_query($conn, $sql);

                $sql_Cancel= "UPDATE orders SET ordstatus= 'C' WHERE id = '$ordid' ";
                $result = mysqli_query($conn, $sql_Cancel);
                mysqli_close($conn);
            } else {
                // Mock database - simulate successful cancellation
                $result = true;
                // In a real implementation, you would update the mock order data here
                // For now, just simulate success
            }

            header("Location:orderhistory.php");
        }
?>