<?php
    include './db.php';
    if(isset($_SESSION['userid'])){
        $sql = mq("select * from member where id='".$_SESSION['userid']."'");
        $member = $sql->fetch_array();
        $sql2 = mq("INSERT INTO cart (`idx`, `productid`, `memberid`) VALUES (NULL, '".$_GET['productid']."', '".$member['idx']."')");
        echo "<script> alert('장바구니에 등록되었습니다.'); location.href='./main.php'; </script>";
    }
    else {
        echo "<script>alert('로그인 후 이용해 주세요.'); location.href='./main.php';</script>"; 
    }
?>