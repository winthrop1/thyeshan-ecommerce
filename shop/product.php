<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link rel="stylesheet" href="/assets/css/Css_Reset.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="/assets/css/products.css?v=<?php echo time(); ?>">
    <?php require_once('../config/cookies.php'); ?>
    <?php
        session_start();
        
        require("../config/sql_connection.php");
        $sql = "SELECT prd.*, category FROM product prd INNER JOIN category cat ON prd.pcat = cat.id ";
        
        // Check if database connection exists and use mock data if not
        if ($conn && !isset($GLOBALS['use_mock_db'])) {
            $prod_list = mysqli_query($conn, $sql);
            mysqli_close($conn);
        } else {
            // Use mock data when database is not available - join products with categories
            $mock_data = [];
            if (isset($GLOBALS['mock_products'])) {
                $categories = [
                    1 => 'Tea', 2 => 'Birds Nest', 3 => 'Honey', 
                    4 => 'Medicated Oils', 5 => 'Precious Herbs', 6 => 'Herbal Supplements'
                ];
                foreach ($GLOBALS['mock_products'] as $product) {
                    $product['category'] = $categories[$product['pcat']] ?? 'Unknown';
                    $mock_data[] = $product;
                }
            }
            
            // Create a simple iterator for mock data
            class ProductMockResult {
                private $data;
                private $index = 0;
                
                public function __construct($data) {
                    $this->data = $data;
                }
                
                public function fetch_assoc() {
                    if ($this->index < count($this->data)) {
                        return $this->data[$this->index++];
                    }
                    return false;
                }
            }
            
            $prod_list = new ProductMockResult($mock_data);
        }
    ?>
    <?php require_once('../config/mitigations.php'); ?>
</head>
<body>
    <?php require("../includes/nav.php"); ?>
    <main>

                    
            <div id="pro_grid">
                <?php while ($oneprod = ($prod_list instanceof ProductMockResult) ? $prod_list->fetch_assoc() : mysqli_fetch_assoc($prod_list)) {?>
                <!-- use table content from database -->
                        <div class="prosel">
                            <form action="#">
                                <a href="product_detail.php?id=<?php echo $oneprod['id']?>"><img src="<?php echo $oneprod['ppic'];?>" alt="product" width="300" height="300"></a>
                                <p id="proname"><?php echo $oneprod['pname']; ?></p>
                                <p id="procost">$<?php echo number_format($oneprod['pcost'],2); ?></p>
                                <a id="atcHL" href="product_detail.php?id=<?php echo $oneprod['id']?>"><p>Add To Cart</p></a>
                            </form>
                        </div>
                            <?php } ?>  
            </div>
        </div>
    </main>
    <?php require("../includes/footer.php"); ?>
</body>
</html>