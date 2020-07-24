<?php
    include './db.php';

    if(isset($_SESSION['userid'])){
        $sql = mq("select * from member where id = '".$_SESSION['userid']."'");
        $member = $sql -> fetch_array();
        $sql2 = mq("delete from member WHERE idx = '".$member['idx']."'");

        session_destroy();
        echo "<script>alert('정보 삭제 완료'); location.href='./main.php'; </script>";
    }   else {
        echo "<script>alert('로그인 후 이용해 주세요.'); history.back();</script>"; 
    }
?>