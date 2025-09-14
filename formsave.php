<?php
$submit = isset($_POST['submit'])?$_POST['submit']:"";
require_once('config/mitigations.php');

if ($submit!="")
{
    $uemail = htmlentities($_POST["uemail"]);
    $fname = htmlentities($_POST["fname"]);
    $pword = htmlentities($_POST["pword"]);
    $uhp = htmlentities($_POST["uhp"]);
    $uaddr= htmlentities($_POST["uaddr"]);
    $upcode =htmlentities($_POST["upcode"]);
    $unitno= htmlentities($_POST["unitno"]);
    

    $allowType = array("image/jpg" ,"image/png" , "image/jpeg");
    if(in_array ($_FILES["uphoto"]["type"], $allowType))
    {
        echo "File type is acceptable";
    }

    else{
        echo "Error: Please only upload jpg, jpeg, or png files";
        exit();
    }

    if ( $_FILES["uphoto"]["size"] < 1024000 ) // larger than 1MB
            echo "File Size is acceptable"; // proceed to upload
    else
        {
            echo "File size is too large";
            exit();
        }
    $timestamp = time(); // Define timestamp
    $target = "assets/profiles/" . $timestamp ."_" .$_FILES["uphoto"]["name"];
    $result = move_uploaded_file($_FILES["uphoto"]["tmp_name"] , $target );

    if ($result)
    {
        require("config/sql_connection.php");
        
        // Check if we're using mock database or real database
        if ($conn && !isset($GLOBALS['use_mock_db'])) {
            // Real database
            $sql_check = "SELECT * FROM members WHERE email = '$uemail'";
            $checked = mysqli_query($conn, $sql_check);
            $duplicate = mysqli_num_rows($checked);
            if ($duplicate >= 1)
            {
                echo ("Duplicate Email");
                header("Location:auth/register.php?stt=2");
                exit();
            }
            else
            {
                $hashed_pw= password_hash($pword, PASSWORD_BCRYPT);
                echo $sql = "INSERT INTO members(email, memname, password, phonenum, deliveryadd, postalcode, unitno, mempic) VALUES ('$uemail','$fname','$hashed_pw','$uhp','$uaddr','$upcode','$unitno','$target')";
                $resultpass = mysqli_query($conn,$sql);
                mysqli_close($conn); // close the database
            }
        } else {
            // Mock database - simulate registration
            $duplicate = false;
            if (isset($GLOBALS['mock_members'])) {
                foreach ($GLOBALS['mock_members'] as $member) {
                    if ($member['email'] === $uemail) {
                        $duplicate = true;
                        break;
                    }
                }
            }
            
            if ($duplicate) {
                echo ("Duplicate Email");
                header("Location:auth/register.php?stt=2");
                exit();
            } else {
                // Simulate successful registration
                $resultpass = true;
                // In a real implementation, you would add the user to mock data
            }
        }
    }
    if ($resultpass >= 0)
    {
        header("Location:auth/login.php?stt=4");
    }
    
    else{
        echo ("Submission fail");
    }

    }
    else 
        header("Location:auth/register.php?stt=1");
?>
