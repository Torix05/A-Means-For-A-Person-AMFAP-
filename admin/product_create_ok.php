<?php
    include '../db.php';
    if($_SESSION['userid'] == 'admin'){
        $sql = mq("insert into `product` (`productid`, `productname`, `productprice`, `productdescription`,`productimage`) 
                    values(NULL, '".$_POST['name']."', '".$_POST['price']."', '".$_POST['description']."','".$_POST['image']."')");

        echo "<script>alert('제품 등록 완료'); location.href='../main.php'; </script>";
    } else {
        echo "<script>alert('로그인 후 이용해 주세요.'); location.href='../main.php';</script>"; 
    }
?>