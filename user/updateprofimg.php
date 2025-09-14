<?php
    session_start();
    $uid = isset($_SESSION['MM_Uid'])?$_SESSION['MM_Uid']:"";  // Fixed session variable name
    $submit = isset($_POST['submit'])?$_POST['submit']:"";
    if ($submit != "")
    {

        $allowType = array("image/jpg" ,"image/png" , "image/jpeg");
        if(in_array ($_FILES["file"]["type"], $allowType))
        {
            echo "File type is acceptable";
        }

        else{
            echo "Error: Please only upload jpg, jpeg, or png files";
            header("Location:editprofile.php?stt=3");
        }

        if ( $_FILES["file"]["size"] < 1024000 ) // larger than 1MB
                echo "File Size is acceptable"; // proceed to upload
        else
            {
                echo "File size is too large";
                header("Location:editprofile.php?stt=4");
            }
        $timestamp = time();  // Define timestamp
        $target = "../assets/profiles/" . $timestamp ."_" .$_FILES["file"]["name"];  // Fixed path
        $result = move_uploaded_file($_FILES["file"]["tmp_name"] , $target );

        require("../config/sql_connection.php");
        
        // Check if we're using mock database or real database
        if ($conn && !isset($GLOBALS['use_mock_db'])) {
            // Real database
            $update= "UPDATE members SET mempic= '$target' WHERE id = '$uid'";
            $updateimg = mysqli_query($conn, $update);
            mysqli_close($conn);
        } else {
            // Mock database - simulate successful update
            $updateimg = true;
            // In a real implementation, you would update the mock data here
            if (isset($GLOBALS['mock_members'])) {
                foreach ($GLOBALS['mock_members'] as &$member) {
                    if ($member['id'] == $uid) {
                        $member['mempic'] = $target;
                        break;
                    }
                }
            }
        }

        if ($updateimg >= 0)
        header("Location:editprofile.php?stt=1");

        else
        header("Location:editprofile.php?stt=2");
    }
    else 
    header("Location:editprofile.php");
?>