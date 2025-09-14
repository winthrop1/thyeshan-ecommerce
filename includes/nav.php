<head>
<link rel="stylesheet" href="/assets/css/Css_Reset.css?v=<?php echo time(); ?>">
<link rel="stylesheet" href="/assets/css/global.css?v=<?php echo time(); ?>">

</head>
<nav>
    <ul id="navtop">
        <div id="navlogo">
            <li id="logo"><p><a href="/index.php"><img src="/assets/images/Website_logo.png" alt=""></a></p></li>
        </div>
        <div id="nav_cs">
            <li><a href="/shop/cart.php"><img src="/assets/images/shopping_cart-removebg-preview.png" alt="Cart" id="cart"></a></li>
            <!-- <li><a href="search.php"><img src="images/searchlogo-removebg-preview.png" alt="search" id="srch"></a></li> -->
        </div>
    </ul>
        <ul id="navflex"> 
            <div id="home">
                <li class="text"><a href="/index.php">Home</a></li>
            </div>
            <div id="about">
                <li class="text"><a href="/about.php">About</a></li>
            </div>
            <div id="product">
                <li class="text"><a href="/shop/product.php">Product</a></li>
            </div>
            <div id="contact">
                <li class="text"><a href="/contact.php">Contact Us</a></li>
            </div>
            <div id="login">
                <li class="text"><a href="/auth/login.php">
                    <?php
                        $name = isset($_SESSION['MM_name'])?$_SESSION['MM_name']:" ";
                        $uid = isset($_SESSION['MM_Uid'])?$_SESSION['MM_Uid']:" ";
                        if ($name != " ")
                        {?>
                            <a href="/user/editprofile.php"><?php echo $_SESSION['MM_name'];?></a><?php 
                        }
                        else
                        {
                            echo "Login";
                        }
                    ?></a></li>
            </ul>
        </div>
    </ul>
</nav>

