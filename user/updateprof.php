<?php
    session_start();
    $submit= isset($_POST['submit'])?$_POST['submit']:"";
    $uid = isset($_SESSION['MM_Uid'])?$_SESSION['MM_Uid']:"";
    if ($submit != "")
    {
        if ($uid != "")
        {
            $email = htmlentities($_POST['email']);
            $memname= htmlentities($_POST['memname']);
            $password=htmlentities($_POST['password']);
            $phonenum =htmlentities($_POST['phonenum']);
            $deliveryadd =htmlentities($_POST['deliveryadd']);
            $postalcode= htmlentities($_POST['postalcode']);
            $unitno =htmlentities($_POST['unitno']);
    
            require("../config/sql_connection.php");
            
            // Check if we're using mock database or real database
            if ($conn && !isset($GLOBALS['use_mock_db'])) {
                // Real database
                $sql_update = "UPDATE members SET email='$email',memname='$memname',password='$password',phonenum='$phonenum',deliveryadd='$deliveryadd',postalcode='$postalcode',unitno='$unitno' WHERE id= '$uid'";
                $result= mysqli_query($conn,$sql_update);
                mysqli_close($conn);
            } else {
                // Mock database - simulate successful update
                $result = true;
                // In a real implementation, you would update the mock data here
                if (isset($GLOBALS['mock_members'])) {
                    foreach ($GLOBALS['mock_members'] as &$member) {
                        if ($member['id'] == $uid) {
                            $member['email'] = $email;
                            $member['memname'] = $memname;
                            $member['password'] = $password;
                            $member['phonenum'] = $phonenum;
                            $member['deliveryadd'] = $deliveryadd;
                            $member['postalcode'] = $postalcode;
                            $member['unitno'] = $unitno;
                            break;
                        }
                    }
                }
            }
        }

        if ($result)
        {
            header("Location:editprofile.php?stt=5");
        }
        else
            header("Location:editprofile.php?stt=6");
    }
    else{
        header("Location:editprofile.php");
    }

?>