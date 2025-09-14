<?php
    session_start();
    $uid = isset($_SESSION['MM_Uid'])?$_SESSION['MM_Uid']:"";
    $update = isset($_POST['update'])?$_POST['update']:"";
    $delete = isset($_POST['delete'])?$_POST['delete']:"";
    if ($update != "")
    {
        $proid = htmlentities($_POST['proid']);
        $nqty = htmlentities($_POST['nqty']);
        require("../config/sql_connection.php");    
        
        // Check if we're using mock database or real database
        if ($conn && !isset($GLOBALS['use_mock_db'])) {
            // Real database - Use prepared statements to prevent SQL injection
            $sql_update = "UPDATE cart SET qty = ? WHERE proid = ?";
            $stmt_update = mysqli_prepare($conn, $sql_update);
            mysqli_stmt_bind_param($stmt_update, 'ss', $nqty, $proid);
            $nqtyupdate = mysqli_stmt_execute($stmt_update);
            mysqli_close($conn);
        } else {
            // Mock database - simulate successful update
            $nqtyupdate = true;
        }
    }

    elseif ($delete != "")
    {
        $proid = htmlentities($_POST['proid']);
        require("../config/sql_connection.php");
        
        // Check if we're using mock database or real database
        if ($conn && !isset($GLOBALS['use_mock_db'])) {
            // Real database - Use prepared statements to prevent SQL injection
            $sql_delete = "DELETE FROM cart WHERE proid = ?";
            $stmt_delete = mysqli_prepare($conn, $sql_delete);
            mysqli_stmt_bind_param($stmt_delete, 's', $proid);
            $prod_delete = mysqli_stmt_execute($stmt_delete);
            mysqli_close($conn);
        } else {
            // Mock database - simulate successful deletion
            $prod_delete = true;
        }
    }

    header("Location:cart.php");
?>