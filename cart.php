<?php
    include './db.php';
    if(isset($_SESSION['userid'])){
        
?>
<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title>Cart</title>
    <link href="./css/cart.css" rel="Stylesheet" type="text/css">
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
                        <a class="menu__group" href="./member/logout.php">
                            <li class="menu__link">Logout</li>
                        </a>
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
                    $sql = mq("select * from member where id='".$_SESSION['userid']."'");
                    $member = $sql->fetch_array();
                    $sql2 = mq("select distinct productid,memberid from `cart` where memberid ='".$member['idx']."'");
                    // $sql2 = mq("select * from cart where memberid='".$member['idx']."'");
                    while($cart = $sql2->fetch_array()){ 
                    $sql3 = mq("select * from product where productid='".$cart['productid']."'");
                    $product = $sql3->fetch_array();
                ?>
            <a href="./product.php?productid=<?php echo $product['productid'] ?>">
                <div class="container page-wrapper">
                    <div class="page-inner">
                        <div class="row">
                            <div class="el-wrapper">
                                <div class="box-up">
                                    <img class="img" src="<?php echo $product['productimage'] ?>" alt="None Image!">
                                    <div class="img-info">
                                        <div class="info-inner">
                                            <span class="p-name"><?php echo $product['productname']; ?></span>
                                            <span class="p-company"><?php echo $product['productdescription']; ?></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="box-down">
                                    <div class="h-bg">
                                        <div class="h-bg-inner"></div>
                                    </div>

                                    <a class="cart"
                                        href="./cart_delete.php?productid=<?php echo $product['productid'] ?>">
                                        <span class="price"><?php echo $product['productprice'];?>원</span>
                                        <span class="add-to-cart">
                                            <span class="txt">삭제하기</span>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            <?php
            }
            ?>
        </div>
    </div>
</body>

</html>
<?php
    } else { 
        echo "<script>alert('로그인 후 이용해 주세요.'); location.href='./main.php';</script>"; 
} 
?>