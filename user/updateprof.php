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
                // Real database - Use prepared statements to prevent SQL injection
                $sql_update = "UPDATE members SET email = ?, memname = ?, password = ?, phonenum = ?, deliveryadd = ?, postalcode = ?, unitno = ? WHERE id = ?";
                $stmt = mysqli_prepare($conn, $sql_update);
                mysqli_stmt_bind_param($stmt, 'ssssssss', $email, $memname, $password, $phonenum, $deliveryadd, $postalcode, $unitno, $uid);
                $result = mysqli_stmt_execute($stmt);
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