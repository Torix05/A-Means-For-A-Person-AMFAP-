<?php
    include './db.php';
    $search_result = $_GET['search'];
    if($search_result != null){ 
    $sql = mq("select * from product where productname like '%$search_result%'");
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Search</title>
    <link rel="stylesheet" href="./css/search.css?after">
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
            <div class="search">
                <?php
                    while($search = $sql->fetch_array()){ ?>
                <div class="container page-wrapper">
                    <div class="page-inner">
                        <div class="row">
                            <div class="el-wrapper">
                                <div class="box-up">
                                    <img class="img" src="<?php echo $search['productimage'] ?>" alt="None Image!">
                                    <div class="img-info">
                                        <div class="info-inner">
                                            <span class="p-name"><?php echo $search['productname']; ?></span>
                                            <span class="p-company"><?php echo $search['productdescription']; ?></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="box-down">
                                    <div class="h-bg">
                                        <div class="h-bg-inner"></div>
                                    </div>

                                    <a class="cart" href="./product.php?productid=<?php echo $search['productid'] ?>">
                                        <span class="price"><?php echo $search['productprice'];?>원</span>
                                        <span class="add-to-cart">
                                            <span class="txt">상세보기</span>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                    }
                ?>

            </div>
        </div>
    </div>
</body>

</html>
<?php
    } else {
        echo "<script>alert('검색 결과가 없습니다'); location.href='./main.php';</script>";
    }
?>