<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="/assets/css/Css_Reset.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="/assets/css/cart.css?v=<?php echo time(); ?>">
    <?php require_once('../config/cookies.php'); ?>
    <?php 
        session_start(); 
        $uid = isset($_SESSION['MM_Uid'])?$_SESSION['MM_Uid']:"NA";
        if ($uid != "NA")
        {
            require("../config/sql_connection.php");
            
            // Check if we're using mock database or real database
            if ($conn && !isset($GLOBALS['use_mock_db'])) {
                // Real database
                $sql = "SELECT prd.id, prd.pname, prd.pdesc, prd.pcost, prd.ppic, ct.qty FROM cart ct INNER JOIN product prd ON ct.proid = prd.id WHERE memid = ? ";
                $cartprd = mysqli_prepare($conn, $sql);
                mysqli_stmt_bind_param($cartprd, 'i', $uid);
                mysqli_stmt_execute($cartprd);
                $result = mysqli_stmt_get_result($cartprd);
                mysqli_close($conn);
            } else {
                // Mock database - create mock cart data
                $mock_cart = [
                    [
                        'id' => 6,
                        'pname' => 'Chrysanthemum Bud',
                        'pdesc' => 'Premium Quality Herbs. No Added Artificial Flavourings or Colourings.',
                        'pcost' => 10.50,
                        'ppic' => '/assets/products/chrysanthemum-removebg-preview.png',
                        'qty' => 2
                    ],
                    [
                        'id' => 7,
                        'pname' => 'Ginseng Bird\'s Nest',
                        'pdesc' => 'Food for the Skin: Improves complexion, rich in calcium.',
                        'pcost' => 39.90,
                        'ppic' => '/assets/products/birdnest-removebg-preview.png',
                        'qty' => 1
                    ]
                ];
                // Convert to a result-like structure
                $result = new ArrayIterator($mock_cart);
            }
        }
        else{
            header("Location:../auth/login.php?stt=5");
        }
    ?>

<?php require_once('../config/mitigations.php'); ?>
    <script>
            function isConfirm() {
                var isValid = true;

                if (!confirm("Confirm Checkout?"))
                    isValid = false;

                return isValid;
            }
        </script>
</head>
<body>
    <?php require("../includes/nav.php"); ?>
    <main>
        <p id="carttop">Cart</p>
        
            <?php 
            $grandtotal=0;
            // Handle both real database results and mock data
            $cart_items = [];
            if (isset($result)) {
                if ($result instanceof ArrayIterator) {
                    // Mock data
                    $cart_items = iterator_to_array($result);
                } else {
                    // Real database result
                    while ($row = mysqli_fetch_assoc($result)) {
                        $cart_items[] = $row;
                    }
                }
            }
            
            foreach ($cart_items as $cart_stuff) {
                $pid = $cart_stuff['id'];
                $pn = $cart_stuff['pname'];
                $pd = $cart_stuff['pdesc'];
                $pc = $cart_stuff['pcost'];
                $ppic = $cart_stuff['ppic'];
                $cqty = $cart_stuff['qty'];
            ?>
            <div id="cartflex">
                <div id="cartimg">
                    <img src="<?php echo $ppic;?>" alt="<?php echo $ppic; ?>">
                </div>
                <div id="cartTXT">
                    <p class="cartp" id="cartname"><?php echo $pn; ?></p><br>
                    <p class="cartp" id="cartdesc"><?php echo $pd; ?></p>
                </div>
                <div id="cartucost">
                    <p>$<?php echo number_format($pc,2); ?> <br>each</p>
                </div>
                <div id="carttcost">
                    <p>$<?php echo number_format($tcost =$pc* $cqty,2); ?></p>
                </div>
                <div id="cartform">
                    <form action="updatecartqty.php" method="POST">
                        <input type="number" id="cartnum" min="1" name="nqty" required value="<?php echo number_format($cqty); ?>"><br>
                        <input type="hidden" name="proid" value="<?php echo $pid;?>">
                        <input class="cartBTN" type="submit" value ="Update" name="update">
                        <input class="cartBTN" type="submit" value="Delete" name="delete">
                    </form> 
                </div>
            </div>
        <?php $grandtotal += $tcost; } ?>
        <?php $gst = $grandtotal * 0.07; ?>
        <?php $total = $grandtotal *1.07; ?>
        <?php  ?>
        <div id="cartcal">
                <p class="cartval">Price Before GST: $<?php echo number_format($grandtotal,2); ?> </p>
                <p class="cartval">GST(7%): $<?php echo number_format($gst,2); ?></p>
                <p class="cartval" id="carttotal">Amount Payable: $<?php echo number_format($total,2); ?></p>
        </div>  
        <div id="checkout">
        <form action="checkout.php" method="POST" onsubmit="return isConfirm()">
            Date of Delivery:
                <input type="datetime-local" name="datetime" id="datetimebox" class="delv" require><br>
                <input type="submit" name="submit" id="checkoutBTN" value="Checkout">
                <input type="hidden" name="total" value="<?php echo $total; ?>">
            </form>
            <?php 
            $val = isset($_GET['stt'])?$_GET['stt']:"";{
            
            if($val==1)
                echo "<br><b>Unable to Checkout</b>";
            }?>
        </div>
    </main>
    <?php require("../includes/footer.php"); ?>
</body>
</html>