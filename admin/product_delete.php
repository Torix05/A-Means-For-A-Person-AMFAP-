<?php
    include '../db.php';
    if($_SESSION['userid'] == 'admin'){
        $sql = mq("delete from product WHERE productid = '".$_GET['productid']."'");

        echo "<script>alert('제품 삭제 완료'); location.href='../main.php'; </script>";
    } else {
        echo "<script>alert('로그인 후 이용해 주세요.'); location.href='../main.php';</script>"; 
    }
?>