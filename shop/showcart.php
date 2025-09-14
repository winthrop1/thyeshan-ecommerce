<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Shopping Cart - Thye Shan Medical Hall</title>
<link rel="stylesheet" href="/assets/css/Css_Reset.css?v=<?php echo time(); ?>">
<link rel="stylesheet" href="/assets/css/global.css?v=<?php echo time(); ?>">
<link rel="stylesheet" href="/assets/css/cart.css?v=<?php echo time(); ?>">
<?php
session_start();
$filter ="";
if(isset($_SESSION['MM_Uid']))
{
    $uid = $_SESSION['MM_Uid'];
    $filter = " WHERE memid='$uid'";
}

// Use the reorganized database connection
require("../config/sql_connection.php");

// Check if we're using mock database or real database
if ($conn && !isset($GLOBALS['use_mock_db'])) {
    // Real database
    $sql_ = "SELECT * FROM cart" . $filter;
    $cart_list = mysqli_query ( $conn, $sql_);
    mysqli_close($conn);
} else {
    // Mock database - create mock cart data
    $mock_cart_list = [
        ['id' => 1, 'cname' => 'Chrysanthemum Bud', 'ccost' => 10.50, 'qty' => 2],
        ['id' => 2, 'cname' => 'Ginseng Birds Nest', 'ccost' => 39.90, 'qty' => 1]
    ];
    $cart_list = new ArrayIterator($mock_cart_list);
}

// Add category list for the dropdown
if ($conn && !isset($GLOBALS['use_mock_db'])) {
    // Real database - get categories
    $cat_sql = "SELECT * FROM category";
    $category_list = mysqli_query($conn, $cat_sql);
} else {
    // Mock database - use mock categories
    $category_list = new ArrayIterator($GLOBALS['mock_categories'] ?? []);
}

?> 
<?php require_once('../config/mitigations.php'); ?>
</head>

<body>
<?php require("../includes/nav.php"); ?>
<h2><?php echo 
isset($_SESSION['MM_name'])?$_SESSION['MM_name']:"Guest";
?>'s shopping cart</h2>
<h2>Country Information</h2>
<form id="form1" name="form1" method="post">
Select category:
  <select name="Cont" id="Cont">
    <?php 
    // Handle both real database results and mock data for categories
    $categories = [];
    if ($category_list instanceof ArrayIterator) {
        $categories = iterator_to_array($category_list);
    } else if ($category_list) {
        while ($row = mysqli_fetch_assoc($category_list)) {
            $categories[] = $row;
        }
    }
    
    foreach ($categories as $one_category) { ?> 
        <option value="<?php echo $one_category['category']; ?>">
            <?php echo $one_category['category']; ?>
        </option>
    <?php } ?>
  </select>
  <input type="submit" name="submit" id="submit" value="Show Product">
</form>
<br>
<table width="80%" border="1">
  <tr>
    <th scope="col">name</th>
    <th scope="col">Unit Cost</th>
    <th scope="col">quantity</th>
    <th scope="col">Total Cost</th>
    <th scope="col"></th>
  </tr>
  
<?php 
$grandtotal=0;
// Handle both real database results and mock data
$cart_products = [];
if ($cart_list instanceof ArrayIterator) {
    // Mock data
    $cart_products = iterator_to_array($cart_list);
} else if ($cart_list) {
    // Real database result
    while ($row = mysqli_fetch_assoc($cart_list)) {
        $cart_products[] = $row;
    }
}

foreach ($cart_products as $one_product) { ?>  
 
  <tr>
    <td><?php echo $one_product['cname']; ?></td>
    <td><?php echo number_format($one_product['ccost'],2); ?></td>
    <td><?php echo $one_product['qty']; ?></td>
    <td><?php echo $tcost=$one_product['ccost']*$one_product['qty'];?></td>
   <!-- <td><input type=image width="100" height="100" src="images/<?php echo $one_product['picture']; ?>"></td>-->
    <td><form action="deletecart.php" method="post">
    <input type="submit" name="" id="" value="delete">
    <input type="hidden" name="cid" value="<?php echo $one_product['id']; ?>">
    </form></td>
  </tr>
  <td><form action="updatecart.php" method="post">
    <input type="submit" name="" id="" value="update">
    <input type="hidden" name="cid" value="<?php echo $one_product['id']; ?>">
    <input type="text" name="nqty" value="<?php echo $one_product['qty']; ?>">

    </form></td>
 <?php  $grandtotal += $tcost; } ?>
<tr>
<td colspan=5>Grand Total is $<?php echo number_format($grandtotal,2); ?></td>
</tr>
</table>
<br/>
<script>
  function myFunction(){
    var txt,url;
    if(confirm("Confirm Checkout!"))
    {
      txt = "You pressed confirm";
      url = "checkout.php";
    }
    else{
      txt = "You pressed cancel";
      url = "showcart.php";
    }
    alert(txt);
    window.location.href= url;
  }

</script>  
<button onclick="myFunction()">Checkout</button>

<?php require("../includes/footer.php"); ?>
</body>
</html>