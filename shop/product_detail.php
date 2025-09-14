<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
    <link rel="stylesheet" href="/assets/css/Css_Reset.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="/assets/css/productdetail.css?v=<?php echo time(); ?>">
    <?php require_once('../config/cookies.php'); ?>
    <?php
        session_start();
        $filter= "";
        if (isset($_GET['id']))
        {
            $prdid = $_GET['id'];
            $filter= " WHERE prd.id = ? ";
        }
        require("../config/sql_connection.php");
        
        // Check if we're using mock database or real database
        if ($conn && !isset($GLOBALS['use_mock_db'])) {
            // Real database
            $sql_ = "SELECT prd.id, prd.pname, prd.pcost, prd.pdesc, prd.ppic, cat.category FROM product prd INNER JOIN category cat ON prd.pcat = cat.id " .$filter;
            $product_list= mysqli_prepare($conn, $sql_);
            mysqli_stmt_bind_param($product_list, 'i', $prdid);
            mysqli_stmt_execute($product_list);
            mysqli_stmt_bind_result($product_list, $pid, $pn, $pc, $pd, $ppic, $cc);
            mysqli_stmt_fetch($product_list);
            mysqli_close($conn);
        } else {
            // Mock database - find product by ID
            $pid = $pn = $pc = $pd = $ppic = $cc = "";
            if (isset($GLOBALS['mock_products']) && $prdid) {
                foreach ($GLOBALS['mock_products'] as $product) {
                    if ($product['id'] == $prdid) {
                        $pid = $product['id'];
                        $pn = $product['pname'];
                        $pc = $product['pcost'];
                        $pd = $product['pdesc'];
                        $ppic = $product['ppic'];
                        // Get category name from mock categories
                        if (isset($GLOBALS['mock_categories'])) {
                            foreach ($GLOBALS['mock_categories'] as $category) {
                                if ($category['id'] == $product['pcat']) {
                                    $cc = $category['category'];
                                    break;
                                }
                            }
                        }
                        break;
                    }
                }
            }
        }
    ?>
<?php 
    require_once('../config/mitigations.php');
?>
</head>
<body>
    <?php require("../includes/nav.php"); ?>
    <main id="prodflex">
        <div id="prodimg">
            <img src="<?php echo $ppic; ?>" alt="<?php echo $ppic ?>">
        </div>
        <div id="prodtxt">
            <div id="prodddd">
                <p id="prodname"><?php echo $pn; ?></p>
                <p id="prodcat">Category: <?php echo $cc; ?></p>
            </div>
            <p id="prodcost">Price: $<?php echo number_format($pc,2); ?></p>
        </div>
        <div id="prodqty">
            <form action="insertproducts.php" method="POST">
                Quantity:
                <input type="number" min="1" value="1" required name="qty" id="prodnum"><br>
                <input type="submit" name="atc" id="atc" value="Add To Cart">
                <input type="hidden" name="pid" value="<?php echo $pid; ?>">
                <input type="hidden" name="ppic" value="<?php echo $ppic; ?>">
                <input type="hidden" name="pcost" value="<?php echo $pc; ?>">
            </form>
            <?php 
                $val = isset($_GET['stt'])?$_GET['stt']:"";

                if($val==1) 
                    echo "<b>Added to Cart</b>";
                elseif ($val==2)
                    echo "<b>Failed to Add</b>";
            ?>
        </div>
    </main>
    <section id="prodsec">
        <p id="proddesc">Description: <?php echo $pd; ?></p>
        </section>
    <?php require("../includes/footer.php"); ?>
</body>
</html>