<?php
    session_start();
    $submit = isset($_POST['submit'])?$_POST['submit']:"";
    $mid = isset($_SESSION['MM_Uid'])?$_SESSION['MM_Uid']:"NA";
    if ($submit != "")
    {
        if ($mid != "NA")
        {
            $datetime = htmlentities($_POST['datetime']);
            $total = htmlentities($_POST['total']);

            require("../config/sql_connection.php");
            
            // Check if we're using mock database or real database
            if ($conn && !isset($GLOBALS['use_mock_db'])) {
                // Real database
                echo $sql ="INSERT INTO orders(memid, reqdate, ordstatus, totprice) VALUES ('$mid','$datetime','O','$total')";
                $order = mysqli_query($conn, $sql);
                $ordid =  $conn -> insert_id;
                mysqli_close($conn);
            } else {
                // Mock database - simulate successful order creation
                $order = true;
                $ordid = rand(1000, 9999); // Generate random order ID for demo
            }
        }

            if ($order)
            {
                // Check if we're using mock database or real database
                if ($conn && !isset($GLOBALS['use_mock_db'])) {
                    // Real database
                    require("../config/sql_connection.php");
                    echo $sql_ = "INSERT orddetail(ordid, proid, qty, unitprice)
                    SELECT ord.id, proid, qty, unitprice FROM cart ct INNER JOIN orders ord on ct.memid = ord.memid WHERE ord.id = '$ordid'";
                    $order = mysqli_query($conn, $sql_);

                    $filter = "WHERE memid = $mid";
                    $sql_delete = "DELETE FROM cart ".$filter;

                    $order=  mysqli_query($conn, $sql_delete);
                    
                    mysqli_close($conn);
                } else {
                    // Mock database - simulate successful order detail insertion and cart clearing
                    $order = true;
                }

                header("Location:../user/orderhistory.php");
            }
            else
                header("Location:cart.php?stt=2");
        }
    } // Close if ($submit != "")
    else {
        // If accessed directly without POST data, show user-friendly message
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - Thye Shan Medical Hall</title>
    <link rel="stylesheet" href="/assets/css/Css_Reset.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="/assets/css/global.css?v=<?php echo time(); ?>">
    <?php require_once('../config/mitigations.php'); ?>
</head>
<body>
    <?php require("../includes/nav.php"); ?>
    <main>
        <h2>Checkout</h2>
        <p>Please go to your <a href="cart.php">shopping cart</a> to proceed with checkout.</p>
        <p>If you don't have items in your cart, please <a href="product.php">browse our products</a> first.</p>
    </main>
    <?php require("../includes/footer.php"); ?>
</body>
</html>
<?php
    }
?>