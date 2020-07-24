<?php
    include './db.php';

    if(isset($_SESSION['userid'])){
        $sql = mq("select * from member where id = '".$_SESSION['userid']."'");
        $member = $sql -> fetch_array();

        if($member['id'] != $_POST['id']){
            $sql2 = mq("update member set id ='".$_POST['id']."' where idx = '".$member['idx']."' ");
        }
        if($member['name'] != $_POST['name']){
            $sql2 = mq("update member set name ='".$_POST['name']."' where idx = '".$member['idx']."' ");
        }
        echo "<script>alert('정보 수정 완료'); location.href='./main.php'; </script>";    
    } else {
        echo "<script>alert('로그인 후 이용해 주세요.'); history.back();</script>"; 
    }
?>