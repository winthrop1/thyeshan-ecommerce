<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/assets/css/Css_Reset.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="/assets/css/orderhistory.css?v=<?php echo time(); ?>">
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
            $sql= "SELECT * FROM orddetail odt INNER JOIN product prd on odt.proid = prd.id INNER JOIN orders ord on odt.ordid = ord.id WHERE ord.memid ='$uid'  ORDER BY ord.orddate DESC ";
            $hist = mysqli_query($conn, $sql);
            mysqli_close($conn);
        } else {
            // Mock database - create mock order history data
            $mock_order_history = [
                [
                    'orddate' => date('Y-m-d H:i:s', strtotime('-2 days')),
                    'ordstatus' => 'O',
                    'ppic' => '/assets/products/chrysanthemum-removebg-preview.png',
                    'pname' => 'Chrysanthemum Bud',
                    'qty' => 2,
                    'totprice' => 21.00,
                    'reqdate' => date('Y-m-d H:i:s', strtotime('+3 days')),
                    'ccldate' => null,
                    'ordid' => 1,
                    'id' => 1
                ],
                [
                    'orddate' => date('Y-m-d H:i:s', strtotime('-5 days')),
                    'ordstatus' => 'D',
                    'ppic' => '/assets/products/birdnest-removebg-preview.png',
                    'pname' => 'Ginseng Bird\'s Nest',
                    'qty' => 1,
                    'totprice' => 39.90,
                    'reqdate' => date('Y-m-d H:i:s', strtotime('-2 days')),
                    'ccldate' => null,
                    'ordid' => 2,
                    'id' => 2
                ]
            ];
            
            // Convert array to an object that can be used with mysqli_fetch_assoc pattern
            $hist = new ArrayIterator($mock_order_history);
        }
    }
    
?>
<?php require_once('../config/mitigations.php'); ?>
</head>
<body>
    <?php require("../includes/nav.php"); ?>
    <?php require("../includes/prof_nav.php"); ?>
    <h2 id="hordhist">Order History</h2>
    <section id="histpg">
    <?php 
    // Handle both real database results and mock data
    $order_items = [];
    if (isset($GLOBALS['use_mock_db']) && $hist instanceof ArrayIterator) {
        $order_items = iterator_to_array($hist);
    } else if ($hist) {
        while ($row = mysqli_fetch_assoc($hist)) {
            $order_items[] = $row;
        }
    }
    
    foreach ($order_items as $ordhist) { ?>
        <div id="ordersel">
            <p id="histdate" class="ord"><?php echo date("d-m-Y H:i:s", strtotime($ordhist['orddate'])); ?></p>
        <div id="ordstat" class="ord">
            <?php 
                if ($ordhist['ordstatus'] == "D")
                echo "Delivered";
                elseif ($ordhist['ordstatus'] == "C")
                echo "Cancelled";
                elseif ($ordhist['ordstatus'] == "O")
                echo "Ordered";
                else
                echo "Error";
            ?>
        </div>
    </div>
        <article>
                <div id="histflex">
                    <img id ="histimg" src="<?php echo $ordhist['ppic']; ?>" alt="Product Picture">
                    
                    <div id ="histTXT">
                        <p id="prodname"><?php echo $ordhist['pname']; ?></p>
                    </div>
                    <div id="histqty">
                        <p id="prodqty">Qty: <?php echo $ordhist['qty']; ?></p>
                    </div>
                    <div id="histcost">
                        <p>$<?php echo number_format($ordhist['totprice'],2); ?></p>
                    </div>
                    <div id="histdel">
                        <p id="proddeli">Delivery Date: <br><?php echo date("d-m-Y H:i:s", strtotime($ordhist['reqdate'])); ?></p>
                    </div>

                    <div id="ccl_dets">
                    <?php
                            date_default_timezone_set("Asia/Singapore");
                            $date1= $ordhist['reqdate'] ? new datetime($ordhist['reqdate']) : new datetime('now'); 
                            $date2= new datetime("now+1day"); 

                            $date3= $ordhist['ccldate'] ? new datetime($ordhist['ccldate']) : null; 
                            $date4= new datetime("now");
                            if ($ordhist['ccldate'] && strtotime($ordhist['ccldate'])) 
                            echo "Cancelled on ". $date3->format('d-m-Y H:i:s');
                            else if ($date4 >= $date1) 
                            {
                                echo "Delivered";
                                // Only update if using real database
                                if (!isset($GLOBALS['use_mock_db'])) {
                                    require("../config/sql_connection.php");
                                    if ($conn) {
                                        $ordid = $ordhist['ordid'];
                                        $sql="UPDATE orders SET deldate=now(), ordstatus='D' WHERE id = '$ordid'";
                                        $query = mysqli_query($conn,$sql);
                                        mysqli_close($conn);
                                    }
                                }
                            }

                            else if ($date1> $date2) {
                                echo "Processing";
                    ?>
                    <form action="cancelorder.php" method="post">
                                <input type="hidden" name="ordid" value="<?php echo $ordhist['id']; ?>">
                                <input type="submit" id="cancelBTN" name=submit value="Cancel">
                            </form>
                            <?php }
                            
                            else if ($date4 < $date1)
                                echo "Processing";
                    ?>
                    </div>
                    
                </div>
        </article>
        <hr>
            <?php } ?>
            

        
    </section>
    <?php require("../includes/footer.php"); ?>
</body>
</html>