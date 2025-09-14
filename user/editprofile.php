<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="/assets/css/Css_Reset.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="/assets/css/editprofile.css?v=<?php echo time(); ?>">
    <?php require_once('../config/cookies.php'); ?>
    <?php
        session_start();
        require("../config/sql_connection.php");
        $uid = isset($_SESSION['MM_Uid'])?$_SESSION['MM_Uid']:"";
        if ($uid != "")
        {
            // Check if we're using mock database or real database
            if ($conn && !isset($GLOBALS['use_mock_db'])) {
                // Real database
                $sql_ = "SELECT email, memname, password, phonenum, deliveryadd, postalcode, unitno ,mempic FROM members WHERE id = ?";
                $search_prof = mysqli_prepare($conn, $sql_);
                mysqli_stmt_bind_param($search_prof, 'i', $uid);
                mysqli_stmt_execute($search_prof);
                mysqli_stmt_bind_result($search_prof, $em, $mn, $pw, $pn, $da, $pc, $u, $p);
                mysqli_stmt_fetch($search_prof);
                mysqli_close($conn);
            } else {
                // Mock database - find user by ID
                $em = $mn = $pw = $pn = $da = $pc = $u = $p = "";
                if (isset($GLOBALS['mock_members'])) {
                    foreach ($GLOBALS['mock_members'] as $member) {
                        if ($member['id'] == $uid) {
                            $em = $member['email'];
                            $mn = $member['memname'];
                            $pw = $member['password'];
                            $pn = $member['phonenum'];
                            $da = $member['deliveryadd'];
                            $pc = $member['postalcode'];
                            $u = $member['unitno'];
                            $p = isset($member['mempic']) ? $member['mempic'] : '';
                            break;
                        }
                    }
                }
            }
        }
    ?>
    <script>
        var check = function() {
    if (document.getElementById('pword').value ==
        document.getElementById('conpword').value) {
        document.getElementById('message').style.color = 'green';
        document.getElementById('message').innerHTML = 'Matching';
        document.getElementById('message').style.fontSize ='large';
    } 
    else {
        document.getElementById('message').style.color = 'red';
        document.getElementById('message').innerHTML = 'Not Matching';
        document.getElementById('message').style.fontSize ='large';
    }
    }
    </script>
    <?php require_once('../config/mitigations.php'); ?>
</head>
<body>
    <?php require("../includes/nav.php"); ?>
    <?php require("../includes/prof_nav.php"); ?>
    <main>
        <div id="updateform">
            <div id="editprofimg">
                <form action="updateprofimg.php" method="post" enctype="multipart/form-data">
                <img src="<?php echo $p; ?>" alt="<?php echo $p; ?>"><br>
                <input type="file" name="file" value="<?php $p;?>"><br>
                <input type="submit" name="submit" value="Update Picture" id="updatepic">
                </form>
                <div class="stt">
                <?php 
                    $val = isset($_GET['stt'])?$_GET['stt']:"";{
                    
                    if($val==1)
                        echo "<b>Update Picture Success</b>";

                    elseif($val ==2)
                        echo "<b>Update Picture Failed</b>";

                    elseif($val ==3)
                        echo "<b>Error: Please only upload jpg, jpeg, or png files</b>";
                    
                    elseif($val ==4)
                        echo "<b>File size is too large</b>";
                }?>
                </div>
            </div>
        
        <form action="updateprof.php" method="POST" enctype="multipart/form-data" id="updateform">
                <div id="editprof">
                    <p>Name:</p>
                   <input type="text" name="memname" value="<?php echo $mn; ?>">
                   <p>Password:</p>
                   <input type="password" name="memname" value="<?php echo $pw; ?>">
                    <p>Email:</p>
                   <input type="email" name="email" value="<?php echo $em; ?>">
                    <p>Phone No:</p>
                   <input type="text" name="phonenum"  value="<?php echo $pn; ?>">
                    <p>Delivery Address:</p>
                   <input type="text" name="deliveryadd"  value="<?php echo $da; ?>">
                    <p>Postal Code:</p>
                   <input type="text" name="postalcode"  value="<?php echo $pc; ?>">
                    <p>Unit No.:</p>
                   <input type="text" name="unitno" value="<?php echo $u;?>"><br>

                    <input type="submit" name="submit" id="save" value="Save"><br>
                    <div class="stt">
                    <?php 
                        $val = isset($_GET['stt'])?$_GET['stt']:"";

                        if ($val == 5)
                        echo "<b>Profile Updated</b>";

                        elseif ($val ==6 )
                        echo "<b>Update Failed</b>";
                    ?>
                    </div>
                </div>
        </form>
        </div>
    </main>
    <?php require("../includes/footer.php"); ?>
</body>
</html>