<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php session_start(); ?>
</head>
<body>
    <?php
        $uid = isset($_SESSION['MM_Uid'])?$_SESSION['MM_Uid']:'NA';
        $atc =isset($_POST['atc'])?$_POST['atc']:"NA";
        if ($atc != "NA")
        {
            if ($uid != "NA")
            {
                $pid =  htmlentities($_POST['pid']);
                $qty = htmlentities($_POST['qty']);
                $pcost= htmlentities($_POST['pcost']);

                require("sql_connection.php");
                $sql_ = "INSERT INTO cart( memid, proid, qty, unitprice) VALUES ('$uid','$pid','$qty', '$pcost')";
                $insert = mysqli_query($conn, $sql_);

                header("Location:cart.php");
            }
            else
                header("Location:login.php?stt=5");
        }
        else
            header("Location:product_detail.php?stt=2");


    ?>
</body>
</html>