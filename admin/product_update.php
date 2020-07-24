<?php
    include '../db.php';

    if($_SESSION['userid'] == 'admin'){
        $sql = mq("select * from product where productid='".$_GET['productid']."'");
        $product = $sql->fetch_array();
        ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Update</title>
    <link href="../css/update.css" rel="Stylesheet">
</head>

<body>
    <div class="container">
        <div class="head">
            <div class="page">
                <h2 class="logo"><a href="../main.php" style="cursor: pointer;">AMFAP</a></h2>
                <nav class="menu">
                    <ul class="menu__list">
                        <?php 
                        if($_SESSION['userid'] == 'admin'){ ?>
                        <a class="menu__group" href="./product_create.php">
                            <li class="menu__link">Create</li>
                        </a>
                        <?php } ?>
                        <a class="menu__group" href="../member/logout.php">
                            <li class="menu__link">Logout</li>
                        </a>
                        <a class="menu__group" href="../cart.php">
                            <li class="menu__link">Cart</li>
                        </a>
                        <a class="menu__group" href="../mypage.php">
                            <li class="menu__link">Mypage</li>
                        </a>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="content">
            <form action="./product_update_ok.php?productid=<?php echo $product['productid'] ?>" method="POST" >
                <input name="name" type="text" placeholder="이름" value="<?php echo $product['productname'] ?>">
                <input name="price" type="text" placeholder="가격" value="<?php echo $product['productprice'] ?>원">
                <textarea name="description" placeholder="설명" ><?php echo $product['productdescription'] ?></textarea>
                <input type="text" name="image" placeholder="이미지 주소" value="<?php echo $product['productimage'] ?>" alt="None Image">
                <button type="submit">수정하기</button>
                <button type="button"><a href="./product_delete.php?productid=<?php echo $product['productid'] ?>">삭제하기</a></button>
            </form>
            
        </div>
    </div>

</body>

</html>

<?php
    } else {
        echo "<script>alert('로그인 후 이용해 주세요.'); location.href='../main.php';</script>"; 
    }
?>