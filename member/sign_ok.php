<?php
    include '../db.php';
    if(isset($_SESSION['userid'])){
        echo "<script>alert('로그인 되어있습니다.'); location.href='../main.php';</script>"; 
    } else {
        $userid = $_POST['userid'];
        $userpw = password_hash($_POST['userpw'], PASSWORD_DEFAULT);
        $username = $_POST['username'];

        $id_check = mq("select * from member where id='$userid'");
        $id_check = $id_check->fetch_array();
        if($id_check >= 1){
            echo "<script>alert('아이디가 중복됩니다.'); location.href='./sign.php';</script>";
        }else{
            $sql = mq("insert into member (id,pw,name) values('".$userid."','".$userpw."','".$username."')");
            echo "<script>alert('회원가입이 완료되었습니다.'); location.href='../main.php';</script>";
        }
    } 
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Sign</title>
</head>

</html>