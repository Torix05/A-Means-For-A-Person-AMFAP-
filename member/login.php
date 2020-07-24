<?php
    include '../db.php';
    if(isset($_SESSION['userid'])){
        echo "<script>alert('로그인 되어있습니다.'); location.href='../main.php';</script>"; 
    } else {
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link href="../css/login.css" rel="Stylesheet" type="text/css" />
</head>

<body>
    <div class="container">
        <div class="head">
            <div class="page">
                <h1 class="logo"><a href="../main.php" style="cursor: pointer;">AMFAP</a></h1>
            </div>
        </div>
        <div class="content">
            <form action="./login_ok.php" method="post">
                <div class="segment">
                    <h2>Sign In</h2>
                </div>
                <label>
                    <input type="text" name="userid" placeholder="아이디" required />
                </label>
                <label>
                    <input type="password" name="userpw" placeholder="비밀번호" required />
                </label>
                <button class="red" type="submit" style="margin-top:10%;"><i class="icon ion-md-lock"></i>확인</button>
            </form>
            <button class="red" type="submit" style="width: 50%; margin: 0 auto;"><i class="icon ion-md-lock"></i><a href="./sign.php" style="color: #AE1100;">회원가입</a></button>
        </div>
    </div>
</body>

</html>
<?php } ?>