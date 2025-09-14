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
            // Real database
            echo $sql_update = "UPDATE cart SET qty='$nqty' WHERE proid ='$proid' ";
            $nqtyupdate  = mysqli_query($conn, $sql_update);
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
            // Real database
            echo $sql_delete = "DELETE FROM cart WHERE proid= '$proid' ";
            $prod_delete = mysqli_query($conn, $sql_delete);
            mysqli_close($conn);
        } else {
            // Mock database - simulate successful deletion
            $prod_delete = true;
        }
    }

    header("Location:cart.php");
?>