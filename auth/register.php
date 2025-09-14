<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="/assets/css/Css_Reset.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="/assets/css/register.css?v=<?php echo time(); ?>">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script>  
    // function matchPassword() {  
    //     var pw1 = document.getElementById("password");  
    //     var pw2 = document.getElementById("conpassword");  
    //     if(pw1 != pw2)  
    //     {   
    //         alert("Passwords did not match");  
    //     } else {  
    //         alert("Password created successfully");  
    //     }  
    // }

    // $('#pword, #conpword').on('keyup', function () {
    //     if ($('#pword').val() == $('#conpword').val()) {
    //         $('#message').html('Matching').css('color', 'green');
    //     } else 
    //         $('#message').html('Not Matching').css('color', 'red');
    //     }
    //     );

        var check = function() {
    if (document.getElementById('pword').value ==
        document.getElementById('conpword').value) {
        document.getElementById('message').style.color = 'green';
        document.getElementById('message').innerHTML = 'Matching';
        document.getElementById('message').style.fontSize ='large';
    } else {
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
   
    <div id="register">
        <div id="reg_ban"></div>
        <div class="stt">
        <?php 
            $val = isset($_GET['stt'])?$_GET['stt']:"";{
            
            if($val==1)
                echo "<br><b>Invalid username or password</b>";

            elseif($val ==2)
                 echo "<b>Duplicate Email";
            }?>
            </div>
        <form action="formsave.php" method="POST" id="regForm" enctype="multipart/form-data">
            <!-- <label class="regLBL">*Email:</label> -->
            <input type="email" name="uemail" id=""require placeholder="Email"><br>

            <!-- <label class="regLBL">*Full Name:</label> -->
            <input type="text" name="fname" id="" require placeholder="Full Name"><br>

            <!-- <label class="regLBL">*Password:</label> -->
            <input type="password" name="pword" id="pword" require placeholder="Password" onkeyup='check();'><br>

            <!-- <label class="regLBL">*Confirm Password:</label> -->
            <input type="password" name="conpword" id="conpword" require placeholder="Confirm Password" onkeyup='check();'><br>
            <span id="message"></span><br>

            <!-- <label class="regLBL">*Mobile No.:</label> -->
            <input type="text" name="uhp" id="" require pattern="[0-9]{8}" placeholder="Mobile No."><br>

            <!-- <label class="regLBL">*Delivery Address:</label> -->
            <input type="text" name="uaddr" id="address" require placeholder="Delivery Address"><br>

            <!-- <label class="regLBL">*Postal Code:</label> -->
            <input type="text" name="upcode" id="" require placeholder="Postal Code"><br>

            <!-- <label class="regLBL">*Unit No.:</label> -->
            <input type="text" name="unitno" id="" require placeholder="Unit No."><br>

            <label class="regLBL">Profile Pic:</label><br>
            <input type="file" name="uphoto" id="" ><br>

            <input type="submit" name="submit" id="reginput" value="Register">
            

        </form>
    </div>

    <?php require("../includes/footer.php"); ?>



</body>
</html>

