<?php
	session_start();
	header('Content-Type: text/html; charset=utf-8'); // utf-8인코딩

	// localhost = DB주소, web=DB계정아이디, 1234=DB계정비밀번호, post_board="DB이름"
	$conn = mysqli_connect('localhost','root','123456','webshop');
    $conn->set_charset("utf8");

    function mq($sql){
        global $conn;
        return mysqli_query($conn,$sql);
    }
    echo "성공";
    phpinfo();
?>