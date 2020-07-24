<?php
    include '../db.php';
    if(isset($_SESSION['userid'])){
        echo "<script>alert('로그인 되어있습니다.'); location.href='../main.php';</script>";
    }
    $userid = $_POST['userid'];
    $password = $_POST['userpw'];
	$sql = mq("select * from member where id='".$_POST['userid']."'");
	$member = $sql->fetch_array();
	$hash_pw = $member['pw']; //$hash_pw에 POSt로 받아온 아이디열의 비밀번호를 저장합니다. 
    if($password == $hash_pw && $userid == $member['id']){

        $_SESSION['userid'] = $member["id"];
		$_SESSION['userpw'] = $member["pw"];
        echo "<script>alert('관리자로 로그인 합니다.'); location.href='../main.php';</script>";
    }
	else if(password_verify($password, $hash_pw)) //만약 password변수와 hash_pw변수가 같다면 세션값을 저장하고 알림창을 띄운후 note_main.php로 넘어갑니다.
	{
		$_SESSION['userid'] = $member["id"];
		$_SESSION['userpw'] = $member["pw"];
		echo "<script>alert('로그인되었습니다.'); location.href='../main.php';</script>";
	}else{ 
	// 비밀번호가 같지 않다면 알림창을 띄우고 전 페이지로 돌아갑니다
		echo "<script>alert('아이디 혹은 비밀번호를 확인하세요.'); history.back();</script>";
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    
</body>
</html>