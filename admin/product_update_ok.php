<?php
    include '../db.php';
    if($_SESSION['userid'] == 'admin'){
        $sql = mq("select * from product where productid = '".$_GET['productid']."'");
        $product = $sql->fetch_array();

        if($product['productname'] != $_POST['name']){
            $sql2 = mq("update product set productname ='".$_POST['name']."' where productid = '".$_GET['productid']."' ");
        }
        if($product['productprice'] != $_POST['price']){
            $sql3 = mq("update product set productprice ='".$_POST['price']."' where productid = '".$_GET['productid']."'");
        }
        if($product['productdescription'] != $_POST['description']){
            $sql4 = mq("update product set productdescription ='".$_POST['description']."' where productid = '".$_GET['productid']."'");
        }
        if($product['productimage'] != $_POST['image']){
            $sql4 = mq("update product set productimage ='".$_POST['image']."' where productid = '".$_GET['productid']."'");
        }

        echo "<script>alert('제품 수정 완료'); location.href='../main.php'; </script>";
    } else {
        echo "<script>alert('로그인 후 이용해 주세요.'); location.href='../main.php';</script>";
    }
?>