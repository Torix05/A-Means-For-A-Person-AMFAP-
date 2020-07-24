<?php
    include './db.php';
?>
<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title>Main</title>
    <link href="./css/main.css?after" rel="stylesheet" type="text/css">
</head>

<body>
    <div class="container">
        <div class="head">
            <div class="page">
                <h2 class="logo"><a href="main.php" style="cursor: pointer;">AMFAP</a></h2>
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
            <div class="banner">
                <img src="./image/banner.jpg">
            </div>
            <div class="search">
                <div class="search-content">
                    <form action="./search.php" method="GET">
                        <input type="text" class="search-bar" name="search">
                        <button type="submit"><img
                                src="https://img.icons8.com/pastel-glyph/128/000000/search--v2.png" /></button>
                    </form>
                </div>
            </div>
            <div class="product">
                <ol class="product-category">
                    <?php
                    $sql = mq("select * from product");
                    while($product = $sql->fetch_array()){ ?>
                    <ul>
                        <a href='./product.php?productid=<?php echo $product['productid'] ?>'>
                            <li>
                                <div class="product-img">
                                    <img src="<?php echo $product['productimage'] ?>" alt="None Image">
                                </div>
                            </li>
                            <li>
                                <p class="product-name">
                                    <?php echo $product['productname']?>
                                </p>
                            </li>
                            <li>
                                <p class="product-price"><?php echo $product['productprice']?>원</p>
                            </li>
                            <li>
                                <span class="product-description"><?php echo $product['productdescription']?></span>
                            </li>
                        </a>
                        <?php if($_SESSION['userid'] == 'admin'){ ?>
                        <li class="admin_btn">
                            <a href='./admin/product_update.php?productid=<?php echo $product['productid']?>'>수정하기</a>
                        </li>
                        <?php
                        }
                        ?>
                    </ul>
                    <?php }?>
                </ol>
            </div>
        </div>
        <div class="sidebar">
        </div>
    </div>
</body>

</html>