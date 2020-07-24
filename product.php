<?php
    include './db.php';
?>
<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title>Product</title>
    <link href="./css/product.css" rel="Stylesheet" type="text/css" />
</head>

<body>
    <div class="container">
        <div class="head">
            <div class="page">
                <h2 class="logo"><a href="./main.php" style="cursor: pointer;">AMFAP</a></h2>
                <nav class="menu">
                    <ul class="menu__list">
                        <?php 
                        if($_SESSION['userid'] == 'admin'){ ?>
                        <a class="menu__group" href="./admin/product_create.php">
                            <li class="menu__link">Create</li>
                        </a>
                        <?php } ?>

                        <?php if(isset($_SESSION['userid'])){
                        ?>
                        <a class="menu__group" href="./member/logout.php">
                            <li class="menu__link">Logout</li>
                        </a>
                        <?php    
                        } else {
                        ?>
                        <a class="menu__group" href="./member/login.php">
                            <li class="menu__link">Login</li>
                        </a>
                        <?php } ?>
                        <a class="menu__group" href="./cart.php">
                            <li class="menu__link">Cart</li>
                        </a>
                        <a class="menu__group" href="./mypage.php">
                            <li class="menu__link">Mypage</li>
                        </a>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="content">
            <?php
                $sql = mq("select * from product where productid='".$_GET['productid']."'");
                $product = $sql->fetch_array();
            ?>
            <div class="wrapper">
                <div class="product-img">
                    <img src="<?php echo $product['productimage'] ?>" alt="None Image!">
                </div>
                <div class="product-info">
                    <div class="product-text">
                        <h1><?php echo $product['productname'] ?></h1>
                        <p><?php echo $product['productdescription'] ?></p>
                    </div>
                    <div class="product-price-btn">
                        <span><?php echo $product['productprice'] ?>원</span>
                        <div class="product-btn">
                            <a href='./product_ok.php?productid=<?php echo $_GET['productid'] ?>'>
                                <button type="button">add to cart</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>