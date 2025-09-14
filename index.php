<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Thye Shan Medical Hall</title>
    <link rel="stylesheet" href="/assets/css/Css_Reset.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="/assets/css/index.css?v=<?php echo time(); ?>">
    <?php 
    require_once('config/init.php');
    $filter ="";
    $sql = "SELECT * FROM product ORDER BY id DESC LIMIT 6";
    
    // Check if database connection exists and use mock data if not
    if ($conn && !isset($GLOBALS['use_mock_db'])) {
        $index_list = mysqli_query($conn, $sql);
        mysqli_close($conn);
    } else {
        // Use mock data when database is not available
        $mock_data = isset($GLOBALS['mock_products']) ? array_slice(array_reverse($GLOBALS['mock_products']), 0, 6) : [];
        
        // Create a simple iterator for mock data
        class MockResult {
            private $data;
            private $index = 0;
            
            public function __construct($data) {
                $this->data = array_reverse($data); // Latest products first
            }
            
            public function fetch_assoc() {
                if ($this->index < count($this->data)) {
                    return $this->data[$this->index++];
                }
                return false;
            }
        }
        
        $index_list = new MockResult($mock_data);
    }
    ?>
</head>
<body>
    <main>
        <?php
        require("includes/nav.php");
        ?>
        <div id="banner">
            <a href="product.php"><h2>Shop Now</h2></a>
        </div>
        <section>
            <div id="popular">
                    <p id="popcall">What's New</p>
                    <div class="indexpop">
                            <?php
                                // Handle both real mysqli results and mock results
                                while ($top_nine = ($index_list instanceof MockResult) ? $index_list->fetch_assoc() : mysqli_fetch_assoc($index_list)) {?>
                                <div class="indgrid">
                                    <a href="product.php"><img src="<?php echo $top_nine['ppic'];?>" alt="product" width="300" height="300"></a>
                                    <p id="indpron"><?php echo $top_nine['pname']; ?></p>  
                                    </div> 
                            <?php }?>
                    </div>
                </div>
            </div>
            <article>
            <div id="happen">
                <h2 id="hapcall"><p>News</p></h2>
            </div>
            <div id="news">
                <div id="one">
                    <p><img src="/assets/images/sale-tag-removebg-preview (1).png" alt="Mega Sale"></p>
                    <h4>MEGA Health Deals NOW till 30th June 2021</h4>
                </div>
                <div id="two">
                    <p><img src="/assets/images/closed.jpg" alt="We are Closed"></p>
                    <h4>Temporary Retail Closure 7th Apr - 4th May 2020</h4>
                </div>
                <div id="three">
                    <p><img src="/assets/images/bridge-road.jpg" alt="Bridge Road Store"></p>
                    <h4>Brand New Openning at 266 Bridge Road S(058813)</h4>
                </div>
            </div>
        </article>
        </section>
    </main>
    <?php require("includes/footer.php");?>
</body>
</html>