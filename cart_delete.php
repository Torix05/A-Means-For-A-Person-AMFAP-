<?php
    include './db.php';

    if(isset($_SESSION['userid'])){
        $sql = mq("delete from cart WHERE productid = '".$_GET['productid']."'");

        echo "<script>alert('제품 삭제 완료'); location.href='./main.php'; </script>";
    } else {
        echo "<script>alert('로그인 후 이용해 주세요.'); history.back();</script>"; 
    }
?>