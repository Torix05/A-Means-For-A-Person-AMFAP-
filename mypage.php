<?php
    include './db.php';
    if(isset($_SESSION['userid'])){
        $sql = mq("select * from member where id='".$_SESSION['userid']."'");
        $member = $sql->fetch_array();
?>
<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title>Mypage</title>
    <link href="./css/mypage.css?after" rel="Stylesheet" type="text/css" />
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
            <form action="./mypage_ok.php" method="POST">
                <div id="wrap" class="input">
                    <section class="input-content">
                        <div class="input-content-wrap">
                            <dl class="inputbox">
                                <dd class="inputbox-content">
                                    <input id="input0" type="text" name="id" required value="<?php echo $member['id'] ?>" />
                                    <label for="input0">ID</label>
                                    <span class="underline"></span>
                                </dd>
                            </dl>
                            <dl class="inputbox">
                                <dd class="inputbox-content">
                                    <input id="input1" type="text" name="name" required value="<?php echo $member['name'] ?>"/>
                                    <label for="input1">Name</label>
                                    <span class="underline"></span>
                                </dd>
                            </dl>
                            <div class="btns">
                                <button class="btn" type="submit">회원 정보 수정</button>
                                <button class="btn" type="button"><a href="./mypage_delete.php">회원 정보 삭제</a></button>
                            </div>
                        </div>
                    </section>
                </div>

            </form>
        </div>
    </div>
</body>

</html>
<?php
    } else {
        echo "<script>alert('로그인 후 이용해 주세요.'); history.back();</script>"; 
    }
?>