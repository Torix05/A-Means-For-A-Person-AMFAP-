<?php
    include '../db.php';

    if($_SESSION['userid'] == 'admin'){ ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Create</title>
    <link href="../css/create.css" rel="Stylesheet">
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
            <form action="./product_create_ok.php" method="POST">
                <input name="name" type="text" placeholder="이름">
                <input name="price" type="text" placeholder="가격">
                <textarea name="description" placeholder="설명"></textarea>
                <input type="text" name="image" placeholder="이미지 주소">
                <button type="submit">등록</button>
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